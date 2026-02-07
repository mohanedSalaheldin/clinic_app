<?php

namespace App\Controllers;

use App\Database;
use App\Models\Appointment;
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

    public function dashboard()
    {
        // حماية الصفحة: التأكد أن المسجل هو دكتور
        if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'Doctor') {
            header("Location: index.php?route=login");
            exit;
        }

        $appointmentModel = new Appointment($this->db);
        $appointments = $appointmentModel->getByDoctorId($_SESSION['user']['id']);

        require_once __DIR__ . '/../../views/admin/home.php';
    }

    public function toggleStatus()
    {
        if (isset($_GET['id']) && isset($_GET['current_status'])) {
            $appointmentModel = new Appointment($this->db);
            $newStatus = ($_GET['current_status'] === 'pending') ? 'completed' : 'pending';
            
            $appointmentModel->updateStatus((int)$_GET['id'], $newStatus);
        }
        header("Location: index.php?route=admin");
        exit;
    }
}