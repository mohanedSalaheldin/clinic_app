<?php

namespace App\Controllers;

use App\Auth;
use App\Database;
use App\models\Errors;
use App\Models\Validation;

class AuthController
{
    private Auth $auth;

    public function __construct(Database $db)
    {
        $this->auth = new Auth($db);
    }

    public function login()
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginResult = $this->auth->login($_POST['email'], $_POST['password']);

            if ($loginResult == "Patiant") {
                header("Location: index.php?route=home");
                exit;
            } else if ($loginResult == "Doctor") {
                header("Location: index.php?route=contact");
                exit;
            } else if ($loginResult == "") {
                Errors::SetMessage("Invalid Data", "danger");
                header("Location: index.php?route=login");
                exit;
            }
        }

        return [
            'view' => 'views/front/login.php',

        ];
    }

    public function register()
    {

        $errors = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = trim($_POST['password']);
            $data = [
                'name'        => $name,
                'email'       => $email,
                'password'    => $password,
                'phone'       => $phone,
                'major_id'    => $_POST['major_id'] ?? null
            ];


            $errors = Validation::RegisterValidation($name, $email, $phone, $password,);

            if ($this->auth->register($data)) {
                header("Location: index.php?route=login");

                exit;
            } else {
                Errors::SetMessage("$errors", "danger");
            }
        }
        // require __DIR__ . '/../../views/front/register.php';

        return [
            'view' => 'views/front/register.php',

        ];
    }

    public function logout()
    {
        $this->auth->logout();
    }
}
