<?php

namespace App\Services;

class HtmlSanitizer
{
    private $allowedTags = [
        'p' => true,
        'span' => true,
        'sup' => true,
        'sub' => true,
        'b' => true,
        'strong' => true,
        'i' => true,
        'em' => true,
        'u' => true,
        'br' => true,
        'ul' => true,
        'ol' => true,
        'li' => true,
        'blockquote' => true,
    ];

    public function sanitize($html)
    {
        if ($html === null || $html === '') {
            return '';
        }

        $doc = new \DOMDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true);
        $doc->loadHTML(
            '<?xml encoding="UTF-8"><div id="root">' . $html . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();

        $root = $doc->getElementById('root');
        if (!$root) {
            return '';
        }

        $this->cleanNode($root);
        return $this->innerHtml($root);
    }

    public function text($html)
    {
        $clean = strip_tags((string) $html);
        return trim(html_entity_decode($clean, ENT_QUOTES, 'UTF-8'));
    }

    private function cleanNode(\DOMNode $node)
    {
        if (!$node->hasChildNodes()) {
            return;
        }

        for ($i = $node->childNodes->length - 1; $i >= 0; $i--) {
            $child = $node->childNodes->item($i);
            if (!$child instanceof \DOMNode) {
                continue;
            }

            if ($child->nodeType === XML_ELEMENT_NODE) {
                $tagName = strtolower($child->nodeName);
                if (!isset($this->allowedTags[$tagName])) {
                    $textNode = $node->ownerDocument->createTextNode($child->textContent);
                    $node->replaceChild($textNode, $child);
                    continue;
                }

                if ($child->attributes && $child->attributes->length > 0) {
                    while ($child->attributes->length > 0) {
                        $child->removeAttributeNode($child->attributes->item(0));
                    }
                }
            }

            $this->cleanNode($child);
        }
    }

    private function innerHtml(\DOMNode $element)
    {
        $html = '';
        foreach ($element->childNodes as $child) {
            $html .= $element->ownerDocument->saveHTML($child);
        }
        return $html;
    }
}
