<?php

namespace App;

use PDO;

class Auth
{
    private PDO $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
        session_start();
    }


    public function register(string $name, string $email, string $password): bool
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->db->prepare(
            "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
        );

        return $stmt->execute([$name, $email, $hash]);
    }


    public function login(string $email, string $password): bool
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE email = ?"
        );
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id'    => $user['id'],
                'name'  => $user['name'],
                'email' => $user['email']
            ];
            return true;
        }

        return false;
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
        session_destroy();
        header("Location: login.php");
        exit;
    }
}
