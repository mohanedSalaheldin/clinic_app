<?php

namespace App;

use App\Models\User;
use PDO;

class Auth
{
    private User $userModel;

    public function __construct(Database $database)
    {
        $this->userModel = new User($database->getConnection());
    }

    public function register(array $data): bool
    {
        if ($this->userModel->findByEmail($data['email'])) {
            return false;
        }

        return $this->userModel->create($data);
    }

    public function login(string $email, string $password): string
    {

   
        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user'] = [
                'id'        => $user['id'],
                'name'      => $user['name'],
                'email'     => $user['email'],
                'phone'     => $user['phone'],
                'user_type' => $user['user_type']
            ];
            if($user['user_type']=="Patiant"){
                return "Patiant";
            }
            return "Doctor";
        }
        return "";
    }

    public function check(): bool
    {
        return isset($_SESSION['user']);
    }

    public function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }
    
    public function logout(): void
    {
        $_SESSION = [];


        if (session_id()) {
            session_destroy();
        }


        header("Location: index.php?route=login");
        exit;
    }
}
