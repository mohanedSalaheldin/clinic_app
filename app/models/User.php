<?php

namespace App\Models;

use PDO;

class User
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO users (name, email, password, phone, description, user_type, major_id) 
                VALUES (:name, :email, :password, :phone, :description, :user_type, :major_id)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':name'        => $data['name'],
            ':email'       => $data['email'],
            ':password'    => password_hash($data['password'], PASSWORD_BCRYPT),
            ':phone'       => $data['phone'],
            ':description' => $data['description'] ?? null,
            ':user_type'   => $data['user_type'] ?? 'Patiant',
            ':major_id'    => (!empty($data['major_id'])) ? $data['major_id'] : null
        ]);
    }

    public function findByEmail(string $email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllDoctors() : array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_type = 'doctor'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
}
