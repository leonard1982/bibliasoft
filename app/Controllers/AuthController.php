<?php

namespace App\Controllers;

use App\Services\UserDataRepository;

class AuthController
{
    private $users;

    public function __construct(UserDataRepository $users)
    {
        $this->users = $users;
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

        $_SESSION['user_id'] = (int) $user['id'];
        $_SESSION['username'] = (string) ($user['display_name'] ?? $user['username']);
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

        $_SESSION['user_id'] = (int) $id;
        $_SESSION['username'] = $fullName;
        app_redirect('?route=reader');
    }

    public function logout()
    {
        unset($_SESSION['user_id'], $_SESSION['username']);
        app_redirect('?route=home_daily');
    }

    public function admin()
    {
        if (empty($_SESSION['user_id'])) {
            app_redirect('?route=login');
        }

        if ((int) $_SESSION['user_id'] !== 1) {
            app_redirect('?route=reader');
        }

        app_render('admin', [
            'pageTitle' => 'Administración',
            'usersCount' => $this->users->countUsers(),
            'anecdotesCount' => $this->users->countAnecdotes(),
            'username' => isset($_SESSION['username']) ? (string) $_SESSION['username'] : 'admin',
        ]);
    }
}
