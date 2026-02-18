<?php

namespace App\Services;

class AIService
{
    private $config;
    private $userDataRepository;

    public function __construct(array $config, UserDataRepository $userDataRepository)
    {
        $this->config = $config;
        $this->userDataRepository = $userDataRepository;
    }

    public function cardsForVerse($book, $chapter, $verse, array $context, $forceRefresh = false)
    {
        $contextHash = hash('sha256', json_encode($context, JSON_UNESCAPED_UNICODE));
        $model = isset($this->config['model']) ? $this->config['model'] : 'stub-v1';

        if (!$forceRefresh) {
            $cached = $this->userDataRepository->getAiCache($book, $chapter, $verse, $contextHash);
            if ($cached) {
                return [
                    'model' => $cached['model'],
                    'cards' => json_decode($cached['cards_json'], true),
                    'cached' => true,
                ];
            }
        }

        $cards = $this->generateStubCards($context);

        if (!empty($this->config['enabled']) && !empty($this->config['api_key'])) {
            $maybeRealCards = $this->generateWithOpenAI($context);
            if (is_array($maybeRealCards) && !empty($maybeRealCards)) {
                $cards = $maybeRealCards;
            }
        }

        $this->userDataRepository->saveAiCache(
            $book,
            $chapter,
            $verse,
            $contextHash,
            json_encode($cards, JSON_UNESCAPED_UNICODE),
            $model
        );

        return [
            'model' => $model,
            'cards' => $cards,
            'cached' => false,
        ];
    }

    private function generateStubCards(array $context)
    {
        $verseText = isset($context['verse_text']) ? $context['verse_text'] : '';
        $pericope = isset($context['pericope']) ? $context['pericope'] : '';

        return [
            [
                'type' => 'historico',
                'title' => 'Contexto histórico',
                'content' => 'Stub: ubicar fecha, audiencia y entorno cultural del pasaje. ' . $this->clip($pericope),
            ],
            [
                'type' => 'literario',
                'title' => 'Contexto literario',
                'content' => 'Stub: relación con el argumento del capítulo y género literario en curso.',
            ],
            [
                'type' => 'comentario',
                'title' => 'Comentario bíblico',
                'content' => 'Stub: observaciones exegéticas breves sobre el versículo: ' . $this->clip($verseText),
            ],
            [
                'type' => 'lexico',
                'title' => 'Palabras clave / etimología',
                'content' => 'Stub: pendiente de integración con strong.lexx para términos relevantes.',
            ],
            [
                'type' => 'aplicacion',
                'title' => 'Aplicación práctica',
                'content' => 'Stub: posibles implicaciones pastorales y personales del texto.',
            ],
        ];
    }

    private function generateWithOpenAI(array $context)
    {
        // Punto de integración listo para OpenAI API.
        // Implementación real pendiente para mantener este MVP en modo seguro (stub-first).
        return null;
    }

    private function clip($text)
    {
        $text = trim((string) $text);
        if ($text === '') {
            return '';
        }
        $short = substr($text, 0, 130);
        return $short . (strlen($text) > 130 ? '...' : '');
    }
}
