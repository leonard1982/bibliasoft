<?php

namespace App\Services;

class DocumentExportService
{
    public function buildPdf(array $payload)
    {
        $appName = $this->cleanSingleLine($payload['app_name'] ?? 'Biblia para todos');
        $church = $this->cleanSingleLine($payload['church_name'] ?? '');
        $title = $this->cleanSingleLine($payload['title'] ?? 'Documento bíblico');
        $reference = $this->cleanSingleLine($payload['reference'] ?? '');
        $sourceType = $this->cleanSingleLine($payload['source_type'] ?? '');
        $content = $this->cleanMultiline($payload['content'] ?? '');

        $lines = [];
        $lines[] = $appName;
        if ($church !== '') {
            $lines[] = $church;
        }
        $lines[] = '';
        $lines[] = $title;
        if ($reference !== '') {
            $lines[] = $reference;
        }
        if ($sourceType !== '') {
            $lines[] = 'Tipo: ' . $sourceType;
        }
        $lines[] = 'Generado: ' . date('Y-m-d H:i');
        $lines[] = str_repeat('-', 68);
        $lines[] = '';

        $contentLines = preg_split('/\r\n|\r|\n/u', $content);
        if (!is_array($contentLines) || empty($contentLines)) {
            $contentLines = ['(Sin contenido)'];
        }
        foreach ($contentLines as $line) {
            $line = trim((string) $line);
            if ($line === '') {
                $lines[] = '';
                continue;
            }
            foreach ($this->wrapLine($line, 96) as $wrapped) {
                $lines[] = $wrapped;
            }
        }

        if (empty($lines)) {
            $lines = ['Documento vacío'];
        }

        $pages = $this->paginateLines($lines, 46);
        return $this->buildPdfFromPages($pages);
    }

    private function buildPdfFromPages(array $pages)
    {
        if (empty($pages)) {
            $pages = [['Documento vacío']];
        }

        $objects = [];
        $objects[1] = '<< /Type /Catalog /Pages 2 0 R >>';
        $objects[3] = '<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica /Encoding /WinAnsiEncoding >>';

        $pageRefs = [];
        $pageIndex = 0;
        foreach ($pages as $pageLines) {
            $pageObj = 4 + ($pageIndex * 2);
            $contentObj = $pageObj + 1;
            $pageRefs[] = $pageObj . ' 0 R';

            $stream = "BT\n/F1 11 Tf\n14 TL\n50 790 Td\n";
            foreach ($pageLines as $line) {
                $encoded = $this->toWindows1252($line);
                $stream .= '(' . $this->escapePdfLiteral($encoded) . ") Tj\nT*\n";
            }
            $stream .= "ET";

            $objects[$contentObj] = '<< /Length ' . strlen($stream) . " >>\nstream\n" . $stream . "\nendstream";
            $objects[$pageObj] = '<< /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Resources << /Font << /F1 3 0 R >> >> /Contents ' . $contentObj . ' 0 R >>';
            $pageIndex++;
        }

        $objects[2] = '<< /Type /Pages /Count ' . count($pageRefs) . ' /Kids [ ' . implode(' ', $pageRefs) . ' ] >>';
        ksort($objects);

        $pdf = "%PDF-1.4\n%\xE2\xE3\xCF\xD3\n";
        $offsets = [0 => 0];
        foreach ($objects as $number => $body) {
            $offsets[(int) $number] = strlen($pdf);
            $pdf .= $number . " 0 obj\n" . $body . "\nendobj\n";
        }

        $xrefOffset = strlen($pdf);
        $maxObj = (int) max(array_keys($objects));
        $pdf .= "xref\n0 " . ($maxObj + 1) . "\n";
        $pdf .= "0000000000 65535 f \n";
        for ($i = 1; $i <= $maxObj; $i++) {
            $offset = isset($offsets[$i]) ? (int) $offsets[$i] : 0;
            $pdf .= sprintf("%010d 00000 n \n", $offset);
        }
        $pdf .= "trailer\n<< /Size " . ($maxObj + 1) . " /Root 1 0 R >>\n";
        $pdf .= "startxref\n" . $xrefOffset . "\n%%EOF";

        return $pdf;
    }

    private function cleanSingleLine($value)
    {
        $line = trim((string) $value);
        $line = preg_replace('/\s+/u', ' ', $line);
        return trim((string) $line);
    }

    private function cleanMultiline($value)
    {
        $text = str_replace(["\r\n", "\r"], "\n", (string) $value);
        $text = preg_replace('/[ \t]+/u', ' ', $text);
        $text = preg_replace("/\n{3,}/u", "\n\n", (string) $text);
        return trim((string) $text);
    }

    private function wrapLine($line, $maxChars)
    {
        $line = trim((string) $line);
        $maxChars = max(20, (int) $maxChars);
        if ($line === '') {
            return [''];
        }

        $words = preg_split('/\s+/u', $line);
        if (!is_array($words) || empty($words)) {
            return [$line];
        }

        $wrapped = [];
        $current = '';
        foreach ($words as $word) {
            $word = trim((string) $word);
            if ($word === '') {
                continue;
            }

            if ($current === '') {
                if ($this->charLength($word) <= $maxChars) {
                    $current = $word;
                    continue;
                }
                foreach ($this->splitHardWord($word, $maxChars) as $chunk) {
                    $wrapped[] = $chunk;
                }
                continue;
            }

            $candidate = $current . ' ' . $word;
            if ($this->charLength($candidate) <= $maxChars) {
                $current = $candidate;
                continue;
            }

            $wrapped[] = $current;
            if ($this->charLength($word) <= $maxChars) {
                $current = $word;
                continue;
            }
            foreach ($this->splitHardWord($word, $maxChars) as $chunk) {
                $wrapped[] = $chunk;
            }
            $current = '';
        }

        if ($current !== '') {
            $wrapped[] = $current;
        }
        return empty($wrapped) ? [''] : $wrapped;
    }

    private function splitHardWord($word, $maxChars)
    {
        $word = (string) $word;
        $maxChars = max(10, (int) $maxChars);
        $parts = [];

        if (function_exists('mb_strlen') && function_exists('mb_substr')) {
            $len = (int) mb_strlen($word, 'UTF-8');
            for ($i = 0; $i < $len; $i += $maxChars) {
                $parts[] = (string) mb_substr($word, $i, $maxChars, 'UTF-8');
            }
            return $parts;
        }

        $len = strlen($word);
        for ($i = 0; $i < $len; $i += $maxChars) {
            $parts[] = substr($word, $i, $maxChars);
        }
        return $parts;
    }

    private function paginateLines(array $lines, $linesPerPage)
    {
        $linesPerPage = max(20, (int) $linesPerPage);
        $pages = [];
        $current = [];

        foreach ($lines as $line) {
            $current[] = (string) $line;
            if (count($current) >= $linesPerPage) {
                $pages[] = $current;
                $current = [];
            }
        }

        if (!empty($current)) {
            $pages[] = $current;
        }
        return $pages;
    }

    private function toWindows1252($text)
    {
        $text = (string) $text;
        $converted = @iconv('UTF-8', 'Windows-1252//TRANSLIT//IGNORE', $text);
        if (is_string($converted) && $converted !== '') {
            return $converted;
        }
        return preg_replace('/[^\x20-\x7E]/', '?', $text);
    }

    private function escapePdfLiteral($text)
    {
        $text = (string) $text;
        $text = str_replace('\\', '\\\\', $text);
        $text = str_replace('(', '\\(', $text);
        $text = str_replace(')', '\\)', $text);
        return $text;
    }

    private function charLength($text)
    {
        if (function_exists('mb_strlen')) {
            return (int) mb_strlen((string) $text, 'UTF-8');
        }
        return strlen((string) $text);
    }
}
