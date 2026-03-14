<?php

namespace App\Services;

class MailService
{
    private $config;
    private $repository;

    public function __construct(array $config = [], UserDataRepository $repository = null)
    {
        $basePath = function_exists('config') ? (string) config('app.base_path', dirname(__DIR__, 2)) : dirname(__DIR__, 2);
        $defaults = [
            'timeout' => 20,
            'ehlo_name' => 'bibliasoft.local',
            'allow_self_signed' => false,
            'log_path' => rtrim($basePath, DIRECTORY_SEPARATOR)
                . DIRECTORY_SEPARATOR . 'storage'
                . DIRECTORY_SEPARATOR . 'logs'
                . DIRECTORY_SEPARATOR . 'mail.log',
        ];
        $this->config = array_merge($defaults, $config);
        $this->repository = $repository;
    }

    public function enabled()
    {
        return !empty($this->config['enabled'])
            && trim((string) ($this->config['host'] ?? '')) !== ''
            && trim((string) ($this->config['from_email'] ?? '')) !== '';
    }

    public function sendWelcomeEmail($toEmail, $fullName, $ministry = '')
    {
        $toEmail = trim((string) $toEmail);
        $fullName = trim((string) $fullName);
        $ministry = trim((string) $ministry);
        if (!$this->enabled() || $toEmail === '') {
            return false;
        }

        $template = $this->repository ? $this->repository->getMailTemplateByKey('welcome_default') : null;
        if (is_array($template)) {
            $message = $this->composeTemplateMessage($template, $this->baseTemplateVariables([
                'full_name' => $fullName !== '' ? $fullName : 'hermano(a)',
                'email' => $toEmail,
                'ministry' => $ministry,
                'ministry_line' => $ministry !== '' ? 'Ministerio registrado: <strong>' . $this->escape($ministry) . '</strong>' : 'Ministerio registrado: <em>No especificado</em>',
                'campaign_name' => 'Bienvenida',
                'content_html' => '',
                'content_text' => '',
            ]));
            return $this->sendMessage($toEmail, $fullName, $message['subject'], $message['html'], $message['text']);
        }

        $appName = (string) config('branding.app_short', 'BIBLIASOFT');
        $platformName = (string) config('branding.app_name', 'Biblia para todos');
        $churchName = (string) config('branding.church_name', 'Fundación La Iglesia en la Calle');
        $siteUrl = trim((string) config('branding.website_url', 'https://www.laiglesiaenlacalle.co'));
        $publicUrl = trim((string) config('app.public_url', ''));
        $accessUrl = $publicUrl !== '' ? $publicUrl : $siteUrl;
        $subject = 'Bienvenido a ' . $appName;
        $html = $this->buildWelcomeHtml($fullName, $ministry, $appName, $platformName, $churchName, $siteUrl, $accessUrl);
        $text = $this->buildWelcomeText($fullName, $ministry, $appName, $platformName, $churchName, $siteUrl, $accessUrl);
        return $this->sendMessage($toEmail, $fullName, $subject, $html, $text);
    }

    public function sendPrayerRequestNotification($toEmail, array $payload = [])
    {
        $toEmail = trim((string) $toEmail);
        if (!$this->enabled() || $toEmail === '') {
            return false;
        }

        $fullName = trim((string) ($payload['full_name'] ?? ''));
        $email = trim((string) ($payload['email'] ?? ''));
        $ministry = trim((string) ($payload['ministry'] ?? ''));
        $requestText = trim((string) ($payload['request_text'] ?? ''));
        $threadId = (int) ($payload['thread_id'] ?? 0);
        $subject = 'Nueva petición de oración en BIBLIASOFT';
        $html = '<!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"></head><body style="margin:0;padding:24px;background:#eef4f8;font-family:Verdana,Segoe UI,Arial,sans-serif;color:#17384c;">'
            . '<div style="max-width:720px;margin:0 auto;background:#fff;border-radius:20px;overflow:hidden;border:1px solid #d8e6ef;box-shadow:0 18px 44px rgba(9,31,47,.12);">'
            . '<div style="padding:26px 30px;background:linear-gradient(135deg,#12313f,#1f678f);color:#fff;"><div style="font-size:12px;letter-spacing:.12em;text-transform:uppercase;opacity:.9;">Seguimiento pastoral</div><h1 style="margin:10px 0 0;font-size:28px;line-height:1.1;">Nueva petición de oración</h1></div>'
            . '<div style="padding:26px 30px;">'
            . '<p style="margin:0 0 14px;font-size:15px;line-height:1.7;">Se registró una nueva petición desde el chat pastoral de BIBLIASOFT.</p>'
            . '<p style="margin:0 0 8px;"><strong>Nombre:</strong> ' . $this->escape($fullName !== '' ? $fullName : 'No especificado') . '</p>'
            . '<p style="margin:0 0 8px;"><strong>Correo:</strong> ' . $this->escape($email !== '' ? $email : 'No especificado') . '</p>'
            . '<p style="margin:0 0 8px;"><strong>Ministerio:</strong> ' . $this->escape($ministry !== '' ? $ministry : 'No especificado') . '</p>'
            . '<p style="margin:0 0 18px;"><strong>Conversación:</strong> #' . (int) $threadId . '</p>'
            . '<div style="padding:18px 20px;border-radius:16px;background:#f5fafc;border:1px solid #d8e6ef;white-space:pre-wrap;font-size:15px;line-height:1.7;">' . $this->escape($requestText) . '</div>'
            . '</div></div></body></html>';
        $text = implode("\n", [
            'Nueva petición de oración en BIBLIASOFT',
            '',
            'Nombre: ' . ($fullName !== '' ? $fullName : 'No especificado'),
            'Correo: ' . ($email !== '' ? $email : 'No especificado'),
            'Ministerio: ' . ($ministry !== '' ? $ministry : 'No especificado'),
            'Conversación: #' . $threadId,
            '',
            $requestText,
        ]);

        return $this->sendMessage($toEmail, 'Equipo pastoral', $subject, $html, $text);
    }

    public function composeTemplateMessage(array $template, array $variables = [], array $overrides = [])
    {
        $subjectTemplate = isset($overrides['subject_template']) && trim((string) $overrides['subject_template']) !== ''
            ? trim((string) $overrides['subject_template'])
            : trim((string) ($template['subject_template'] ?? ''));
        $cssTemplate = isset($overrides['css_template']) ? (string) $overrides['css_template'] : (string) ($template['css_template'] ?? '');
        $htmlTemplate = isset($overrides['html_template']) && trim((string) $overrides['html_template']) !== ''
            ? (string) $overrides['html_template']
            : (string) ($template['html_template'] ?? '');
        $textTemplate = isset($overrides['text_template']) && trim((string) $overrides['text_template']) !== ''
            ? (string) $overrides['text_template']
            : (string) ($template['text_template'] ?? '');

        $subject = $this->replaceTemplateVariables($subjectTemplate, $variables);
        $htmlBody = $this->replaceTemplateVariables($htmlTemplate, $variables);
        $textBody = $this->replaceTemplateVariables($textTemplate, $variables);

        $html = '<!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>'
            . $this->escape($subject) . '</title>';
        if (trim($cssTemplate) !== '') {
            $html .= '<style>' . $cssTemplate . '</style>';
        }
        $html .= '</head><body>' . $htmlBody . '</body></html>';

        return [
            'subject' => $subject,
            'html' => $html,
            'text' => trim($textBody) !== '' ? $textBody : strip_tags($htmlBody),
        ];
    }

    public function sendMessage($toEmail, $toName, $subject, $htmlBody, $textBody = '')
    {
        if (!$this->enabled()) {
            $this->log('warning', 'Mail disabled or incomplete configuration.', [
                'host' => (string) ($this->config['host'] ?? ''),
                'from_email' => (string) ($this->config['from_email'] ?? ''),
            ]);
            return false;
        }

        $toEmail = trim((string) $toEmail);
        $toName = trim((string) $toName);
        $host = trim((string) ($this->config['host'] ?? ''));
        $port = max(1, (int) ($this->config['port'] ?? 587));
        $encryption = strtolower(trim((string) ($this->config['encryption'] ?? 'tls')));
        $timeout = max(5, (int) ($this->config['timeout'] ?? 20));
        $ehloName = trim((string) ($this->config['ehlo_name'] ?? 'bibliasoft.local'));
        if ($ehloName === '') {
            $ehloName = 'bibliasoft.local';
        }
        $fromEmail = trim((string) ($this->config['from_email'] ?? ''));
        $fromName = trim((string) ($this->config['from_name'] ?? 'BIBLIASOFT'));
        $username = trim((string) ($this->config['username'] ?? ''));
        $password = (string) ($this->config['password'] ?? '');

        if ($host === '' || $fromEmail === '') {
            return false;
        }

        $boundary = 'bsoft_' . md5((string) microtime(true) . $toEmail);
        $headers = [
            'Date: ' . date('r'),
            'From: ' . $this->formatAddress($fromEmail, $fromName),
            'To: ' . $this->formatAddress($toEmail, $toName),
            'Subject: ' . $this->encodeHeader((string) $subject),
            'MIME-Version: 1.0',
            'Content-Type: multipart/alternative; boundary="' . $boundary . '"',
        ];
        $body = '--' . $boundary . "\r\n"
            . "Content-Type: text/plain; charset=UTF-8\r\n"
            . "Content-Transfer-Encoding: 8bit\r\n\r\n"
            . ($textBody !== '' ? $textBody : strip_tags((string) $htmlBody)) . "\r\n\r\n"
            . '--' . $boundary . "\r\n"
            . "Content-Type: text/html; charset=UTF-8\r\n"
            . "Content-Transfer-Encoding: 8bit\r\n\r\n"
            . $htmlBody . "\r\n\r\n"
            . '--' . $boundary . "--\r\n";
        $message = implode("\r\n", $headers) . "\r\n\r\n" . $body;

        $this->log('info', 'Starting SMTP send.', [
            'to' => $toEmail,
            'subject' => (string) $subject,
            'host' => $host,
            'port' => $port,
            'encryption' => $encryption,
            'auth' => $username !== '' ? 'yes' : 'no',
        ]);

        $socket = $this->openSocket($host, $port, $encryption, $timeout);
        stream_set_timeout($socket, $timeout);

        try {
            try {
                $this->expect($socket, [220]);
                $ehloResponse = $this->command($socket, 'EHLO ' . $ehloName, [250]);
                $capabilities = $this->parseEhloCapabilities($ehloResponse);

                if ($encryption === 'tls') {
                    $this->command($socket, 'STARTTLS', [220]);
                    $cryptoOk = @stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
                    if ($cryptoOk !== true) {
                        throw new \RuntimeException('No se pudo iniciar TLS con el servidor SMTP');
                    }
                    $ehloResponse = $this->command($socket, 'EHLO ' . $ehloName, [250]);
                    $capabilities = $this->parseEhloCapabilities($ehloResponse);
                }

                if ($username !== '') {
                    $this->authenticate($socket, $username, $password, $capabilities);
                }

                $this->command($socket, 'MAIL FROM:<' . $fromEmail . '>', [250]);
                $this->command($socket, 'RCPT TO:<' . $toEmail . '>', [250, 251]);
                $this->command($socket, 'DATA', [354]);
                $this->write($socket, $this->escapeMessageData($message) . "\r\n.");
                $this->expect($socket, [250]);
                $this->command($socket, 'QUIT', [221]);
                $this->log('info', 'SMTP send completed.', [
                    'to' => $toEmail,
                    'subject' => (string) $subject,
                ]);
            } catch (\Throwable $e) {
                $this->log('error', 'SMTP send failed.', [
                    'to' => $toEmail,
                    'subject' => (string) $subject,
                    'message' => $e->getMessage(),
                ]);
                throw $e;
            }
        } finally {
            fclose($socket);
        }

        return true;
    }

    private function baseTemplateVariables(array $extra = [])
    {
        $appShort = (string) config('branding.app_short', 'BIBLIASOFT');
        $appName = (string) config('branding.app_name', 'Biblia para todos');
        $churchName = (string) config('branding.church_name', 'Fundación La Iglesia en la Calle');
        $websiteUrl = trim((string) config('branding.website_url', 'https://www.laiglesiaenlacalle.co'));
        $publicUrl = trim((string) config('app.public_url', ''));
        $accessUrl = $publicUrl !== '' ? $publicUrl : $websiteUrl;

        $base = [
            'app_short' => $appShort,
            'app_name' => $appName,
            'church_name' => $churchName,
            'website_url' => $websiteUrl,
            'access_url' => $accessUrl,
            'full_name' => '',
            'email' => '',
            'ministry' => '',
            'ministry_line' => '',
            'campaign_name' => 'Boletín',
            'content_html' => '',
            'content_text' => '',
        ];

        foreach ($extra as $key => $value) {
            $base[(string) $key] = (string) $value;
        }
        return $base;
    }

    private function replaceTemplateVariables($template, array $variables)
    {
        $result = (string) $template;
        foreach ($variables as $key => $value) {
            $token = '{{' . trim((string) $key) . '}}';
            $result = str_replace($token, (string) $value, $result);
        }
        return $result;
    }

    private function buildWelcomeHtml($fullName, $ministry, $appName, $platformName, $churchName, $siteUrl, $accessUrl)
    {
        $name = $this->escape($fullName !== '' ? $fullName : 'hermano(a)');
        $ministryLine = $ministry !== ''
            ? '<p style="margin:0 0 16px;color:#4d6577;font-size:15px;line-height:1.6;">Ministerio registrado: <strong style="color:#163447;">' . $this->escape($ministry) . '</strong></p>'
            : '';

        return '<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido a ' . $this->escape($appName) . '</title>
</head>
<body style="margin:0;padding:0;background:#eef4f8;font-family:Verdana,Segoe UI,Arial,sans-serif;color:#163447;">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#eef4f8;padding:28px 12px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:720px;background:#ffffff;border-radius:26px;overflow:hidden;box-shadow:0 20px 50px rgba(12,38,55,.14);">
          <tr>
            <td style="padding:0;background:linear-gradient(135deg,#0f2431 0%,#18405a 55%,#1f6a94 100%);">
              <div style="padding:34px 38px 28px;">
                <div style="display:inline-block;padding:8px 14px;border:1px solid rgba(220,240,252,.35);border-radius:999px;color:#dcedf8;font-size:12px;letter-spacing:.12em;text-transform:uppercase;">Plataforma de estudio bíblico</div>
                <h1 style="margin:20px 0 10px;font-size:34px;line-height:1.08;color:#ffffff;font-family:Georgia,Times New Roman,serif;">Bienvenido a ' . $this->escape($appName) . '</h1>
                <p style="margin:0;color:#d8ebf7;font-size:17px;line-height:1.6;">Tu cuenta ya quedó activa en ' . $this->escape($platformName) . '. Nos alegra servirte en tu crecimiento bíblico, devocional y ministerial.</p>
              </div>
            </td>
          </tr>
          <tr>
            <td style="padding:34px 38px 18px;">
              <p style="margin:0 0 16px;font-size:18px;line-height:1.6;">Hola <strong>' . $name . '</strong>,</p>
              <p style="margin:0 0 16px;color:#4d6577;font-size:15px;line-height:1.7;">Gracias por registrarte en <strong style="color:#163447;">' . $this->escape($appName) . '</strong>. Desde ahora puedes estudiar la Palabra con lectura guiada, herramientas de apoyo, notas, favoritos, planes y recursos para tu servicio.</p>'
              . $ministryLine .
              '<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin:10px 0 24px;">
                <tr>
                  <td style="padding:0 0 14px;">
                    <div style="border:1px solid #d6e5ef;border-radius:18px;background:linear-gradient(180deg,#f7fbfe,#eef5fa);padding:20px 22px;">
                      <div style="font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:#507089;margin-bottom:10px;">Siguiente paso</div>
                      <div style="font-size:16px;line-height:1.65;color:#163447;">Ingresa a tu cuenta y comienza por tu lectura diaria, un plan de estudio o la preparación de tus enseñanzas.</div>
                    </div>
                  </td>
                </tr>
              </table>
              <table role="presentation" cellspacing="0" cellpadding="0" style="margin:0 0 26px;">
                <tr>
                  <td align="center" style="border-radius:14px;background:#195e86;">
                    <a href="' . $this->escape($accessUrl) . '" style="display:inline-block;padding:14px 22px;color:#ffffff;text-decoration:none;font-size:15px;font-weight:bold;">Entrar a ' . $this->escape($appName) . '</a>
                  </td>
                </tr>
              </table>
              <p style="margin:0 0 10px;color:#4d6577;font-size:14px;line-height:1.7;">Este correo fue enviado por <strong style="color:#163447;">' . $this->escape($churchName) . '</strong>.</p>
              <p style="margin:0 0 22px;color:#4d6577;font-size:14px;line-height:1.7;">Visítanos en <a href="' . $this->escape($siteUrl) . '" style="color:#195e86;text-decoration:none;">' . $this->escape($siteUrl) . '</a></p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>';
    }

    private function buildWelcomeText($fullName, $ministry, $appName, $platformName, $churchName, $siteUrl, $accessUrl)
    {
        $lines = [
            'Bienvenido a ' . $appName,
            '',
            'Hola ' . ($fullName !== '' ? $fullName : 'hermano(a)') . ',',
            '',
            'Tu cuenta ya quedó activa en ' . $platformName . '.',
        ];
        if ($ministry !== '') {
            $lines[] = 'Ministerio registrado: ' . $ministry;
        }
        $lines[] = '';
        $lines[] = 'Ingresa aquí: ' . $accessUrl;
        $lines[] = '';
        $lines[] = $churchName;
        $lines[] = 'www.laiglesiaenlacalle.co';
        $lines[] = $siteUrl;
        return implode("\n", $lines);
    }

    private function formatAddress($email, $name = '')
    {
        $email = trim((string) $email);
        $name = trim((string) $name);
        if ($name === '') {
            return '<' . $email . '>';
        }
        return $this->encodeHeader($name) . ' <' . $email . '>';
    }

    private function encodeHeader($value)
    {
        $value = trim((string) $value);
        if ($value === '') {
            return '';
        }
        if (function_exists('mb_encode_mimeheader')) {
            return mb_encode_mimeheader($value, 'UTF-8', 'B', "\r\n");
        }
        return '=?UTF-8?B?' . base64_encode($value) . '?=';
    }

    private function command($socket, $command, array $expectedCodes)
    {
        $this->write($socket, $command);
        return $this->expect($socket, $expectedCodes);
    }

    private function openSocket($host, $port, $encryption, $timeout)
    {
        $allowSelfSigned = !empty($this->config['allow_self_signed']);
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => !$allowSelfSigned,
                'verify_peer_name' => !$allowSelfSigned,
                'allow_self_signed' => $allowSelfSigned,
                'SNI_enabled' => true,
            ],
        ]);

        $transport = $encryption === 'ssl' ? 'ssl://' . $host : $host;
        $errno = 0;
        $errstr = '';
        $socket = @stream_socket_client(
            $transport . ':' . $port,
            $errno,
            $errstr,
            max(5, (int) $timeout),
            STREAM_CLIENT_CONNECT,
            $context
        );
        if (!is_resource($socket)) {
            $message = 'No se pudo conectar al servidor SMTP';
            if ($errstr !== '') {
                $message .= ': ' . $errstr;
            }
            $this->log('error', $message, [
                'host' => $host,
                'port' => $port,
                'encryption' => $encryption,
                'errno' => $errno,
            ]);
            throw new \RuntimeException($message);
        }

        return $socket;
    }

    private function parseEhloCapabilities($response)
    {
        $capabilities = [];
        $lines = preg_split('/\r\n|\r|\n/', (string) $response);
        if (!is_array($lines)) {
            return $capabilities;
        }

        foreach ($lines as $line) {
            $line = trim((string) $line);
            if ($line === '' || stripos($line, '250') !== 0) {
                continue;
            }
            $feature = trim(substr($line, 4));
            if ($feature === '') {
                continue;
            }
            $upper = strtoupper($feature);
            $parts = preg_split('/\s+/', $upper);
            $name = trim((string) ($parts[0] ?? ''));
            if ($name === '') {
                continue;
            }
            $capabilities[$name] = $upper;
        }

        return $capabilities;
    }

    private function authenticate($socket, $username, $password, array $capabilities)
    {
        $authLine = isset($capabilities['AUTH']) ? (string) $capabilities['AUTH'] : '';
        if ($authLine !== '' && strpos($authLine, 'PLAIN') !== false) {
            $payload = base64_encode("\0" . $username . "\0" . $password);
            $this->command($socket, 'AUTH PLAIN ' . $payload, [235]);
            return;
        }

        $this->command($socket, 'AUTH LOGIN', [334]);
        $this->command($socket, base64_encode($username), [334]);
        $this->command($socket, base64_encode($password), [235]);
    }

    private function write($socket, $line)
    {
        fwrite($socket, (string) $line . "\r\n");
    }

    private function expect($socket, array $expectedCodes)
    {
        $response = '';
        while (($line = fgets($socket, 515)) !== false) {
            $response .= $line;
            if (strlen($line) < 4 || $line[3] !== '-') {
                break;
            }
        }

        $code = (int) substr($response, 0, 3);
        if (!in_array($code, $expectedCodes, true)) {
            $this->log('error', 'Unexpected SMTP response.', [
                'expected' => implode(',', $expectedCodes),
                'response' => trim($response),
            ]);
            throw new \RuntimeException('Respuesta SMTP inesperada: ' . trim($response));
        }

        return $response;
    }

    private function escapeMessageData($message)
    {
        $message = str_replace(["\r\n.", "\n.", "\r."], ["\r\n..", "\n..", "\r.."], (string) $message);
        return rtrim($message, "\r\n");
    }

    private function escape($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }

    private function log($level, $message, array $context = [])
    {
        $path = trim((string) ($this->config['log_path'] ?? ''));
        if ($path === '') {
            return;
        }

        $dir = dirname($path);
        if (!is_dir($dir)) {
            @mkdir($dir, 0777, true);
        }

        $line = '[' . date('Y-m-d H:i:s') . '] [' . strtoupper(trim((string) $level)) . '] ' . trim((string) $message);
        if (!empty($context)) {
            $encoded = json_encode($context, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            if (is_string($encoded) && $encoded !== '') {
                $line .= ' ' . $encoded;
            }
        }
        $line .= PHP_EOL;

        @file_put_contents($path, $line, FILE_APPEND);
    }
}
