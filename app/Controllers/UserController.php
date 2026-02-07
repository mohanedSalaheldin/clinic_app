<?php

namespace App\Controllers;

use App\Database;
use PDO;


class UserController{

 private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function getUsers(){
      $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
}
