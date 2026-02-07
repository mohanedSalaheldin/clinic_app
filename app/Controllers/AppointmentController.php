<?php

namespace App\Controllers;

use App\Database;
use App\Models\Appointment;
use PDO;

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

        header("Location: index.php?route=home");
        exit;
    }

    public function getAllAppoint(){
            // $appointmentModel = new Appointment($this->db);
          
            // $res = $appointmentModel->getAppoinments();
             $sql = "SELECT * FROM appointments";
  
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res= $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($res){
                 header("Location: index.php?route=admin-appoinment");
        exit;
            }else{
              header("Location: index.php?route=admin");
              exit;
            }
            return null;
    }
}