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
    private $allowedAttributes = [
        'span' => [
            'class' => true,
            'data-strong' => true,
        ],
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
                    for ($a = $child->attributes->length - 1; $a >= 0; $a--) {
                        $attr = $child->attributes->item($a);
                        if (!$attr instanceof \DOMAttr) {
                            continue;
                        }
                        $attrName = strtolower($attr->nodeName);
                        $allow = isset($this->allowedAttributes[$tagName][$attrName]);
                        if (!$allow) {
                            $child->removeAttributeNode($attr);
                            continue;
                        }

                        if ($tagName === 'span' && $attrName === 'class') {
                            $className = trim((string) $attr->nodeValue);
                            if ($className !== 'strong-word') {
                                $child->removeAttributeNode($attr);
                                continue;
                            }
                            $attr->nodeValue = 'strong-word';
                            continue;
                        }

                        if ($tagName === 'span' && $attrName === 'data-strong') {
                            $normalized = $this->normalizeStrongCodes((string) $attr->nodeValue);
                            if ($normalized === '') {
                                $child->removeAttributeNode($attr);
                                continue;
                            }
                            $attr->nodeValue = $normalized;
                        }
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

    private function normalizeStrongCodes($value)
    {
        $raw = strtoupper(trim((string) $value));
        if ($raw === '') {
            return '';
        }

        $tokens = preg_split('/[\s,;]+/', $raw);
        $codes = [];
        foreach ($tokens as $token) {
            if (!preg_match('/^([GH])0*([0-9]{1,5})$/', (string) $token, $m)) {
                continue;
            }
            $number = (int) $m[2];
            if ($number < 1) {
                continue;
            }
            $codes[$m[1] . $number] = true;
        }

        return implode(',', array_keys($codes));
    }
}
