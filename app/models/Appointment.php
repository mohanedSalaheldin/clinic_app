<?php

namespace App\Models;

use PDO;

class Appointment
{
    private PDO $db;
    private $name;
    private $email;
    private $phone;
    private $date_time;
    private $user_doctor_id;
    private $user_pataint_id;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function save(array $data): bool
    {
        $sql = "INSERT INTO appointments (name, email, phone, date_time, user_doctor_id, user_pataint_id) 
                VALUES (:name, :email, :phone, :date_time, :user_doctor_id, :user_pataint_id)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':name'       => $data['name'],
            ':email'      => $data['email'],
            ':phone'      => $data['phone'],
            ':date_time'  => $data['date_time'],
            ':user_doctor_id'  => $data['user_doctor_id'],
            ':user_pataint_id' => $data['user_pataint_id'],
        ]);
    }

    public function getByDoctorId(int $doctorId): array
    {
        $sql = "SELECT * FROM appointments WHERE user_doctor_id = :doctor_id ORDER BY date_time DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':doctor_id' => $doctorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus(int $id, string $status): bool
    {
        $sql = "UPDATE appointments SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':status' => $status, ':id' => $id]);
    }
}
