<?php

namespace App\Controllers;

use App\Services\BackupService;
use App\Services\MailService;
use App\Services\RecaptchaService;
use App\Services\UserDataRepository;

class AuthController
{
    private $users;
    private $mail;
    private $recaptcha;
    private $backups;

    public function __construct(UserDataRepository $users, MailService $mail, RecaptchaService $recaptcha, BackupService $backups)
    {
        $this->users = $users;
        $this->mail = $mail;
        $this->recaptcha = $recaptcha;
        $this->backups = $backups;
    }

    public function loginForm()
    {
        $next = $this->requestedNextTarget($_GET);

        app_render('login', [
            'pageTitle' => 'Ingresar',
            'error' => isset($_GET['error']) ? trim((string) $_GET['error']) : '',
            'next' => $next,
        ]);
    }

    public function registerForm()
    {
        $_SESSION['register_form_started_at'] = time();
        $next = $this->requestedNextTarget($_GET);

        app_render('register', [
            'pageTitle' => 'Registro',
            'error' => isset($_GET['error']) ? trim((string) $_GET['error']) : '',
            'next' => $next,
            'recaptchaEnabled' => $this->recaptcha->enabled(),
            'recaptchaProvider' => $this->recaptcha->provider(),
            'recaptchaMode' => $this->recaptcha->mode(),
            'recaptchaSiteKey' => $this->recaptcha->siteKey(),
            'recaptchaScriptUrl' => $this->recaptcha->scriptUrl(),
            'recaptchaAction' => $this->recaptcha->expectedAction(),
        ]);
    }

    public function login()
    {
        if (!$this->verifyCsrf()) {
            $this->redirectWithError('login', 'Sesión de formulario inválida. Intenta nuevamente.');
        }

        $username = isset($_POST['username']) ? trim((string) $_POST['username']) : '';
        $password = isset($_POST['password']) ? (string) $_POST['password'] : '';
        $ipAddress = request_client_ip();

        if ($this->isRateLimited($ipAddress, 'login')) {
            $this->logSecurity('auth.login', 'rate_limited', $username, [
                'reason' => 'too_many_attempts',
            ]);
            $this->redirectWithError('login', 'Demasiados intentos. Espera unos minutos antes de volver a intentar.');
        }

        if ($username === '' || $password === '') {
            $this->logSecurity('auth.login', 'validation_error', $username, [
                'reason' => 'missing_fields',
            ]);
            $this->redirectWithError('login', 'Completa correo o usuario y contraseña.');
        }

        $user = $this->users->verifyUser($username, $password);
        if (!$user) {
            $this->logSecurity('auth.login', 'failed', $username, [
                'reason' => 'invalid_credentials',
            ]);
            $this->redirectWithError('login', 'Credenciales inválidas.');
        }
        if (!empty($user['blocked'])) {
            $this->logSecurity('auth.login', 'blocked', $username, [
                'reason' => 'inactive_account',
                'target_user_id' => (int) ($user['id'] ?? 0),
            ]);
            $this->redirectWithError('login', 'Tu cuenta está desactivada. Contacta al superadministrador.');
        }

        $_SESSION['user_id'] = (int) $user['id'];
        $_SESSION['username'] = (string) ($user['display_name'] ?? $user['username']);
        $_SESSION['user_email'] = (string) ($user['email'] ?? '');

        $this->runDailyBackupSafely('login', (int) $user['id'], (string) ($user['email'] ?? ''));

        $this->logSecurity('auth.login', 'success', (string) ($user['email'] ?? $username), [
            'target_user_id' => (int) $user['id'],
        ], (int) $user['id']);

        app_redirect($this->postAuthRedirectTarget());
    }

    public function register()
    {
        if (!$this->verifyCsrf()) {
            $this->redirectWithError('register', 'Sesión de formulario inválida. Intenta nuevamente.');
        }

        if (!$this->verifyHoneypot()) {
            $this->logSecurity('auth.register', 'blocked', '', [
                'reason' => 'honeypot',
            ]);
            $this->redirectWithError('register', 'No se pudo procesar el registro.');
        }

        $email = isset($_POST['email']) ? trim((string) $_POST['email']) : '';
        $fullName = isset($_POST['full_name']) ? trim((string) $_POST['full_name']) : '';
        $ministry = isset($_POST['ministry']) ? trim((string) $_POST['ministry']) : '';
        $password = isset($_POST['password']) ? (string) $_POST['password'] : '';
        $password2 = isset($_POST['password_confirm']) ? (string) $_POST['password_confirm'] : '';
        $consent = isset($_POST['data_consent']) ? (string) $_POST['data_consent'] : '';
        $recaptchaToken = isset($_POST['g-recaptcha-response']) ? trim((string) $_POST['g-recaptcha-response']) : '';
        $ipAddress = request_client_ip();

        if ($this->isRateLimited($ipAddress, 'register')) {
            $this->logSecurity('auth.register', 'rate_limited', $email, [
                'reason' => 'too_many_attempts',
            ]);
            $this->redirectWithError('register', 'Demasiados intentos de registro desde esta IP. Intenta más tarde.');
        }

        if ($email === '' || $fullName === '' || $password === '') {
            $this->logSecurity('auth.register', 'validation_error', $email, [
                'reason' => 'missing_fields',
            ]);
            $this->redirectWithError('register', 'Completa todos los campos.');
        }
        if ($password !== $password2) {
            $this->logSecurity('auth.register', 'validation_error', $email, [
                'reason' => 'password_mismatch',
            ]);
            $this->redirectWithError('register', 'Las contraseñas no coinciden.');
        }
        if ($consent !== '1') {
            $this->logSecurity('auth.register', 'validation_error', $email, [
                'reason' => 'missing_consent',
            ]);
            $this->redirectWithError('register', 'Debes autorizar el tratamiento de datos para registrarte.');
        }

        $captchaResult = $this->recaptcha->verify($recaptchaToken, $ipAddress, [
            'expected_action' => 'register',
        ]);
        if (empty($captchaResult['success'])) {
            $this->logSecurity('auth.register', 'captcha_failed', $email, [
                'errors' => isset($captchaResult['errors']) ? $captchaResult['errors'] : [],
            ]);
            $this->redirectWithError('register', 'No se pudo validar el reCAPTCHA. Intenta nuevamente.');
        }

        if ($this->users->getUserByEmail($email) || $this->users->getUserByUsername($email)) {
            $this->logSecurity('auth.register', 'failed', $email, [
                'reason' => 'duplicate_email',
            ]);
            $this->redirectWithError('register', 'Ese correo ya existe.');
        }

        try {
            $id = $this->users->createUser($email, $password, $fullName, $ministry, true);
        } catch (\Throwable $e) {
            $this->logSecurity('auth.register', 'failed', $email, [
                'reason' => 'create_user_exception',
                'message' => $e->getMessage(),
            ]);
            $this->redirectWithError('register', $e->getMessage());
        }

        if ($this->mail->enabled()) {
            try {
                $this->mail->sendWelcomeEmail($email, $fullName, $ministry);
            } catch (\Throwable $e) {
                error_log('BIBLIASOFT mail error: ' . $e->getMessage());
            }
        }

        $_SESSION['user_id'] = (int) $id;
        $_SESSION['username'] = $fullName;
        $_SESSION['user_email'] = $email;

        $this->runDailyBackupSafely('register', (int) $id, $email);

        $this->logSecurity('auth.register', 'success', $email, [
            'full_name' => $fullName,
            'ministry' => $ministry,
        ], $id);

        app_redirect($this->postAuthRedirectTarget());
    }

    public function logout()
    {
        unset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['user_email']);
        app_redirect('?route=home_daily');
    }

    public function admin()
    {
        $this->requireSuperAdmin();

        $adminRoute = superadmin_route();
        $selectedLog = $this->sanitizeLogFile(isset($_GET['log']) ? $_GET['log'] : '');
        $logFiles = $this->listLogFiles();
        if ($selectedLog === '' && !empty($logFiles)) {
            $selectedLog = (string) $logFiles[0]['name'];
        }

        $userFilters = [
            'q' => isset($_GET['uq']) ? trim((string) $_GET['uq']) : '',
            'status' => isset($_GET['ustatus']) ? trim((string) $_GET['ustatus']) : 'all',
        ];
        $userPage = isset($_GET['upage']) ? (int) $_GET['upage'] : 1;
        $usersPage = $this->users->getUsersForAdminPage($userFilters, $userPage, 20);

        $eventFilters = [
            'q' => isset($_GET['eq']) ? trim((string) $_GET['eq']) : '',
            'event_type' => isset($_GET['etype']) ? trim((string) $_GET['etype']) : 'all',
            'outcome' => isset($_GET['eoutcome']) ? trim((string) $_GET['eoutcome']) : 'all',
        ];
        $eventPage = isset($_GET['epage']) ? (int) $_GET['epage'] : 1;
        $eventsPage = $this->users->getSecurityEventsPage($eventFilters, $eventPage, 18);
        $backupPage = isset($_GET['bpage']) ? (int) $_GET['bpage'] : 1;
        $backupsPage = $this->users->getSystemBackupsPage($backupPage, 12);
        $mailTemplates = $this->users->getMailTemplates();
        $mailingLists = $this->users->getMailingLists();
        $mailCampaigns = $this->users->getMailCampaigns(20);
        $selectedCampaignId = isset($_GET['campaign_log']) ? (int) $_GET['campaign_log'] : 0;
        if ($selectedCampaignId < 1 && !empty($mailCampaigns)) {
            $selectedCampaignId = (int) ($mailCampaigns[0]['id'] ?? 0);
        }
        $campaignLogs = $selectedCampaignId > 0 ? $this->users->getMailCampaignLogs($selectedCampaignId, 40) : [];

        app_render('admin', [
            'pageTitle' => 'Superadministración',
            'usersCount' => $this->users->countUsers(),
            'activeUsersCount' => $this->users->countUsersByActive(1),
            'inactiveUsersCount' => $this->users->countUsersByActive(0),
            'anecdotesCount' => $this->users->countAnecdotes(),
            'username' => isset($_SESSION['username']) ? (string) $_SESSION['username'] : 'superadmin',
            'userEmail' => auth_user_email(),
            'usersPage' => $usersPage,
            'userFilters' => $userFilters,
            'eventsPage' => $eventsPage,
            'eventFilters' => $eventFilters,
            'backupsPage' => $backupsPage,
            'dashboard' => $this->users->getSecurityDashboard(14),
            'logs' => $logFiles,
            'selectedLog' => $selectedLog,
            'logContent' => $this->readLogTail($selectedLog, 250),
            'mailTemplates' => $mailTemplates,
            'mailingLists' => $mailingLists,
            'mailCampaigns' => $mailCampaigns,
            'selectedCampaignId' => $selectedCampaignId,
            'campaignLogs' => $campaignLogs,
            'mailTemplateVariables' => $this->mailTemplateVariables(),
            'notice' => isset($_GET['notice']) ? trim((string) $_GET['notice']) : '',
            'error' => isset($_GET['error']) ? trim((string) $_GET['error']) : '',
            'adminRoute' => $adminRoute,
            'adminActionRouteBase' => $adminRoute,
            'csrfToken' => csrf_token(),
        ]);
    }

    public function adminUserUpdate()
    {
        $this->requireSuperAdmin();
        if (!$this->verifyCsrf()) {
            $this->redirectAdminWithError('Token de seguridad inválido.');
        }

        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        $email = isset($_POST['email']) ? trim((string) $_POST['email']) : '';
        $fullName = isset($_POST['full_name']) ? trim((string) $_POST['full_name']) : '';
        $ministry = isset($_POST['ministry']) ? trim((string) $_POST['ministry']) : '';
        $password = isset($_POST['password']) ? (string) $_POST['password'] : '';

        $current = $this->users->getUserById($id);
        if (!$current) {
            $this->redirectAdminWithError('Usuario no encontrado.');
        }
        if ($this->isProtectedSuperAdminUser($current) && $this->protectedAdminEmailChanged($current, $email)) {
            $this->redirectAdminWithError('Actualiza SUPERADMIN_EMAIL antes de cambiar el correo del superadministrador.');
        }

        try {
            $this->users->updateUserForAdmin($id, $email, $fullName, $ministry, $password);
            $this->logSecurity('admin.user.update', 'success', $email, [
                'target_user_id' => $id,
            ]);
        } catch (\Throwable $e) {
            $this->logSecurity('admin.user.update', 'failed', $email, [
                'target_user_id' => $id,
                'message' => $e->getMessage(),
            ]);
            $this->redirectAdminWithError($e->getMessage());
        }

        if ($id === auth_user_id()) {
            $_SESSION['username'] = $fullName !== '' ? $fullName : $email;
            $_SESSION['user_email'] = $email;
        }

        $this->redirectAdminWithNotice('Usuario actualizado.');
    }

    public function adminUserToggle()
    {
        $this->requireSuperAdmin();
        if (!$this->verifyCsrf()) {
            $this->redirectAdminWithError('Token de seguridad inválido.');
        }

        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        $active = isset($_POST['active']) ? (int) $_POST['active'] : 0;
        $current = $this->users->getUserById($id);
        if (!$current) {
            $this->redirectAdminWithError('Usuario no encontrado.');
        }
        if ($id === auth_user_id()) {
            $this->redirectAdminWithError('No puedes cambiar el estado de tu propia cuenta desde esta sesión.');
        }
        if ($this->isProtectedSuperAdminUser($current) && $active !== 1) {
            $this->redirectAdminWithError('No puedes desactivar la cuenta principal del superadministrador.');
        }

        $this->users->setUserActive($id, $active === 1);
        $this->logSecurity('admin.user.toggle', 'success', (string) ($current['email'] ?? ''), [
            'target_user_id' => $id,
            'active' => $active === 1 ? 1 : 0,
        ]);
        $this->redirectAdminWithNotice($active === 1 ? 'Usuario activado.' : 'Usuario desactivado.');
    }

    public function adminUserDelete()
    {
        $this->requireSuperAdmin();
        if (!$this->verifyCsrf()) {
            $this->redirectAdminWithError('Token de seguridad inválido.');
        }

        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        $current = $this->users->getUserById($id);
        if (!$current) {
            $this->redirectAdminWithError('Usuario no encontrado.');
        }
        if ($id === auth_user_id()) {
            $this->redirectAdminWithError('No puedes borrar tu propia cuenta desde esta sesión.');
        }
        if ($this->isProtectedSuperAdminUser($current)) {
            $this->redirectAdminWithError('No puedes borrar la cuenta principal del superadministrador.');
        }

        $this->users->deleteUser($id);
        $this->logSecurity('admin.user.delete', 'success', (string) ($current['email'] ?? ''), [
            'target_user_id' => $id,
        ]);
        $this->redirectAdminWithNotice('Usuario eliminado.');
    }

    public function adminBackupCreate()
    {
        $this->requireSuperAdmin();
        if (!$this->verifyCsrf()) {
            $this->redirectAdminWithError('Token de seguridad inválido.');
        }

        try {
            $backup = $this->backups->createBackup('manual', auth_user_id(), auth_user_email());
            $this->logSecurity('admin.backup.create', 'success', auth_user_email(), [
                'backup_id' => (int) ($backup['id'] ?? 0),
                'file_name' => (string) ($backup['file_name'] ?? ''),
            ], auth_user_id());
            $this->redirectAdminWithNotice('Backup manual generado correctamente.');
        } catch (\Throwable $e) {
            $this->logSecurity('admin.backup.create', 'failed', auth_user_email(), [
                'message' => $e->getMessage(),
            ], auth_user_id());
            $this->redirectAdminWithError('No se pudo generar el backup: ' . $e->getMessage());
        }
    }

    public function adminBackupDownload()
    {
        $this->requireSuperAdmin();
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $backup = $this->users->getSystemBackupById($id);
        if (!$backup) {
            http_response_code(404);
            exit('Backup no encontrado');
        }

        $path = trim((string) ($backup['file_path'] ?? ''));
        $realFile = $path !== '' ? realpath($path) : false;
        $realDir = realpath(rtrim((string) config('app.base_path', dirname(__DIR__, 2)), DIRECTORY_SEPARATOR)
            . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'backups');
        if ($realFile === false || $realDir === false || strpos($realFile, $realDir) !== 0 || !is_file($realFile)) {
            http_response_code(404);
            exit('Archivo de backup no disponible');
        }

        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . (string) filesize($realFile));
        header('Content-Disposition: attachment; filename="' . basename($realFile) . '"');
        readfile($realFile);
        exit;
    }

    public function adminMailTemplateSave()
    {
        $this->requireSuperAdmin();
        if (!$this->verifyCsrf()) {
            $this->redirectAdminWithError('Token de seguridad inválido.');
        }

        try {
            $id = $this->users->saveMailTemplate(
                isset($_POST['id']) ? (int) $_POST['id'] : 0,
                isset($_POST['template_key']) ? (string) $_POST['template_key'] : '',
                isset($_POST['name']) ? (string) $_POST['name'] : '',
                isset($_POST['category']) ? (string) $_POST['category'] : 'campaign',
                isset($_POST['subject_template']) ? (string) $_POST['subject_template'] : '',
                isset($_POST['css_template']) ? (string) $_POST['css_template'] : '',
                isset($_POST['html_template']) ? (string) $_POST['html_template'] : '',
                isset($_POST['text_template']) ? (string) $_POST['text_template'] : '',
                isset($_POST['enabled']) ? 1 : 0
            );
            $this->logSecurity('admin.mail.template.save', 'success', auth_user_email(), [
                'template_id' => $id,
            ], auth_user_id());
            $this->redirectAdminWithNotice('Plantilla guardada correctamente.');
        } catch (\Throwable $e) {
            $this->logSecurity('admin.mail.template.save', 'failed', auth_user_email(), [
                'message' => $e->getMessage(),
            ], auth_user_id());
            $this->redirectAdminWithError($e->getMessage());
        }
    }

    public function adminMailTemplateGenerate()
    {
        $this->requireSuperAdmin();
        if (!$this->verifyCsrf()) {
            app_json(['error' => 'Token de seguridad inválido.'], 422);
        }

        try {
            $draft = $this->generateMailTemplateDraft([
                'category' => isset($_POST['category']) ? (string) $_POST['category'] : 'campaign',
                'name' => isset($_POST['name']) ? (string) $_POST['name'] : '',
                'goal' => isset($_POST['goal']) ? (string) $_POST['goal'] : '',
                'audience' => isset($_POST['audience']) ? (string) $_POST['audience'] : '',
                'tone' => isset($_POST['tone']) ? (string) $_POST['tone'] : '',
                'cta' => isset($_POST['cta']) ? (string) $_POST['cta'] : '',
                'extra_prompt' => isset($_POST['extra_prompt']) ? (string) $_POST['extra_prompt'] : '',
                'include_events' => isset($_POST['include_events']) ? 1 : 0,
            ]);
            $this->logSecurity('admin.mail.template.generate', 'success', auth_user_email(), [
                'category' => (string) ($draft['category'] ?? 'campaign'),
                'name' => (string) ($draft['name'] ?? ''),
            ], auth_user_id());
            app_json([
                'ok' => true,
                'template' => $draft,
            ]);
        } catch (\Throwable $e) {
            $this->logSecurity('admin.mail.template.generate', 'failed', auth_user_email(), [
                'message' => $e->getMessage(),
            ], auth_user_id());
            app_json(['error' => $e->getMessage()], 422);
        }
    }

    public function adminMailTemplateTest()
    {
        $this->requireSuperAdmin();
        if (!$this->verifyCsrf()) {
            app_json(['error' => 'Token de seguridad inválido.'], 422);
        }
        if (!$this->mail->enabled()) {
            app_json(['error' => 'El SMTP no está habilitado en esta instalación.'], 422);
        }

        $toEmail = trim((string) ($_POST['test_email'] ?? auth_user_email()));
        if ($toEmail === '' || !filter_var($toEmail, FILTER_VALIDATE_EMAIL)) {
            app_json(['error' => 'Correo de prueba inválido.'], 422);
        }

        $category = trim((string) ($_POST['category'] ?? 'campaign'));
        $template = [
            'subject_template' => (string) ($_POST['subject_template'] ?? ''),
            'css_template' => (string) ($_POST['css_template'] ?? ''),
            'html_template' => (string) ($_POST['html_template'] ?? ''),
            'text_template' => (string) ($_POST['text_template'] ?? ''),
        ];
        $testName = trim((string) ($_POST['test_name'] ?? 'Juan Pérez'));
        $testMinistry = trim((string) ($_POST['test_ministry'] ?? 'Equipo pastoral'));
        $campaignName = $category === 'welcome' ? 'Bienvenida de prueba' : 'Boletín de prueba';
        $contentHtml = trim((string) ($_POST['test_content_html'] ?? '<p>Este es un envío de prueba generado desde el panel de superadministración.</p><p>Úsalo para validar diseño, espaciado, tipografía y visualización móvil.</p>'));
        $contentText = trim((string) ($_POST['test_content_text'] ?? 'Este es un envío de prueba generado desde el panel de superadministración. Úsalo para validar diseño, espaciado, tipografía y visualización móvil.'));

        try {
            $message = $this->mail->composeTemplateMessage($template, $this->buildMailVariablesForRecipient([
                'email' => $toEmail,
                'full_name' => $testName,
                'ministry' => $testMinistry,
            ], $campaignName, $contentHtml, $contentText));
            $this->mail->sendMessage($toEmail, $testName, $message['subject'], $message['html'], $message['text']);
            $this->logSecurity('admin.mail.template.test', 'sent', $toEmail, [
                'category' => $category === 'welcome' ? 'welcome' : 'campaign',
            ], auth_user_id());
            app_json([
                'ok' => true,
                'message' => 'Correo de prueba enviado a ' . $toEmail . '.',
            ]);
        } catch (\Throwable $e) {
            $this->logSecurity('admin.mail.template.test', 'failed', $toEmail, [
                'message' => $e->getMessage(),
            ], auth_user_id());
            app_json(['error' => $e->getMessage()], 422);
        }
    }

    public function adminMailListSave()
    {
        $this->requireSuperAdmin();
        if (!$this->verifyCsrf()) {
            $this->redirectAdminWithError('Token de seguridad inválido.');
        }

        try {
            $id = $this->users->saveMailingList(
                isset($_POST['id']) ? (int) $_POST['id'] : 0,
                isset($_POST['name']) ? (string) $_POST['name'] : '',
                isset($_POST['description']) ? (string) $_POST['description'] : '',
                isset($_POST['list_type']) ? (string) $_POST['list_type'] : 'all_active',
                isset($_POST['ministry_filter']) ? (string) $_POST['ministry_filter'] : '',
                isset($_POST['manual_emails']) ? (string) $_POST['manual_emails'] : '',
                isset($_POST['active_only']) ? 1 : 0
            );
            $this->logSecurity('admin.mail.list.save', 'success', auth_user_email(), [
                'list_id' => $id,
            ], auth_user_id());
            $this->redirectAdminWithNotice('Lista de envío guardada correctamente.');
        } catch (\Throwable $e) {
            $this->logSecurity('admin.mail.list.save', 'failed', auth_user_email(), [
                'message' => $e->getMessage(),
            ], auth_user_id());
            $this->redirectAdminWithError($e->getMessage());
        }
    }

    public function adminMailCampaignSave()
    {
        $this->requireSuperAdmin();
        if (!$this->verifyCsrf()) {
            $this->redirectAdminWithError('Token de seguridad inválido.');
        }

        try {
            $id = $this->persistMailCampaignFromRequest();
            $this->logSecurity('admin.mail.campaign.save', 'success', auth_user_email(), [
                'campaign_id' => $id,
            ], auth_user_id());
            $this->redirectAdminWithNotice('Campaña guardada correctamente.');
        } catch (\Throwable $e) {
            $this->logSecurity('admin.mail.campaign.save', 'failed', auth_user_email(), [
                'message' => $e->getMessage(),
            ], auth_user_id());
            $this->redirectAdminWithError($e->getMessage());
        }
    }

    public function adminMailCampaignSend()
    {
        $this->requireSuperAdmin();
        if (!$this->verifyCsrf()) {
            $this->redirectAdminWithError('Token de seguridad inválido.');
        }
        if (!$this->mail->enabled()) {
            $this->redirectAdminWithError('El correo SMTP no está habilitado en esta instalación.');
        }

        try {
            $campaignId = $this->persistMailCampaignFromRequest();
            $campaign = $this->users->getMailCampaignById($campaignId);
            if (!$campaign) {
                throw new \RuntimeException('No se encontró la campaña.');
            }
            $template = $this->users->getMailTemplateById((int) ($campaign['template_id'] ?? 0));
            if (!$template) {
                throw new \RuntimeException('No se encontró la plantilla seleccionada.');
            }
            $recipients = $this->users->resolveMailingListRecipients((int) ($campaign['list_id'] ?? 0), 2500);
            if (empty($recipients)) {
                throw new \RuntimeException('La lista seleccionada no tiene destinatarios válidos.');
            }

            $success = 0;
            $failed = 0;
            foreach ($recipients as $recipient) {
                $email = trim((string) ($recipient['email'] ?? ''));
                if ($email === '') {
                    continue;
                }

                $message = $this->mail->composeTemplateMessage($template, $this->buildMailVariablesForRecipient(
                    $recipient,
                    (string) ($campaign['name'] ?? 'Campaña'),
                    (string) ($campaign['content_html'] ?? ''),
                    (string) ($campaign['content_text'] ?? '')
                ), [
                    'subject_template' => trim((string) ($campaign['subject_override'] ?? '')),
                ]);

                try {
                    $this->mail->sendMessage($email, (string) ($recipient['full_name'] ?? ''), $message['subject'], $message['html'], $message['text']);
                    $this->users->logMailCampaignDelivery($campaignId, (int) ($recipient['id'] ?? 0), $email, 'sent', '');
                    $success++;
                } catch (\Throwable $e) {
                    $this->users->logMailCampaignDelivery($campaignId, (int) ($recipient['id'] ?? 0), $email, 'failed', $e->getMessage());
                    $failed++;
                }
            }

            $this->users->markMailCampaignSent($campaignId, $failed > 0 ? 'sent_with_errors' : 'sent');
            $this->logSecurity('admin.mail.campaign.send', 'success', auth_user_email(), [
                'campaign_id' => $campaignId,
                'sent' => $success,
                'failed' => $failed,
            ], auth_user_id());
            $this->redirectAdminWithNotice('Campaña enviada. OK: ' . $success . ' · Fallidos: ' . $failed);
        } catch (\Throwable $e) {
            $this->logSecurity('admin.mail.campaign.send', 'failed', auth_user_email(), [
                'message' => $e->getMessage(),
            ], auth_user_id());
            $this->redirectAdminWithError($e->getMessage());
        }
    }

    private function requireSuperAdmin()
    {
        if (auth_user_id() < 1) {
            app_redirect('?route=login');
        }
        if (!auth_is_superadmin()) {
            app_redirect('?route=reader');
        }
    }

    private function verifyCsrf()
    {
        $token = isset($_POST['_csrf']) ? (string) $_POST['_csrf'] : '';
        return csrf_verify_request($token);
    }

    private function runDailyBackupSafely($triggerType, $userId, $email)
    {
        try {
            $this->backups->ensureDailyBackup((string) $triggerType, (int) $userId, (string) $email);
        } catch (\Throwable $e) {
            $this->users->logSecurityEvent('system.backup', [
                'route' => isset($_GET['route']) ? (string) $_GET['route'] : '',
                'request_method' => isset($_SERVER['REQUEST_METHOD']) ? (string) $_SERVER['REQUEST_METHOD'] : 'GET',
                'outcome' => 'failed',
                'ip_address' => request_client_ip(),
                'email' => (string) $email,
                'user_id' => (int) $userId,
                'referrer' => isset($_SERVER['HTTP_REFERER']) ? (string) $_SERVER['HTTP_REFERER'] : '',
                'user_agent' => isset($_SERVER['HTTP_USER_AGENT']) ? (string) $_SERVER['HTTP_USER_AGENT'] : '',
                'meta' => [
                    'trigger_type' => (string) $triggerType,
                    'message' => $e->getMessage(),
                ],
            ]);
        }
    }

    private function verifyHoneypot()
    {
        $trapFields = [
            isset($_POST['company']) ? trim((string) $_POST['company']) : '',
            isset($_POST['contact_website']) ? trim((string) $_POST['contact_website']) : '',
        ];

        foreach ($trapFields as $trap) {
            if ($trap !== '') {
                return false;
            }
        }

        $startedAt = isset($_SESSION['register_form_started_at']) ? (int) $_SESSION['register_form_started_at'] : 0;
        unset($_SESSION['register_form_started_at']);
        if ($startedAt > 0 && (time() - $startedAt) < 1) {
            return false;
        }

        return true;
    }

    private function isRateLimited($ipAddress, $channel)
    {
        $channel = trim((string) $channel);
        if ($channel === 'register') {
            $count = $this->users->countRecentSecurityEventsByIp(
                $ipAddress,
                ['auth.register'],
                (int) config('security.register_window_seconds', 3600),
                '',
                'success'
            );
            return $count >= (int) config('security.register_max_attempts', 8);
        }

        $count = $this->users->countRecentSecurityEventsByIp(
            $ipAddress,
            ['auth.login'],
            (int) config('security.login_window_seconds', 900),
            '',
            'success'
        );
        return $count >= (int) config('security.login_max_attempts', 10);
    }

    private function redirectWithError($route, $message)
    {
        $params = [
            'route' => trim((string) $route),
            'error' => trim((string) $message),
        ];
        $next = $this->requestedNextTarget($_POST);
        if ($next === '') {
            $next = $this->requestedNextTarget($_GET);
        }
        if ($next !== '') {
            $params['next'] = $next;
        }
        app_redirect('?' . http_build_query($params));
    }

    private function requestedNextTarget(array $source)
    {
        $next = isset($source['next']) ? (string) $source['next'] : '';
        return $this->sanitizeNextTarget($next);
    }

    private function sanitizeNextTarget($target)
    {
        $target = trim((string) $target);
        if ($target === '' || $target[0] !== '?') {
            return '';
        }
        if (strpos($target, '//') !== false || preg_match('/[\r\n]/', $target)) {
            return '';
        }

        return $target;
    }

    private function postAuthRedirectTarget()
    {
        $next = $this->requestedNextTarget($_POST);
        if ($next !== '') {
            return $next;
        }

        return app_route_url('reader');
    }

    private function adminUrl(array $params = [])
    {
        $query = array_merge(['route' => superadmin_route()], $params);
        return '?' . http_build_query($query);
    }

    private function redirectAdminWithNotice($message)
    {
        app_redirect($this->adminUrl(['notice' => trim((string) $message)]));
    }

    private function redirectAdminWithError($message)
    {
        app_redirect($this->adminUrl(['error' => trim((string) $message)]));
    }

    private function logDirectory()
    {
        return rtrim((string) config('app.base_path', dirname(__DIR__, 2)), DIRECTORY_SEPARATOR)
            . DIRECTORY_SEPARATOR . 'storage'
            . DIRECTORY_SEPARATOR . 'logs';
    }

    private function listLogFiles()
    {
        $dir = $this->logDirectory();
        if (!is_dir($dir)) {
            return [];
        }

        $files = glob($dir . DIRECTORY_SEPARATOR . '*.log');
        if (!is_array($files)) {
            return [];
        }

        $rows = [];
        foreach ($files as $path) {
            if (!is_file($path)) {
                continue;
            }
            $rows[] = [
                'name' => basename($path),
                'size' => (int) filesize($path),
                'modified_at' => date('Y-m-d H:i:s', (int) filemtime($path)),
            ];
        }

        usort($rows, static function (array $a, array $b): int {
            return strcmp((string) $b['modified_at'], (string) $a['modified_at']);
        });

        return $rows;
    }

    private function readLogTail($filename, $maxLines = 250)
    {
        $filename = $this->sanitizeLogFile($filename);
        if ($filename === '') {
            return '';
        }

        $path = $this->logDirectory() . DIRECTORY_SEPARATOR . $filename;
        $realLogDir = realpath($this->logDirectory());
        $realFile = realpath($path);
        if ($realLogDir === false || $realFile === false || strpos($realFile, $realLogDir) !== 0 || !is_file($realFile)) {
            return '';
        }

        $lines = @file($realFile, FILE_IGNORE_NEW_LINES);
        if (!is_array($lines) || empty($lines)) {
            return '';
        }

        $slice = array_slice($lines, -max(20, (int) $maxLines));
        return implode("\n", $slice);
    }

    private function sanitizeLogFile($filename)
    {
        $filename = basename(trim((string) $filename));
        return preg_match('/^[a-zA-Z0-9._-]+\.log$/', $filename) ? $filename : '';
    }

    private function isProtectedSuperAdminUser(array $user)
    {
        $targetId = (int) ($user['id'] ?? 0);
        $targetEmail = trim((string) ($user['email'] ?? ''));
        $configId = (int) config('admin.user_id', 1);
        $configEmail = trim((string) config('admin.email', ''));

        if ($configId > 0 && $targetId === $configId) {
            return true;
        }
        if ($configEmail !== '' && $targetEmail !== '' && strcasecmp($configEmail, $targetEmail) === 0) {
            return true;
        }
        return false;
    }

    private function protectedAdminEmailChanged(array $user, $newEmail)
    {
        $configEmail = trim((string) config('admin.email', ''));
        if ($configEmail === '') {
            return false;
        }

        $currentEmail = trim((string) ($user['email'] ?? ''));
        $newEmail = trim((string) $newEmail);
        return $currentEmail !== '' && strcasecmp($currentEmail, $configEmail) === 0 && strcasecmp($currentEmail, $newEmail) !== 0;
    }

    private function persistMailCampaignFromRequest()
    {
        return $this->users->saveMailCampaign(
            isset($_POST['campaign_id']) ? (int) $_POST['campaign_id'] : 0,
            isset($_POST['campaign_name']) ? (string) $_POST['campaign_name'] : '',
            isset($_POST['template_id']) ? (int) $_POST['template_id'] : 0,
            isset($_POST['list_id']) ? (int) $_POST['list_id'] : 0,
            isset($_POST['subject_override']) ? (string) $_POST['subject_override'] : '',
            isset($_POST['content_html']) ? (string) $_POST['content_html'] : '',
            isset($_POST['content_text']) ? (string) $_POST['content_text'] : ''
        );
    }

    private function buildMailVariablesForRecipient(array $recipient, $campaignName, $contentHtml, $contentText)
    {
        $fullName = trim((string) ($recipient['full_name'] ?? ''));
        $email = trim((string) ($recipient['email'] ?? ''));
        $ministry = trim((string) ($recipient['ministry'] ?? ''));
        $websiteUrl = trim((string) config('branding.website_url', 'https://www.laiglesiaenlacalle.co'));
        $publicUrl = trim((string) config('app.public_url', ''));

        return [
            'app_short' => (string) config('branding.app_short', 'BIBLIASOFT'),
            'app_name' => (string) config('branding.app_name', 'Biblia para todos'),
            'church_name' => (string) config('branding.church_name', 'Fundación La Iglesia en la Calle'),
            'website_url' => $websiteUrl,
            'access_url' => $publicUrl !== '' ? $publicUrl : $websiteUrl,
            'full_name' => $fullName !== '' ? $fullName : 'hermano(a)',
            'email' => $email,
            'ministry' => $ministry,
            'ministry_line' => $ministry !== '' ? 'Ministerio: ' . $ministry : 'Ministerio: No especificado',
            'campaign_name' => trim((string) $campaignName) !== '' ? trim((string) $campaignName) : 'Noticias',
            'content_html' => trim((string) $contentHtml),
            'content_text' => trim((string) $contentText),
        ];
    }

    private function mailTemplateVariables()
    {
        return [
            '{{full_name}}',
            '{{email}}',
            '{{ministry}}',
            '{{ministry_line}}',
            '{{campaign_name}}',
            '{{content_html}}',
            '{{content_text}}',
            '{{app_short}}',
            '{{app_name}}',
            '{{church_name}}',
            '{{website_url}}',
            '{{access_url}}',
        ];
    }

    private function generateMailTemplateDraft(array $input)
    {
        $category = trim((string) ($input['category'] ?? 'campaign')) === 'welcome' ? 'welcome' : 'campaign';
        $name = trim((string) ($input['name'] ?? ''));
        $goal = trim((string) ($input['goal'] ?? ''));
        $audience = trim((string) ($input['audience'] ?? ''));
        $tone = trim((string) ($input['tone'] ?? 'cercano y esperanzador'));
        $cta = trim((string) ($input['cta'] ?? 'Entrar a BIBLIASOFT'));
        $extraPrompt = trim((string) ($input['extra_prompt'] ?? ''));
        $includeEvents = !empty($input['include_events']);

        if ($name === '') {
            $name = $category === 'welcome' ? 'Bienvenida pastoral' : 'Boletín ministerial';
        }
        if ($goal === '') {
            $goal = $category === 'welcome'
                ? 'dar una bienvenida cálida, clara y pastoral a los nuevos registrados'
                : 'informar noticias, recursos bíblicos, llamados pastorales y eventos de la comunidad';
        }
        if ($audience === '') {
            $audience = $category === 'welcome'
                ? 'nuevos usuarios que acaban de registrarse'
                : 'usuarios registrados de BIBLIASOFT y miembros de la comunidad';
        }

        $draft = $this->fallbackMailTemplateDraft($category, $name, $goal, $audience, $tone, $cta, $includeEvents, $extraPrompt);
        $ai = $this->generateMailTemplateWithAi($category, $name, $goal, $audience, $tone, $cta, $includeEvents, $extraPrompt);
        if (is_array($ai)) {
            $draft = array_merge($draft, array_filter($ai, function ($value) {
                return is_string($value) && trim($value) !== '';
            }));
        }

        $draft['category'] = $category;
        $draft['name'] = trim((string) ($draft['name'] ?? $name));
        $draft['subject_template'] = trim((string) ($draft['subject_template'] ?? ''));
        $draft['css_template'] = (string) ($draft['css_template'] ?? '');
        $draft['html_template'] = (string) ($draft['html_template'] ?? '');
        $draft['text_template'] = (string) ($draft['text_template'] ?? '');
        $draft['template_key'] = $this->suggestTemplateKey($draft['name'], $category);

        return $draft;
    }

    private function generateMailTemplateWithAi($category, $name, $goal, $audience, $tone, $cta, $includeEvents, $extraPrompt)
    {
        $aiConfig = config('ai', []);
        $enabled = !empty($aiConfig['enabled']);
        $apiKey = trim((string) ($aiConfig['api_key'] ?? ''));
        if (!$enabled || $apiKey === '' || !function_exists('curl_init')) {
            return null;
        }

        $appShort = (string) config('branding.app_short', 'BIBLIASOFT');
        $appName = (string) config('branding.app_name', 'Biblia para todos');
        $churchName = (string) config('branding.church_name', 'Fundación La Iglesia en la Calle');
        $websiteUrl = (string) config('branding.website_url', 'https://www.laiglesiaenlacalle.co');
        $publicUrl = trim((string) config('app.public_url', ''));
        $accessUrl = $publicUrl !== '' ? $publicUrl : $websiteUrl;
        $model = (string) ($aiConfig['model'] ?? 'gpt-4.1-mini');

        $prompt = "Eres un diseñador senior de emails HTML y copywriter pastoral en español.\n"
            . "Genera SOLO un JSON válido con estas claves: name, subject_template, css_template, html_template, text_template.\n"
            . "Marca: {$appShort} / {$appName}. Organización: {$churchName}. Sitio: {$websiteUrl}. Acceso: {$accessUrl}.\n"
            . "Categoría: {$category}.\n"
            . "Nombre de la plantilla: {$name}.\n"
            . "Objetivo: {$goal}.\n"
            . "Audiencia: {$audience}.\n"
            . "Tono: {$tone}.\n"
            . "CTA principal: {$cta}.\n"
            . "Incluir eventos: " . ($includeEvents ? 'sí' : 'no') . ".\n"
            . "Debe usar variables {{full_name}}, {{email}}, {{ministry}}, {{ministry_line}}, {{campaign_name}}, {{content_html}}, {{content_text}}, {{app_short}}, {{app_name}}, {{church_name}}, {{website_url}}, {{access_url}}.\n"
            . "Si es bienvenida, el HTML debe ser utilizable como correo de registro. Si es campaña, debe dejar el bloque principal en {{content_html}}.\n"
            . "El CSS debe ser profesional, responsive y apto para email. El HTML debe ser limpio, visual, sobrio y listo para inline CSS en <style>.\n"
            . ($extraPrompt !== '' ? ("Instrucción adicional: {$extraPrompt}\n") : '')
            . "No agregues markdown, no agregues explicación. Devuelve solo JSON.";

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
        curl_setopt($ch, CURLOPT_TIMEOUT, 35);
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

        $output = '';
        if (isset($json['output_text']) && is_string($json['output_text'])) {
            $output = $json['output_text'];
        } elseif (isset($json['output']) && is_array($json['output'])) {
            foreach ($json['output'] as $block) {
                if (!isset($block['content']) || !is_array($block['content'])) {
                    continue;
                }
                foreach ($block['content'] as $part) {
                    if (isset($part['text']) && is_string($part['text'])) {
                        $output .= $part['text'];
                    }
                }
            }
        }

        $output = trim((string) $output);
        if ($output === '') {
            return null;
        }

        $decoded = json_decode($output, true);
        if (!is_array($decoded)) {
            $start = strpos($output, '{');
            $end = strrpos($output, '}');
            if ($start !== false && $end !== false && $end > $start) {
                $decoded = json_decode(substr($output, $start, $end - $start + 1), true);
            }
        }

        return is_array($decoded) ? $decoded : null;
    }

    private function fallbackMailTemplateDraft($category, $name, $goal, $audience, $tone, $cta, $includeEvents, $extraPrompt)
    {
        $appShort = (string) config('branding.app_short', 'BIBLIASOFT');
        $appName = (string) config('branding.app_name', 'Biblia para todos');
        $churchName = (string) config('branding.church_name', 'Fundación La Iglesia en la Calle');
        $websiteUrl = (string) config('branding.website_url', 'https://www.laiglesiaenlacalle.co');

        $subject = $category === 'welcome'
            ? 'Bienvenido a {{app_short}}, {{full_name}}'
            : '{{campaign_name}} | {{app_short}}';
        $chip = $category === 'welcome' ? 'Bienvenida' : 'Noticias y recursos';
        $headline = $category === 'welcome'
            ? 'Nos alegra recibirte en {{app_short}}'
            : '{{campaign_name}}';
        $subline = $category === 'welcome'
            ? 'Tu acceso gratuito ya quedó activo para ayudarte a estudiar la Biblia con orden, profundidad y constancia.'
            : 'Recursos, noticias y llamados pastorales desde {{church_name}}.';
        $intro = $category === 'welcome'
            ? '<p>Hola <strong>{{full_name}}</strong>,</p><p>Gracias por registrarte. Queremos servirte con una plataforma clara, práctica y completamente gratuita para impulsar el estudio de la Biblia y seguir llegando a más lugares con el evangelio.</p><p>{{ministry_line}}</p>'
            : '<p>Hola <strong>{{full_name}}</strong>,</p><p>Compartimos contigo una actualización preparada para nuestra comunidad. Queremos mantenerte al tanto de nuevos recursos, noticias y espacios de encuentro que fortalezcan tu caminar con la Palabra.</p>';
        $eventsBlock = $includeEvents
            ? '<div class="mail-card"><h3>Eventos y comunidad</h3><p>También seguiremos compartiendo convocatorias online y presenciales en tu ciudad para seguir creciendo juntos en el estudio bíblico.</p></div>'
            : '';
        $extraBlock = $extraPrompt !== ''
            ? '<div class="mail-card"><h3>Enfoque editorial</h3><p>' . $this->escape($extraPrompt) . '</p></div>'
            : '';

        $css = "body{margin:0;padding:0;background:#edf3f7;font-family:Verdana,Segoe UI,Arial,sans-serif;color:#163447}.mail-wrap{max-width:760px;margin:0 auto;background:#ffffff;border-radius:28px;overflow:hidden;box-shadow:0 18px 48px rgba(9,31,46,.14)}.mail-hero{padding:34px 36px;background:linear-gradient(135deg,#102a3c 0%,#1f5270 52%,#2a86ae 100%);color:#fff}.mail-chip{display:inline-block;padding:7px 13px;border-radius:999px;border:1px solid rgba(224,241,250,.35);color:#dceef8;font-size:12px;letter-spacing:.08em;text-transform:uppercase}.mail-hero h1{margin:18px 0 10px;font-size:34px;line-height:1.08;font-family:Georgia,Times New Roman,serif}.mail-hero p{margin:0;color:#d7ebf8;font-size:16px;line-height:1.7}.mail-body{padding:32px 36px}.mail-body p,.mail-body li{font-size:15px;line-height:1.75;color:#425b6d}.mail-card{margin:18px 0;padding:18px 20px;border-radius:20px;background:#f5fafc;border:1px solid #d8e7f0}.mail-card h3{margin:0 0 8px;color:#17384c}.mail-cta{display:inline-block;margin-top:8px;padding:14px 22px;border-radius:14px;background:#195f86;color:#fff;text-decoration:none;font-weight:700}.mail-footer{padding:22px 36px;background:#f2f7fa;border-top:1px solid #dde7ef;color:#688193;font-size:12px;line-height:1.7}.mail-meta{display:grid;gap:8px;margin:18px 0 10px}.mail-meta strong{color:#163447}@media only screen and (max-width:640px){.mail-hero,.mail-body,.mail-footer{padding:24px 20px}.mail-hero h1{font-size:28px}}";

        $html = '<div class="mail-wrap">'
            . '<div class="mail-hero">'
            . '<div class="mail-chip">' . $chip . '</div>'
            . '<h1>' . $headline . '</h1>'
            . '<p>' . $subline . '</p>'
            . '</div>'
            . '<div class="mail-body">'
            . $intro
            . '<div class="mail-card"><h3>Propósito</h3><p>' . $this->escape($goal) . '</p></div>'
            . '<div class="mail-card"><h3>Audiencia</h3><p>' . $this->escape($audience) . '</p><p>Tono sugerido: ' . $this->escape($tone) . '.</p></div>'
            . '{{content_html}}'
            . $eventsBlock
            . $extraBlock
            . '<p><a class="mail-cta" href="{{access_url}}">' . $this->escape($cta) . '</a></p>'
            . '</div>'
            . '<div class="mail-footer">Enviado por {{church_name}} · <a href="{{website_url}}">{{website_url}}</a><br>{{app_name}} · {{app_short}}</div>'
            . '</div>';

        $text = ($category === 'welcome' ? 'Hola {{full_name}}, bienvenido a {{app_short}}.' : 'Hola {{full_name}}, compartimos contigo {{campaign_name}}.')
            . "\n\nObjetivo: " . $goal
            . "\nAudiencia: " . $audience
            . "\nTono: " . $tone
            . "\n\n{{content_text}}\n\n"
            . ($includeEvents ? "También recibirás noticias de eventos online y presenciales.\n\n" : '')
            . $cta . ": {{access_url}}\n\n{{church_name}}\n{{website_url}}";

        return [
            'name' => $name,
            'subject_template' => $subject,
            'css_template' => $css,
            'html_template' => $html,
            'text_template' => $text,
        ];
    }

    private function suggestTemplateKey($name, $category)
    {
        $raw = trim((string) $name);
        if ($raw === '') {
            return $category === 'welcome' ? 'welcome_draft' : 'campaign_draft';
        }
        $slug = preg_replace('/[^a-z0-9]+/i', '_', strtolower($raw));
        $slug = trim((string) $slug, '_');
        if ($slug === '') {
            $slug = $category === 'welcome' ? 'welcome_draft' : 'campaign_draft';
        }
        return $slug;
    }

    private function logSecurity($eventType, $outcome, $email = '', array $meta = [], $userId = 0)
    {
        $this->users->logSecurityEvent($eventType, [
            'route' => isset($_GET['route']) ? (string) $_GET['route'] : '',
            'request_method' => isset($_SERVER['REQUEST_METHOD']) ? (string) $_SERVER['REQUEST_METHOD'] : 'GET',
            'outcome' => $outcome,
            'ip_address' => request_client_ip(),
            'email' => trim((string) $email),
            'user_id' => (int) $userId,
            'referrer' => isset($_SERVER['HTTP_REFERER']) ? (string) $_SERVER['HTTP_REFERER'] : '',
            'user_agent' => isset($_SERVER['HTTP_USER_AGENT']) ? (string) $_SERVER['HTTP_USER_AGENT'] : '',
            'meta' => $meta,
        ]);
    }
}
