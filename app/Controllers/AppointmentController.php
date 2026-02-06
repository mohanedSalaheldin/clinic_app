<?php

namespace App\Controllers;

use App\Database;
use App\Models\Appointment;

class AppointmentController
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function book()
    {
        $message = null;

        if (!isset($_SESSION['user'])) {
            header("Location: index.php?route=login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $appointmentModel = new Appointment($this->db);
            
            if ($appointmentModel->save($_POST)) {
                $message = "Your appointment has been booked successfully!";
            } else {
                $message = "Something went wrong, please try again.";
            }
        }

        return 'views/front/appointment.php';
    }
}