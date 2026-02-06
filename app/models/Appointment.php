<?php

namespace App\Models;

use PDO;

class Appointment
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function save(array $data): bool
    {
        $sql = "INSERT INTO appointments (name, email, phone, date_time, user_doctor_id, user_pataint_id) 
                VALUES (:name, :email, :phone, :date_time, :doctor_id, :patient_id)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':name'       => $data['name'],
            ':email'      => $data['email'],
            ':phone'      => $data['phone'],
            ':date_time'  => $data['date_time'],
            ':doctor_id'  => $data['doctor_id'],
            ':patient_id' => $_SESSION['user']['id']
        ]);
    }
}
