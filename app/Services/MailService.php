<?php

namespace App\Services;

class MailService
{
    private $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
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

    public function sendMessage($toEmail, $toName, $subject, $htmlBody, $textBody = '')
    {
        if (!$this->enabled()) {
            return false;
        }

        $host = trim((string) ($this->config['host'] ?? ''));
        $port = max(1, (int) ($this->config['port'] ?? 587));
        $encryption = strtolower(trim((string) ($this->config['encryption'] ?? 'tls')));
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

        $transport = $encryption === 'ssl' ? 'ssl://' . $host : $host;
        $socket = @stream_socket_client($transport . ':' . $port, $errno, $errstr, 20, STREAM_CLIENT_CONNECT);
        if (!is_resource($socket)) {
            throw new \RuntimeException('No se pudo conectar al servidor SMTP: ' . $errstr);
        }

        stream_set_timeout($socket, 20);

        try {
            $this->expect($socket, [220]);
            $this->command($socket, 'EHLO bibliasoft.local', [250]);

            if ($encryption === 'tls') {
                $this->command($socket, 'STARTTLS', [220]);
                $cryptoOk = @stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
                if ($cryptoOk !== true) {
                    throw new \RuntimeException('No se pudo iniciar TLS con el servidor SMTP');
                }
                $this->command($socket, 'EHLO bibliasoft.local', [250]);
            }

            if ($username !== '') {
                $this->command($socket, 'AUTH LOGIN', [334]);
                $this->command($socket, base64_encode($username), [334]);
                $this->command($socket, base64_encode($password), [235]);
            }

            $this->command($socket, 'MAIL FROM:<' . $fromEmail . '>', [250]);
            $this->command($socket, 'RCPT TO:<' . trim((string) $toEmail) . '>', [250, 251]);
            $this->command($socket, 'DATA', [354]);
            $this->write($socket, $this->escapeMessageData($message) . "\r\n.");
            $this->expect($socket, [250]);
            $this->command($socket, 'QUIT', [221]);
        } finally {
            fclose($socket);
        }

        return true;
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
          <tr>
            <td style="padding:22px 38px 28px;background:#f4f8fb;border-top:1px solid #dde8f0;">
              <p style="margin:0 0 8px;font-size:13px;color:#3f6177;font-weight:bold;">' . $this->escape($appName) . ' · ' . $this->escape($churchName) . '</p>
              <p style="margin:0;font-size:12px;line-height:1.6;color:#6b8394;">FUNDACIÓN LA IGLESIA EN LA CALLE · <a href="' . $this->escape($siteUrl) . '" style="color:#195e86;text-decoration:none;">www.laiglesiaenlacalle.co</a></p>
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
}
