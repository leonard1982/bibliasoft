<?php

namespace App\Controllers;

use App\Services\MailService;
use App\Services\UserDataRepository;

class AuthController
{
    private $users;
    private $mail;

    public function __construct(UserDataRepository $users, MailService $mail)
    {
        $this->users = $users;
        $this->mail = $mail;
    }

    public function loginForm()
    {
        app_render('login', [
            'pageTitle' => 'Ingresar',
            'error' => isset($_GET['error']) ? trim((string) $_GET['error']) : '',
        ]);
    }

    public function registerForm()
    {
        app_render('register', [
            'pageTitle' => 'Registro',
            'error' => isset($_GET['error']) ? trim((string) $_GET['error']) : '',
        ]);
    }

    public function login()
    {
        $username = isset($_POST['username']) ? trim((string) $_POST['username']) : '';
        $password = isset($_POST['password']) ? (string) $_POST['password'] : '';

        if ($username === '' || $password === '') {
            app_redirect('?route=login&error=' . urlencode('Completa correo o usuario y contraseña.'));
        }

        $user = $this->users->verifyUser($username, $password);
        if (!$user) {
            app_redirect('?route=login&error=' . urlencode('Credenciales inválidas.'));
        }
        if (!empty($user['blocked'])) {
            app_redirect('?route=login&error=' . urlencode('Tu cuenta está desactivada. Contacta al superadministrador.'));
        }

        $_SESSION['user_id'] = (int) $user['id'];
        $_SESSION['username'] = (string) ($user['display_name'] ?? $user['username']);
        $_SESSION['user_email'] = (string) ($user['email'] ?? '');
        app_redirect('?route=reader');
    }

    public function register()
    {
        $email = isset($_POST['email']) ? trim((string) $_POST['email']) : '';
        $fullName = isset($_POST['full_name']) ? trim((string) $_POST['full_name']) : '';
        $ministry = isset($_POST['ministry']) ? trim((string) $_POST['ministry']) : '';
        $password = isset($_POST['password']) ? (string) $_POST['password'] : '';
        $password2 = isset($_POST['password_confirm']) ? (string) $_POST['password_confirm'] : '';
        $consent = isset($_POST['data_consent']) ? (string) $_POST['data_consent'] : '';

        if ($email === '' || $fullName === '' || $password === '') {
            app_redirect('?route=register&error=' . urlencode('Completa todos los campos.'));
        }
        if ($password !== $password2) {
            app_redirect('?route=register&error=' . urlencode('Las contraseñas no coinciden.'));
        }
        if ($consent !== '1') {
            app_redirect('?route=register&error=' . urlencode('Debes autorizar el tratamiento de datos para registrarte.'));
        }
        if ($this->users->getUserByEmail($email) || $this->users->getUserByUsername($email)) {
            app_redirect('?route=register&error=' . urlencode('Ese correo ya existe.'));
        }

        try {
            $id = $this->users->createUser($email, $password, $fullName, $ministry, true);
        } catch (\Throwable $e) {
            app_redirect('?route=register&error=' . urlencode($e->getMessage()));
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
        app_redirect('?route=reader');
    }

    public function logout()
    {
        unset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['user_email']);
        app_redirect('?route=home_daily');
    }

    public function admin()
    {
        $this->requireSuperAdmin();

        $selectedLog = $this->sanitizeLogFile(isset($_GET['log']) ? $_GET['log'] : '');
        $logFiles = $this->listLogFiles();
        if ($selectedLog === '' && !empty($logFiles)) {
            $selectedLog = (string) $logFiles[0]['name'];
        }

        app_render('admin', [
            'pageTitle' => 'Superadministración',
            'usersCount' => $this->users->countUsers(),
            'activeUsersCount' => $this->users->countUsersByActive(1),
            'inactiveUsersCount' => $this->users->countUsersByActive(0),
            'anecdotesCount' => $this->users->countAnecdotes(),
            'username' => isset($_SESSION['username']) ? (string) $_SESSION['username'] : 'superadmin',
            'userEmail' => auth_user_email(),
            'users' => $this->users->getUsersForAdmin(300),
            'logs' => $logFiles,
            'selectedLog' => $selectedLog,
            'logContent' => $this->readLogTail($selectedLog, 250),
            'notice' => isset($_GET['notice']) ? trim((string) $_GET['notice']) : '',
            'error' => isset($_GET['error']) ? trim((string) $_GET['error']) : '',
            'adminRoute' => superadmin_route(),
        ]);
    }

    public function adminUserUpdate()
    {
        $this->requireSuperAdmin();

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
            $this->logAdminAction('user_update', [
                'target_user_id' => $id,
                'target_email' => $email,
            ]);
        } catch (\Throwable $e) {
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

        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        $active = isset($_POST['active']) ? (int) $_POST['active'] : 0;
        $current = $this->users->getUserById($id);
        if (!$current) {
            $this->redirectAdminWithError('Usuario no encontrado.');
        }
        if ($id === auth_user_id()) {
            $this->redirectAdminWithError('No puedes desactivar tu propia cuenta desde esta sesión.');
        }
        if ($this->isProtectedSuperAdminUser($current) && $active !== 1) {
            $this->redirectAdminWithError('No puedes desactivar la cuenta principal del superadministrador.');
        }

        $this->users->setUserActive($id, $active === 1);
        $this->logAdminAction('user_toggle', [
            'target_user_id' => $id,
            'target_email' => (string) ($current['email'] ?? ''),
            'active' => $active === 1 ? 1 : 0,
        ]);
        $this->redirectAdminWithNotice($active === 1 ? 'Usuario activado.' : 'Usuario desactivado.');
    }

    public function adminUserDelete()
    {
        $this->requireSuperAdmin();

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
        $this->logAdminAction('user_delete', [
            'target_user_id' => $id,
            'target_email' => (string) ($current['email'] ?? ''),
        ]);
        $this->redirectAdminWithNotice('Usuario eliminado.');
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

    private function logAdminAction($action, array $context = [])
    {
        $path = $this->logDirectory() . DIRECTORY_SEPARATOR . 'admin.log';
        if (!is_dir(dirname($path))) {
            @mkdir(dirname($path), 0777, true);
        }

        $payload = array_merge([
            'admin_user_id' => auth_user_id(),
            'admin_email' => auth_user_email(),
            'action' => trim((string) $action),
        ], $context);
        $line = '[' . date('Y-m-d H:i:s') . '] ' . json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL;
        @file_put_contents($path, $line, FILE_APPEND);
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
}
