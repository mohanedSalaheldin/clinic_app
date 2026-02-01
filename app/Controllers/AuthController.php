<?php

namespace App\Controllers;

use App\Auth;
use App\Database;

class AuthController
{
    private Auth $auth;

    public function __construct(Database $db)
    {
        $this->auth = new Auth($db);
    }

    public function showLogin()
    {
        require __DIR__ . '/../../views/auth/login.php';
    }

    public function login()
    {
        if ($this->auth->login($_POST['email'], $_POST['password'])) {
            header("Location: /?route=dashboard");
            exit;
        }

        $error = "Invalid credentials";
        require __DIR__ . '/../../views/auth/login.php';
    }

    public function showRegister()
    {
        require __DIR__ . '/../../views/auth/register.php';
    }

    public function register()
    {
        $this->auth->register(
            $_POST['name'],
            $_POST['email'],
            $_POST['password']
        );

        header("Location: /?route=login");
        exit;
    }

    public function dashboard()
    {
        if (!$this->auth->check()) {
            header("Location: /?route=login");
            exit;
        }

        $user = $this->auth->user();
        require __DIR__ . '/../../views/dashboard.php';
    }

    public function logout()
    {
        $this->auth->logout();
    }
}
