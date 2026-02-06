<?php

namespace App\Controllers;

use App\Database;
use PDO;

class DoctorController
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function getAllDoctors() : array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_type = 'doctor'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function getDoctorsByMajor($majorId) : array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_type = 'doctor' AND major_id = :major_id");
        
        $stmt->execute([':major_id' => $majorId]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
}