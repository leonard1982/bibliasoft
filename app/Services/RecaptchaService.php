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
        if (empty($this->config['enabled'])) {
            return false;
        }

        if ($this->provider() === 'cloud') {
            return $this->siteKey() !== ''
                && $this->projectId() !== ''
                && $this->apiKey() !== '';
        }

        return $this->siteKey() !== '' && $this->secretKey() !== '';
    }

    public function provider()
    {
        $provider = strtolower(trim((string) ($this->config['provider'] ?? 'legacy')));
        return $provider === 'cloud' ? 'cloud' : 'legacy';
    }

    public function mode()
    {
        $mode = strtolower(trim((string) ($this->config['mode'] ?? 'checkbox')));
        return $mode === 'score' ? 'score' : 'checkbox';
    }

    public function siteKey()
    {
        return trim((string) ($this->config['site_key'] ?? ''));
    }

    public function expectedAction()
    {
        return trim((string) ($this->config['expected_action'] ?? 'register'));
    }

    public function scriptUrl()
    {
        if ($this->provider() === 'cloud') {
            if ($this->mode() === 'score') {
                return 'https://www.google.com/recaptcha/enterprise.js?render=' . rawurlencode($this->siteKey());
            }
            return 'https://www.google.com/recaptcha/enterprise.js';
        }

        return 'https://www.google.com/recaptcha/api.js';
    }

    public function verify($token, $remoteIp = '', $options = [])
    {
        if (!$this->enabled()) {
            return ['success' => true, 'errors' => []];
        }

        $token = trim((string) $token);
        if ($token === '') {
            return ['success' => false, 'errors' => ['missing-input-response']];
        }

        if ($this->provider() === 'cloud') {
            return $this->verifyCloud($token, $remoteIp, is_array($options) ? $options : []);
        }

        return $this->verifyLegacy($token, $remoteIp);
    }

    private function verifyLegacy($token, $remoteIp)
    {
        $payload = http_build_query([
            'secret' => $this->secretKey(),
            'response' => $token,
            'remoteip' => trim((string) $remoteIp),
        ]);

        $body = $this->postRequest('https://www.google.com/recaptcha/api/siteverify', $payload, 'application/x-www-form-urlencoded');
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

    private function verifyCloud($token, $remoteIp, array $options)
    {
        $expectedAction = trim((string) ($options['expected_action'] ?? $this->expectedAction()));
        $payload = [
            'event' => [
                'token' => $token,
                'siteKey' => $this->siteKey(),
                'userIpAddress' => trim((string) $remoteIp),
                'userAgent' => isset($_SERVER['HTTP_USER_AGENT']) ? (string) $_SERVER['HTTP_USER_AGENT'] : '',
                'expectedAction' => $expectedAction,
            ],
        ];

        $url = 'https://recaptchaenterprise.googleapis.com/v1/projects/'
            . rawurlencode($this->projectId())
            . '/assessments?key='
            . rawurlencode($this->apiKey());

        $body = $this->postRequest($url, json_encode($payload, JSON_UNESCAPED_UNICODE), 'application/json');
        if ($body === '') {
            return ['success' => false, 'errors' => ['verification-unavailable']];
        }

        $decoded = json_decode($body, true);
        if (!is_array($decoded)) {
            return ['success' => false, 'errors' => ['invalid-json']];
        }

        if (!empty($decoded['error']) && is_array($decoded['error'])) {
            $message = trim((string) ($decoded['error']['message'] ?? 'cloud-api-error'));
            return ['success' => false, 'errors' => [$message]];
        }

        $tokenProperties = isset($decoded['tokenProperties']) && is_array($decoded['tokenProperties'])
            ? $decoded['tokenProperties']
            : [];
        $riskAnalysis = isset($decoded['riskAnalysis']) && is_array($decoded['riskAnalysis'])
            ? $decoded['riskAnalysis']
            : [];

        $hostname = trim((string) ($tokenProperties['hostname'] ?? ''));
        $action = trim((string) ($tokenProperties['action'] ?? ''));
        $score = isset($riskAnalysis['score']) ? (float) $riskAnalysis['score'] : null;
        $errors = [];

        if (empty($tokenProperties['valid'])) {
            $invalidReason = trim((string) ($tokenProperties['invalidReason'] ?? 'invalid-token'));
            $errors[] = $invalidReason !== '' ? $invalidReason : 'invalid-token';
        }

        if ($expectedAction !== '' && $action !== '' && strcasecmp($expectedAction, $action) !== 0) {
            $errors[] = 'action-mismatch';
        }

        if (!empty($this->config['verify_hostname']) && !$this->hostnameMatchesCurrentRequest($hostname)) {
            $errors[] = 'hostname-mismatch';
        }

        if ($this->mode() === 'score' && $score !== null && $score < $this->minScore()) {
            $errors[] = 'low-score';
        }

        return [
            'success' => empty($errors),
            'errors' => $errors,
            'hostname' => $hostname,
            'action' => $action,
            'score' => $score,
        ];
    }

    private function postRequest($url, $payload, $contentType)
    {
        $timeout = max(3, (int) ($this->config['timeout'] ?? 10));

        if (function_exists('curl_init')) {
            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $payload,
                CURLOPT_TIMEOUT => $timeout,
                CURLOPT_CONNECTTIMEOUT => $timeout,
                CURLOPT_HTTPHEADER => ['Content-Type: ' . $contentType],
            ]);
            $result = curl_exec($ch);
            curl_close($ch);
            return is_string($result) ? $result : '';
        }

        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: " . $contentType . "\r\n",
                'content' => is_string($payload) ? $payload : '',
                'timeout' => $timeout,
            ],
        ]);
        $result = @file_get_contents($url, false, $context);
        return is_string($result) ? $result : '';
    }

    private function hostnameMatchesCurrentRequest($tokenHostname)
    {
        $tokenHostname = strtolower(trim((string) $tokenHostname));
        if ($tokenHostname === '') {
            return true;
        }

        $requestHost = isset($_SERVER['HTTP_HOST']) ? strtolower(trim((string) $_SERVER['HTTP_HOST'])) : '';
        if ($requestHost === '') {
            return true;
        }

        $requestHost = preg_replace('/:\d+$/', '', $requestHost);
        return $requestHost === $tokenHostname;
    }

    private function secretKey()
    {
        return trim((string) ($this->config['secret_key'] ?? ''));
    }

    private function projectId()
    {
        return trim((string) ($this->config['project_id'] ?? ''));
    }

    private function apiKey()
    {
        return trim((string) ($this->config['api_key'] ?? ''));
    }

    private function minScore()
    {
        $score = (float) ($this->config['min_score'] ?? 0.5);
        if ($score < 0.0) {
            return 0.0;
        }
        if ($score > 1.0) {
            return 1.0;
        }
        return $score;
    }
}
