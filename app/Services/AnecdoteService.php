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
            'ocurrio ',
            'la persona principal',
            'este relato conecta con el llamado biblico',
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

        $stories = $this->storiesByTopic($topic);
        $idx = hexdec(substr($seedHash, 0, 6)) % count($stories);
        $story = $stories[$idx];

        $content = $story['content'] . "\n\n" .
            'El desenlace dejó una enseñanza concreta para la comunidad: vivir ' . $topicLower . ' no como teoría, sino como obediencia visible en decisiones pequeñas pero constantes.';

        return [
            'title' => $story['title'],
            'content' => $content,
            'idea_central' => $story['idea'],
            'application' => $story['application'],
        ];
    }

    private function storiesByTopic($topic)
    {
        $topic = trim((string) $topic);
        $map = [
            'Fe' => [
                [
                    'title' => 'Raúl y el pedido que salvó el taller',
                    'content' => 'Raúl Mendoza, ebanista de 52 años en Barranquilla, llevaba tres semanas sin un solo encargo y ya pensaba cerrar su taller. La noche del viernes reunió a su esposa Miriam y a sus dos hijos alrededor de la mesa, leyeron Hebreos 11 y oraron con una sinceridad que casi dolía.\n\nAl amanecer del sábado, en vez de quedarse paralizado, Raúl limpió el local, ordenó herramientas y publicó tres trabajos antiguos con un mensaje breve sobre su oficio. Ese mismo día recibió una llamada de una escuela cristiana que necesitaba mobiliario urgente para su biblioteca. No fue un milagro mágico: fue una puerta que se abrió mientras él seguía actuando con fe y excelencia.',
                    'idea' => 'La fe bíblica no reemplaza la responsabilidad; la impulsa con esperanza cuando todo parece detenido.',
                    'application' => 'Anota hoy una área donde te sientes bloqueado. Ora por ella y ejecuta una acción concreta antes de terminar el día.',
                ],
                [
                    'title' => 'Lina en la sala de urgencias',
                    'content' => 'Lina Torres, enfermera en Bucaramanga, recibió la noticia de que su madre sería operada de emergencia. En la sala de espera, con el celular temblando entre las manos, abrió su Biblia en Salmo 46 y escribió en una libreta: “Dios es nuestro amparo”.\n\nDurante las siguientes horas no tuvo respuestas inmediatas, pero decidió sostener la fe con actos: llamó a su hermano para reconciliarse, coordinó donantes de sangre y evitó que el miedo tomara decisiones precipitadas. La cirugía fue exitosa, y Lina testificó en su iglesia que la paz de Dios llegó antes que la solución visible.',
                    'idea' => 'La fe madura se evidencia en la forma de responder bajo presión, no solo en palabras de domingo.',
                    'application' => 'Frente a una preocupación real, escribe una promesa bíblica y conviértela en dos acciones prácticas esta semana.',
                ],
            ],
            'Oración' => [
                [
                    'title' => 'Los siete minutos de Diana',
                    'content' => 'Diana Pardo, docente de primaria en Soacha, terminaba cada jornada agotada y con la sensación de no llegar a nada. Un mentor le propuso algo simple: apartar siete minutos diarios para orar con nombres concretos, sin discursos largos.\n\nEn menos de un mes cambió su tono en clase, disminuyeron sus reacciones impulsivas y varios padres notaron mayor cercanía y calma. Una madre le dijo llorando: “Gracias por escuchar a mi hijo; volvió sonriendo a casa”. Diana entendió que la oración breve, cuando es constante, reordena el corazón y también la agenda.',
                    'idea' => 'Orar de manera sostenida transforma primero el interior, y desde ahí impacta relaciones y decisiones.',
                    'application' => 'Programa una alarma de 7 minutos hoy y ora por tres personas específicas con necesidades reales.',
                ],
                [
                    'title' => 'El cuaderno de peticiones de don Abel',
                    'content' => 'Don Abel Quintero, líder de célula en Medellín, llevaba un cuaderno viejo donde anotaba peticiones y fechas. Cada miércoles, antes de abrir su negocio, se quedaba solo quince minutos orando por cada nombre.\n\nCon el tiempo, varias páginas se llenaron de respuestas: reconciliaciones familiares, empleo para jóvenes y sanidad emocional en matrimonios al borde de la ruptura. En su cumpleaños 70, mostró ese cuaderno a su congregación y dijo: “La oración no me quitó todas las tormentas, pero me enseñó a atravesarlas con dirección”.',
                    'idea' => 'La oración perseverante crea memoria espiritual y fortalece la confianza de toda la comunidad.',
                    'application' => 'Abre un registro de oración hoy mismo y documenta peticiones con fecha para ver el obrar de Dios en el tiempo.',
                ],
            ],
            'Perdón' => [
                [
                    'title' => 'La llamada de Eduardo después de 11 años',
                    'content' => 'Eduardo Rivera y su hermano no se hablaban desde una discusión por una herencia. Once años después, al escuchar una predicación sobre Mateo 5, sintió que su “razón” se había convertido en cárcel.\n\nEse domingo envió un audio corto: “No quiero seguir peleando. Perdóname por mis palabras”. La primera respuesta fue fría, pero una semana más tarde se encontraron en una panadería del barrio y hablaron por dos horas. No borraron el pasado, pero comenzaron a sanar. Meses después, sus hijos volvieron a compartir celebraciones familiares.',
                    'idea' => 'Perdonar no minimiza la herida; rompe la cadena del orgullo y abre camino a restauración real.',
                    'application' => 'Da hoy un primer paso de reconciliación: un mensaje humilde, una llamada o una cita para escuchar.',
                ],
                [
                    'title' => 'Patricia y la silla vacía en Navidad',
                    'content' => 'En la cena de Navidad siempre había una silla vacía: la de su hija mayor, alejadas por años de reproches. Patricia Gómez decidió dejar de esperar “el momento perfecto” y escribir una carta breve, sin justificarse, pidiendo perdón por su dureza.\n\nNo recibió respuesta inmediata, pero a los veinte días su hija llegó con un café y una frase: “Quiero intentarlo otra vez”. El proceso fue lento y con lágrimas, pero volvió el diálogo. Patricia testificó que el perdón fue una puerta angosta que terminó conduciendo a libertad.',
                    'idea' => 'La humildad inicial puede parecer pequeña, pero tiene poder para iniciar procesos de reconciliación duraderos.',
                    'application' => 'Escribe hoy una carta corta y honesta donde reconozcas tu parte sin culpar al otro.',
                ],
            ],
            'Sabiduría' => [
                [
                    'title' => 'Natalia y la decisión que evitó una deuda mayor',
                    'content' => 'Natalia Cárdenas recibió una oferta “demasiado buena” para invertir en un negocio sin respaldo legal. La presión era fuerte: todos le repetían que se estaba quedando atrás.\n\nEn lugar de decidir por miedo, pidió 48 horas, oró, consultó a dos creyentes con experiencia financiera y revisó documentos. Descubrió inconsistencias graves y rechazó el acuerdo. Tres meses después supo que varios conocidos perdieron sus ahorros en ese mismo esquema. Su calma no fue pasividad: fue sabiduría aplicada con temor de Dios.',
                    'idea' => 'La sabiduría bíblica combina oración, consejo y verificación antes de comprometer decisiones importantes.',
                    'application' => 'Antes de decidir algo clave, consulta a una persona madura y revisa datos concretos por escrito.',
                ],
                [
                    'title' => 'El silencio oportuno de Andrés',
                    'content' => 'Durante una reunión ministerial, Andrés Salcedo estuvo a punto de responder con dureza a una crítica pública. Sintió la garganta arder, pero recordó Proverbios 15:1 y decidió pedir un receso de cinco minutos.\n\nEse breve silencio evitó una ruptura entre líderes. Al volver, habló con firmeza pero sin herir, y la conversación terminó en acuerdos concretos. Varios jóvenes que observaban aprendieron que la madurez espiritual no es tener la última palabra, sino administrar bien la primera reacción.',
                    'idea' => 'Muchas crisis se evitan cuando la prudencia frena la impulsividad y da espacio a respuestas sabias.',
                    'application' => 'Practica hoy una pausa de 30 segundos antes de responder en un conflicto sensible.',
                ],
            ],
            'Familia' => [
                [
                    'title' => 'Cuando la familia oró unida en el apartamento 403',
                    'content' => 'Julián y Marcela Ríos llevaban semanas discutiendo por dinero, horarios y crianza. Sus dos hijos empezaron a cenar en silencio, evitando cualquier conversación para no encender otra pelea.\n\nUna noche, después de leer Efesios 4, decidieron apagar pantallas, pedir perdón delante de los niños y hacer una oración de tres minutos antes de dormir. No resolvieron todo de inmediato, pero cambió el clima emocional del hogar: menos gritos, más escucha, decisiones más claras. En tres meses retomaron su presupuesto familiar y restauraron la confianza de sus hijos.',
                    'idea' => 'La unidad familiar no nace de discursos largos, sino de hábitos espirituales simples practicados con constancia.',
                    'application' => 'Inicia hoy un ritual de 10 minutos en casa: lectura breve, oración y una conversación de gratitud.',
                ],
                [
                    'title' => 'La mesa del miércoles de los Herrera',
                    'content' => 'Los Herrera casi no coincidían en casa: cada uno comía a distinta hora y vivía en su propio mundo digital. Don Felipe, el abuelo, propuso recuperar una sola comida semanal sin celulares.\n\nAl principio fue incómodo, pero pronto se volvió el momento más esperado: compartían cargas, celebraban avances y oraban por necesidades concretas. Esa mesa evitó que un conflicto adolescente escalara, porque el diálogo ya estaba abierto. Lo que empezó como una decisión pequeña se convirtió en ancla emocional y espiritual para toda la familia.',
                    'idea' => 'La familia se fortalece cuando crea espacios intencionales de presencia, conversación y oración.',
                    'application' => 'Agenda una comida fija semanal sin pantallas y define una pregunta que ayude a escuchar el corazón de cada miembro.',
                ],
            ],
            'Perseverancia' => [
                [
                    'title' => 'Mónica y el cuaderno de los 120 días',
                    'content' => 'Mónica Villalba buscó trabajo durante cuatro meses sin éxito. Recibía correos de rechazo casi a diario y la vergüenza comenzaba a apagar su ánimo.\n\nEn vez de rendirse, abrió un cuaderno y trazó un plan de 120 días: mejorar perfil, estudiar una habilidad nueva y enviar candidaturas con seguimiento semanal. Cada noche escribía una oración corta y un aprendizaje del día. Al día 97 recibió una entrevista decisiva y fue contratada. Su testimonio no fue “todo salió fácil”, sino “Dios me sostuvo para no abandonar”.',
                    'idea' => 'Perseverar en fe implica disciplina sostenida cuando los resultados tardan en llegar.',
                    'application' => 'Define una meta de 30 días y parte el avance en acciones diarias medibles.',
                ],
                [
                    'title' => 'El segundo intento de Samuel',
                    'content' => 'Samuel Acosta cerró su primer emprendimiento con pérdidas y quedó con deudas que lo desanimaron por completo. Durante meses evitó volver a intentarlo por miedo a fracasar otra vez.\n\nAcompañado por su iglesia, ordenó sus finanzas, buscó mentoría y relanzó su proyecto con pasos más prudentes. El crecimiento fue lento, pero estable. Un año después empleaba a dos personas del barrio. Samuel suele repetir: “La perseverancia me enseñó que caer no define mi historia; levantarme sí”.',
                    'idea' => 'La perseverancia cristiana no es obstinación ciega; es constancia humilde con aprendizaje y dependencia de Dios.',
                    'application' => 'Retoma hoy un proyecto detenido y establece el próximo paso concreto para esta semana.',
                ],
            ],
            'Santidad' => [
                [
                    'title' => 'Kevin y la decisión de cerrar la puerta',
                    'content' => 'Kevin, joven líder de alabanza, notó que ciertas conversaciones nocturnas en redes lo estaban arrastrando a una doble vida. Nadie lo sabía, pero su conciencia estaba cada vez más cargada.\n\nUna madrugada, después de orar con lágrimas, eliminó contactos de riesgo, pidió acompañamiento a un mentor y estableció límites digitales estrictos. No fue un cambio de un día, pero recuperó paz interior y coherencia en su servicio. Meses después ayudaba a otros jóvenes a poner límites saludables con transparencia.',
                    'idea' => 'La santidad se construye con decisiones concretas en lo secreto, antes de que el daño se haga público.',
                    'application' => 'Define hoy un límite específico que proteja tu integridad y compártelo con alguien de confianza.',
                ],
                [
                    'title' => 'Transparencia que evitó una caída',
                    'content' => 'Laura Peña recibió una propuesta laboral que exigía alterar reportes para “acelerar resultados”. El sueldo era atractivo y la presión económica en casa era real.\n\nDespués de orar y consultar a sus pastores, rechazó la condición y explicó sus convicciones con respeto. Perdió la oportunidad inmediata, pero semanas después fue recomendada para un cargo mejor justamente por su reputación de integridad. Laura entendió que la santidad no siempre es cómoda, pero siempre protege el alma.',
                    'idea' => 'La integridad cuesta en el corto plazo, pero construye una base firme para el futuro.',
                    'application' => 'Evalúa una área de compromiso ético en tu vida y toma hoy una decisión alineada con la verdad.',
                ],
            ],
            'Evangelismo' => [
                [
                    'title' => 'Una conversación en la ruta 27',
                    'content' => 'Camilo viajaba en bus al trabajo cuando notó a un hombre llorando en silencio. Dudó en acercarse, pero oró en voz baja y preguntó con respeto si podía acompañarlo.\n\nEl hombre acababa de perder a su padre y dijo sentirse completamente solo. Camilo lo escuchó, compartió brevemente cómo Cristo lo sostuvo en su propio duelo y oró por él allí mismo. Intercambiaron contacto, y semanas después comenzaron un estudio bíblico. Todo empezó con una pregunta sencilla y una escucha genuina.',
                    'idea' => 'Evangelizar muchas veces inicia con compasión práctica y presencia sincera, no con discursos largos.',
                    'application' => 'Pide hoy a Dios una persona para escuchar y animar; da un paso intencional de conversación.',
                ],
                [
                    'title' => 'El café que abrió una puerta',
                    'content' => 'Rosa Martínez llevaba meses invitando a su vecina Clara a la iglesia sin éxito. En lugar de insistir con presión, cambió de estrategia: una tarde la invitó a café para escuchar su historia.\n\nClara habló por primera vez de su ansiedad y de una pérdida reciente que no había contado a nadie. Rosa no predicó de inmediato; primero acompañó, oró y permaneció cercana. Con el tiempo Clara pidió conocer más de la Biblia. El evangelio entró por una relación real, sostenida con paciencia y amor.',
                    'idea' => 'El testimonio creíble nace de relaciones auténticas donde primero se escucha y luego se comparte esperanza.',
                    'application' => 'Invita esta semana a una persona a conversar y prepárate para escucharla antes de hablar.',
                ],
            ],
        ];

        return isset($map[$topic]) ? $map[$topic] : $map['Fe'];
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
