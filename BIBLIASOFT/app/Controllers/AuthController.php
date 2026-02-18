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
            app_redirect('?route=login&error=' . urlencode('Completa usuario y contraseña.'));
        }

        $user = $this->users->verifyUser($username, $password);
        if (!$user) {
            app_redirect('?route=login&error=' . urlencode('Credenciales inválidas.'));
        }

        $_SESSION['user_id'] = (int) $user['id'];
        $_SESSION['username'] = (string) $user['username'];
        app_redirect('?route=reader');
    }

    public function register()
    {
        $username = isset($_POST['username']) ? trim((string) $_POST['username']) : '';
        $password = isset($_POST['password']) ? (string) $_POST['password'] : '';
        $password2 = isset($_POST['password_confirm']) ? (string) $_POST['password_confirm'] : '';

        if ($username === '' || $password === '') {
            app_redirect('?route=register&error=' . urlencode('Completa todos los campos.'));
        }
        if ($password !== $password2) {
            app_redirect('?route=register&error=' . urlencode('Las contraseñas no coinciden.'));
        }
        if ($this->users->getUserByUsername($username)) {
            app_redirect('?route=register&error=' . urlencode('Ese usuario ya existe.'));
        }

        try {
            $id = $this->users->createUser($username, $password);
        } catch (\Throwable $e) {
            app_redirect('?route=register&error=' . urlencode($e->getMessage()));
        }

        $_SESSION['user_id'] = (int) $id;
        $_SESSION['username'] = $username;
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
