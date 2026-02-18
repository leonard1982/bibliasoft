<?php

namespace App\Services;

class AnecdoteService
{
    private $repo;
    private $seedPath;
    private $aiConfig;

    public function __construct(UserDataRepository $repo, $seedPath, array $aiConfig = [])
    {
        $this->repo = $repo;
        $this->seedPath = $seedPath;
        $this->aiConfig = $aiConfig;
    }

    public function bootstrapSeed()
    {
        if ($this->repo->hasAnecdotes()) {
            return;
        }
        if (!is_file($this->seedPath)) {
            return;
        }

        $json = json_decode((string) file_get_contents($this->seedPath), true);
        if (!is_array($json)) {
            return;
        }

        foreach ($json as $row) {
            if (!is_array($row)) {
                continue;
            }
            $title = trim((string) ($row['title'] ?? ''));
            $topic = trim((string) ($row['topic'] ?? 'General'));
            $content = trim((string) ($row['content'] ?? ''));
            $idea = trim((string) ($row['idea_central'] ?? ''));
            $application = trim((string) ($row['application'] ?? ''));
            if ($title === '' || $content === '') {
                continue;
            }
            $this->repo->createAnecdote($topic, $title, $content, $idea, $application, 'seed');
        }
    }

    public function list(array $filters = [], $limit = 60, $userId = 0)
    {
        $rows = $this->repo->getAnecdotes($filters, $limit);
        $favMap = [];
        foreach ($this->repo->getFavoriteAnecdoteIds($userId) as $id) {
            $favMap[$id] = true;
        }

        $unique = [];
        $normalizedRows = [];
        foreach ($rows as $row) {
            $row = $this->enrichRow($row);
            $hash = md5($this->normalizeText((string) $row['title']) . '|' . $this->normalizeText((string) $row['content']));
            if (isset($unique[$hash])) {
                continue;
            }
            $unique[$hash] = true;
            $row['favorite'] = isset($favMap[(int) $row['id']]);
            $normalizedRows[] = $row;
        }

        return [
            'rows' => $normalizedRows,
            'topics' => $this->repo->getAnecdoteTopics(),
        ];
    }

    public function generate($topic)
    {
        $topic = trim((string) $topic);
        if ($topic === '') {
            $topic = 'Fe';
        }

        $generated = $this->generateWithApi($topic);
        if (!$generated) {
            $generated = $this->generateTemplate($topic);
        }

        $id = $this->repo->createAnecdote(
            $topic,
            $generated['title'],
            $generated['content'],
            $generated['idea_central'],
            $generated['application'],
            'generated'
        );
        $generated['id'] = $id;
        $generated['topic'] = $topic;
        $generated['source'] = 'generated';
        return $generated;
    }

    public function toggleFavorite($userId, $anecdoteId)
    {
        return $this->repo->toggleAnecdoteFavorite($userId, $anecdoteId);
    }

    private function generateTemplate($topic)
    {
        return $this->buildCuratedStory($topic, microtime(true) . ':' . mt_rand(1000, 999999));
    }

    private function enrichRow(array $row)
    {
        $title = trim((string) ($row['title'] ?? ''));
        $content = trim((string) ($row['content'] ?? ''));
        $idea = trim((string) ($row['idea_central'] ?? ''));
        $application = trim((string) ($row['application'] ?? ''));

        if (!$this->looksGeneric($title, $content, $idea, $application)) {
            return $row;
        }

        $topic = trim((string) ($row['topic'] ?? 'Fe'));
        $seed = (string) ($row['id'] ?? 0);
        $curated = $this->buildCuratedStory($topic, $seed);
        $row['title'] = $curated['title'];
        $row['content'] = $curated['content'];
        $row['idea_central'] = $curated['idea_central'];
        $row['application'] = $curated['application'];
        return $row;
    }

    private function looksGeneric($title, $content, $idea, $application)
    {
        $sample = $this->normalizeText($title . ' ' . $content . ' ' . $idea . ' ' . $application);
        if ($sample === '') {
            return true;
        }

        $flags = [
            'en una comunidad local una persona enfrento una situacion real relacionada con',
            'en vez de reaccionar con prisa eligio una respuesta paciente',
            'las decisiones discretas y fieles suelen producir frutos duraderos',
            'da hoy un paso concreto pequeno y verificable en este tema',
            'historia 0',
        ];

        foreach ($flags as $flag) {
            if (strpos($sample, $flag) !== false) {
                return true;
            }
        }
        return false;
    }

    private function buildCuratedStory($topic, $seed)
    {
        $topic = trim((string) $topic);
        if ($topic === '') {
            $topic = 'Fe';
        }

        $seedHash = md5((string) $seed . ':' . $topic);
        $topicLower = function_exists('mb_strtolower') ? mb_strtolower($topic, 'UTF-8') : strtolower($topic);

        $profiles = [
            'Fe' => [
                'titles' => ['Cuando solo quedaba confiar', 'La decisión antes del amanecer', 'El paso que no parecía lógico', 'Fe en medio del retraso'],
                'settings' => ['en una sala de urgencias', 'en una finca golpeada por la sequía', 'en un pequeño taller familiar', 'en un barrio con alta inseguridad'],
                'tensions' => ['la noticia llegó tarde y el miedo tomó el control', 'los números no cerraban y la presión aumentaba', 'todos esperaban una reacción impulsiva', 'el panorama parecía cerrarse por completo'],
                'turns' => ['decidió orar primero y actuar después', 'anotó promesas bíblicas y las leyó en voz alta antes de decidir', 'se negó a ceder al pánico y buscó consejo piadoso', 'guardó silencio, respiró y dio un paso de obediencia'],
                'closures' => ['La respuesta no fue inmediata, pero la paz regresó y luego llegó una salida real.', 'Su entorno notó serenidad en vez de caos, y eso abrió conversaciones sobre Dios.', 'Lo que parecía un final terminó siendo un testimonio que fortaleció a otros.', 'Meses después, aquella decisión se convirtió en referencia para toda la familia.'],
                'idea' => 'La fe madura no niega la realidad; decide obedecer aun cuando no controla el resultado.',
                'application' => 'Escribe hoy tu situación más pesada en una frase. Al lado, escribe una promesa bíblica y define un paso de obediencia para las próximas 24 horas.',
            ],
            'Oración' => [
                'titles' => ['Cinco minutos que cambiaron la semana', 'La puerta cerrada y la rodilla en tierra', 'Antes de responder, oró', 'La lista de oración en el bolsillo'],
                'settings' => ['en una oficina llena de tensión', 'en la cocina de una madre agotada', 'en el pasillo de una escuela', 'en el bus de regreso a casa'],
                'tensions' => ['la ansiedad crecía antes de una conversación difícil', 'había cansancio acumulado y respuestas cortantes', 'las malas noticias llegaron en cadena', 'la familia estaba dividida por una decisión urgente'],
                'turns' => ['apartó cinco minutos para orar con nombre y apellido', 'hizo una pausa y convirtió su queja en petición', 'llamó a un hermano para orar juntos', 'cambió la prisa por una oración breve pero enfocada'],
                'closures' => ['No todo cambió de inmediato, pero sí cambió su forma de responder.', 'La conversación más difícil terminó en reconciliación inesperada.', 'Esa disciplina breve se volvió un hábito diario en casa.', 'La paz llegó primero al corazón, y luego a la situación.'],
                'idea' => 'La oración constante no es evasión: es dirección, fuerza y enfoque para actuar con sabiduría.',
                'application' => 'Define una alarma de 7 minutos hoy. Ora por tres personas específicas y anota una acción concreta que harás por una de ellas.',
            ],
            'Perdón' => [
                'titles' => ['La llamada que rompió diez años de silencio', 'Perdonar sin justificar', 'La mesa que volvió a llenarse', 'Cuando el orgullo bajó la voz'],
                'settings' => ['en una reunión familiar tensa', 'después de un conflicto laboral', 'en una visita al hospital', 'frente a una conversación pendiente desde años'],
                'tensions' => ['cada parte tenía razones para defenderse', 'el dolor viejo seguía gobernando las palabras', 'nadie quería dar el primer paso', 'la herida se volvió costumbre y distancia'],
                'turns' => ['decidió escuchar antes de responder', 'pidió perdón por su parte sin exigir condiciones', 'oró por la persona que más le costaba amar', 'escribió una carta clara y humilde para reconciliar'],
                'closures' => ['No borró la historia, pero sí rompió la cadena de rencor.', 'La relación tardó en sanar, pero dejó de sangrar.', 'El ambiente en casa cambió desde ese primer acto humilde.', 'Otros también se animaron a reconciliarse al ver su ejemplo.'],
                'idea' => 'Perdonar no llama bueno a lo malo; libera el corazón para que Dios restaure lo quebrado.',
                'application' => 'Identifica a una persona con la que necesites avanzar en perdón. Da hoy un paso medible: mensaje, llamada o encuentro.',
            ],
            'Sabiduría' => [
                'titles' => ['La decisión tomada en calma', 'Cuando callar fue más sabio', 'El consejo oportuno', 'Elegir bien bajo presión'],
                'settings' => ['en una junta de trabajo', 'en una decisión económica familiar', 'en medio de un conflicto ministerial', 'en una conversación con un hijo adolescente'],
                'tensions' => ['había presión por decidir rápido', 'las emociones estaban por encima de los hechos', 'cada voz tiraba hacia un extremo', 'el cansancio nublaba el criterio'],
                'turns' => ['pospuso la decisión para orar y revisar datos', 'buscó consejo en dos personas maduras', 'hizo preguntas antes de afirmar conclusiones', 'prefirió una verdad incómoda antes que una salida fácil'],
                'closures' => ['La decisión final evitó pérdidas mayores y trajo paz.', 'La familia entendió que la prisa casi los llevaba a un error grave.', 'La claridad llegó cuando bajó el ruido emocional.', 'Lo correcto no fue lo más popular, pero sí lo más sólido.'],
                'idea' => 'La sabiduría bíblica une verdad, prudencia y tiempo correcto para actuar.',
                'application' => 'Antes de decidir hoy, escribe tres opciones, un riesgo de cada una y una oración pidiendo discernimiento.',
            ],
            'Familia' => [
                'titles' => ['La mesa de los miércoles', 'Un hábito pequeño que sanó la casa', 'Volver a escucharse', 'Cuando la familia oró unida'],
                'settings' => ['en una casa con horarios rotos', 'en una familia con conflictos repetidos', 'en medio del cansancio laboral', 'después de varias semanas de discusiones'],
                'tensions' => ['cada uno vivía aislado en su pantalla', 'las conversaciones terminaban en reproches', 'faltaba tiempo de calidad y paciencia', 'la rutina había desplazado los afectos'],
                'turns' => ['acordaron una comida semanal sin celulares', 'comenzaron a leer un salmo por noche', 'pidieron perdón por palabras hirientes', 'establecieron una oración corta antes de dormir'],
                'closures' => ['La confianza volvió de forma gradual, pero firme.', 'El hogar recuperó conversaciones con respeto y ternura.', 'Los niños percibieron seguridad al ver coherencia en los adultos.', 'Aquello pequeño se volvió un ancla para toda la semana.'],
                'idea' => 'La familia se fortalece con hábitos simples, repetidos con amor y constancia.',
                'application' => 'Define hoy un ritual familiar de 10 minutos: lectura bíblica breve, oración y una pregunta de gratitud.',
            ],
            'Perseverancia' => [
                'titles' => ['El kilómetro que nadie ve', 'Seguir cuando no hay aplausos', 'La segunda cosecha', 'Constancia bajo presión'],
                'settings' => ['en un negocio en recuperación', 'en un proceso de sanidad largo', 'en el cuidado diario de un familiar', 'en una etapa de desempleo'],
                'tensions' => ['el progreso era más lento de lo esperado', 'los resultados tardaban en aparecer', 'la comparación con otros desanimaba', 'la fatiga hacía pensar en abandonar'],
                'turns' => ['decidió celebrar avances pequeños cada semana', 'volvió a la disciplina diaria aunque sin emoción', 'pidió apoyo a su comunidad de fe', 'recordó testimonios pasados para sostenerse'],
                'closures' => ['El fruto llegó después de insistir más allá del cansancio inicial.', 'La constancia silenciosa abrió una puerta inesperada.', 'Su testimonio animó a otros que estaban por rendirse.', 'La temporada difícil no desapareció de golpe, pero dejó de dominar su corazón.'],
                'idea' => 'Perseverar en Dios no es aguantar sin sentido; es sostener un propósito hasta ver fruto.',
                'application' => 'Escoge una meta espiritual para 30 días y divide el avance en pasos diarios de menos de 15 minutos.',
            ],
            'Santidad' => [
                'titles' => ['La decisión cuando nadie mira', 'Cerrar la ventana a tiempo', 'Integridad en lo secreto', 'Pureza con propósito'],
                'settings' => ['durante una jornada de trabajo en línea', 'en una conversación privada delicada', 'en una noche de soledad', 'frente a una propuesta poco ética'],
                'tensions' => ['nadie parecía notar el límite que iba a cruzar', 'la tentación se presentó como algo pequeño', 'la presión por encajar era fuerte', 'el cansancio debilitaba sus convicciones'],
                'turns' => ['cerró la puerta antes de negociar con la tentación', 'pidió rendición de cuentas a un amigo maduro', 'recordó su identidad en Cristo antes de responder', 'eligió transparencia aunque fuera incómoda'],
                'closures' => ['La victoria no fue ruidosa, pero fortaleció su carácter.', 'Ese límite claro evitó una cadena de consecuencias dolorosas.', 'Su ejemplo inspiró a otros jóvenes a vivir con integridad.', 'La paz de una conciencia limpia valió más que la gratificación instantánea.'],
                'idea' => 'La santidad se cultiva en decisiones concretas de obediencia, especialmente en lo secreto.',
                'application' => 'Define hoy un límite específico que proteja tu integridad y compártelo con alguien que pueda acompañarte.',
            ],
            'Evangelismo' => [
                'titles' => ['Una conversación en la fila', 'El testimonio en voz baja', 'Semillas en el camino diario', 'Hablar de Cristo con naturalidad'],
                'settings' => ['mientras esperaba en una sala', 'en una visita breve a un vecino', 'en un viaje cotidiano de transporte', 'en una pausa del trabajo'],
                'tensions' => ['sentía temor de no saber qué decir', 'el otro parecía poco interesado', 'había poco tiempo para conversar', 'pensó que su historia no tenía valor'],
                'turns' => ['compartió una experiencia real en lugar de un discurso largo', 'hizo una pregunta sincera y escuchó con respeto', 'ofreció orar ahí mismo por una necesidad puntual', 'entregó una palabra de esperanza simple y clara'],
                'closures' => ['La charla breve abrió una puerta para encuentros posteriores.', 'La persona pidió seguir conversando otro día.', 'Un gesto sencillo dejó una huella espiritual profunda.', 'Dios usó su autenticidad más que su elocuencia.'],
                'idea' => 'Evangelizar es mostrar a Cristo con verdad, amor y disponibilidad en la vida cotidiana.',
                'application' => 'Ora por una persona específica y busca hoy una conversación breve para escucharla y compartir esperanza.',
            ],
        ];

        $profile = isset($profiles[$topic]) ? $profiles[$topic] : $profiles['Fe'];

        $title = $this->pickByHash($profile['titles'], $seedHash, 0);
        $setting = $this->pickByHash($profile['settings'], $seedHash, 8);
        $tension = $this->pickByHash($profile['tensions'], $seedHash, 16);
        $turn = $this->pickByHash($profile['turns'], $seedHash, 24);
        $closure = $this->pickByHash($profile['closures'], $seedHash, 32);

        $content = 'Ocurrió ' . $setting . ', cuando ' . $tension . '.' . "\n\n"
            . 'En ese momento, la persona principal ' . $turn . ', aun con dudas y presión alrededor.' . "\n\n"
            . $closure . ' Este relato conecta con el llamado bíblico a vivir ' . $topicLower . ' con decisiones concretas.';

        return [
            'title' => $title,
            'content' => $content,
            'idea_central' => $profile['idea'],
            'application' => $profile['application'],
        ];
    }

    private function pickByHash(array $items, $hash, $offset)
    {
        if (empty($items)) {
            return '';
        }
        $slice = substr((string) $hash, (int) $offset, 6);
        if ($slice === '') {
            $slice = '0';
        }
        $idx = hexdec($slice) % count($items);
        return $items[$idx];
    }

    private function normalizeText($value)
    {
        $value = trim((string) $value);
        if ($value === '') {
            return '';
        }
        $value = function_exists('mb_strtolower') ? mb_strtolower($value, 'UTF-8') : strtolower($value);
        $value = preg_replace('/\s+/u', ' ', $value);
        $replace = [
            'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
            'à' => 'a', 'è' => 'e', 'ì' => 'i', 'ò' => 'o', 'ù' => 'u',
            'ä' => 'a', 'ë' => 'e', 'ï' => 'i', 'ö' => 'o', 'ü' => 'u',
            'ñ' => 'n',
        ];
        return strtr($value, $replace);
    }

    private function generateWithApi($topic)
    {
        $enabled = !empty($this->aiConfig['enabled']);
        $apiKey = isset($this->aiConfig['api_key']) ? trim((string) $this->aiConfig['api_key']) : '';
        $model = isset($this->aiConfig['model']) ? (string) $this->aiConfig['model'] : 'gpt-4.1-mini';

        if (!$enabled || $apiKey === '' || !function_exists('curl_init')) {
            return null;
        }

        $prompt = "Escribe una anécdota ORIGINAL en español para predicación sobre el tema {$topic}. "
            . "Devuelve JSON con llaves: title, content, idea_central, application. "
            . "content debe tener 2 a 5 párrafos cortos. No cites libros con copyright.";

        $payload = [
            'model' => $model,
            'input' => $prompt,
        ];

        $ch = curl_init('https://api.openai.com/v1/responses');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_TIMEOUT, 25);
        $raw = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status < 200 || $status >= 300 || !$raw) {
            return null;
        }

        $json = json_decode($raw, true);
        if (!is_array($json)) {
            return null;
        }

        $text = '';
        if (isset($json['output_text']) && is_string($json['output_text'])) {
            $text = trim($json['output_text']);
        } elseif (isset($json['output']) && is_array($json['output'])) {
            foreach ($json['output'] as $block) {
                if (!isset($block['content']) || !is_array($block['content'])) {
                    continue;
                }
                foreach ($block['content'] as $part) {
                    if (isset($part['text']) && is_string($part['text'])) {
                        $text = trim($part['text']);
                        break 2;
                    }
                }
            }
        }

        if ($text === '') {
            return null;
        }

        $decoded = json_decode($text, true);
        if (!is_array($decoded)) {
            return null;
        }

        if (empty($decoded['title']) || empty($decoded['content'])) {
            return null;
        }

        return [
            'title' => trim((string) $decoded['title']),
            'content' => trim((string) $decoded['content']),
            'idea_central' => trim((string) ($decoded['idea_central'] ?? '')),
            'application' => trim((string) ($decoded['application'] ?? '')),
        ];
    }
}
