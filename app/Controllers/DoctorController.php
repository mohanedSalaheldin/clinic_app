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
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
}
