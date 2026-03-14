<?php

namespace App\Services;

class RecaptchaService
{
    private $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function enabled()
    {
        return !empty($this->config['enabled'])
            && trim((string) ($this->config['site_key'] ?? '')) !== ''
            && trim((string) ($this->config['secret_key'] ?? '')) !== '';
    }

    public function siteKey()
    {
        return trim((string) ($this->config['site_key'] ?? ''));
    }

    public function verify($token, $remoteIp = '')
    {
        if (!$this->enabled()) {
            return ['success' => true, 'errors' => []];
        }

        $token = trim((string) $token);
        if ($token === '') {
            return ['success' => false, 'errors' => ['missing-input-response']];
        }

        $secret = trim((string) ($this->config['secret_key'] ?? ''));
        $timeout = max(3, (int) ($this->config['timeout'] ?? 10));
        $payload = http_build_query([
            'secret' => $secret,
            'response' => $token,
            'remoteip' => trim((string) $remoteIp),
        ]);

        $body = $this->postVerifyRequest($payload, $timeout);
        if ($body === '') {
            return ['success' => false, 'errors' => ['verification-unavailable']];
        }

        $decoded = json_decode($body, true);
        if (!is_array($decoded)) {
            return ['success' => false, 'errors' => ['invalid-json']];
        }

        return [
            'success' => !empty($decoded['success']),
            'errors' => isset($decoded['error-codes']) && is_array($decoded['error-codes']) ? $decoded['error-codes'] : [],
            'hostname' => isset($decoded['hostname']) ? (string) $decoded['hostname'] : '',
            'challenge_ts' => isset($decoded['challenge_ts']) ? (string) $decoded['challenge_ts'] : '',
        ];
    }

    private function postVerifyRequest($payload, $timeout)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        if (function_exists('curl_init')) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $payload,
                CURLOPT_TIMEOUT => $timeout,
                CURLOPT_CONNECTTIMEOUT => $timeout,
                CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
            ]);
            $result = curl_exec($ch);
            curl_close($ch);
            return is_string($result) ? $result : '';
        }

        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => $payload,
                'timeout' => $timeout,
            ],
        ]);
        $result = @file_get_contents($url, false, $context);
        return is_string($result) ? $result : '';
    }
}
