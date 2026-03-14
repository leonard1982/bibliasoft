<?php

require_once __DIR__ . '/../app/bootstrap.php';

use App\Services\MailService;

$options = getopt('', ['to:', 'name::', 'subject::']);
$to = trim((string) ($options['to'] ?? ''));
$name = trim((string) ($options['name'] ?? ''));
$subject = trim((string) ($options['subject'] ?? ''));

if ($to === '') {
    fwrite(STDERR, "Uso: php scripts/test_smtp.php --to=correo@dominio.com [--name=\"Nombre\"] [--subject=\"Asunto\"]\n");
    exit(1);
}

$mail = new MailService(config('mail', []));

if (!$mail->enabled()) {
    fwrite(STDERR, "SMTP no está habilitado o faltan datos en .env/.env.local\n");
    exit(2);
}

$subject = $subject !== '' ? $subject : 'Prueba SMTP BIBLIASOFT';
$html = '<!doctype html><html lang="es"><head><meta charset="utf-8"><title>Prueba SMTP</title></head><body style="font-family:Verdana,Arial,sans-serif;background:#eef4f8;padding:24px;"><div style="max-width:640px;margin:0 auto;background:#fff;border-radius:18px;padding:28px;border:1px solid #d7e4ec;"><h1 style="margin:0 0 12px;color:#163447;">Prueba SMTP de BIBLIASOFT</h1><p style="color:#4d6577;line-height:1.6;">Este correo confirma que la conexión SMTP de la aplicación respondió correctamente.</p><p style="color:#4d6577;line-height:1.6;"><strong>Fundación La Iglesia en la Calle</strong><br>https://www.laiglesiaenlacalle.co</p></div></body></html>';
$text = "Prueba SMTP de BIBLIASOFT\n\nEste correo confirma que la conexión SMTP respondió correctamente.\n\nFundación La Iglesia en la Calle\nhttps://www.laiglesiaenlacalle.co\n";

try {
    $mail->sendMessage($to, $name, $subject, $html, $text);
    fwrite(STDOUT, "Correo de prueba enviado a {$to}\n");
    exit(0);
} catch (Throwable $e) {
    fwrite(STDERR, "Error SMTP: " . $e->getMessage() . "\n");
    fwrite(STDERR, "Revisa storage/logs/mail.log para más detalle.\n");
    exit(3);
}
