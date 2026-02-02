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

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->auth->login($_POST['email'], $_POST['password'])) {
                header("Location: index.php?route=home");
                exit;
            }
            $error = "invaild data";
        }
        require __DIR__ . '/../../views/login.php';
    }
    
    public function register()
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name'        => $_POST['name'],
                'email'       => $_POST['email'],
                'password'    => $_POST['password'],
                'phone'       => $_POST['phone'],
                'major_id'    => $_POST['major_id'] ?? null
            ];

            if ($this->auth->register($data)) {
                header("Location: index.php?route=login");
                exit;
            } else {
                $error = "Error: Email Used before";
            }
        }
        require __DIR__ . '/../../views/register.php';
    }

    public function logout()
    {
        $this->auth->logout();
    }
}
