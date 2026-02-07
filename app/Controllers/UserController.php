<?php

namespace App\Controllers;

use App\Database;
use PDO;
use App\models\Errors;


class UserController
{

  private $db;

  public function __construct(Database $database)
  {
    $this->db = $database->getConnection();
  }

  public function getUsers()
  {
    $stmt = $this->db->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getUserByID($id)
  {
   // var_dump("getUserByID");
    $stmt = $this->db->prepare("SELECT * FROM users WHERE id=$id");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function update()
  {
    $data = $_POST;
    $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email, phone = :phone, user_type = :user_type, description = :description
    WHERE id = :id;");


    $reuslt = $stmt->execute([
      ':name'       => $data['name'],
      ':email'      => $data['email'],
      ':phone'      => $data['phone'],
      ':user_type'  => $data['user_type'],
      ':id'  => $data['id'],
      ':description'  => $data['description'],

    ]);

    if ($reuslt) {
      header("Location: index.php?route=admin-users");
      exit;
    }else{
      Errors::SetMessage("Failed to update", "danger");
    }
  }


  public function delete(){

    $data = $_POST;
    $stmt = $this->db->prepare("DELETE from users WHERE id = :id;");

      $reuslt = $stmt->execute([ 
      ':id'  => $data['id'],
    ]);
    if ($reuslt) {
      header("Location: index.php?route=admin-users");
      exit;
    }else{
      Errors::SetMessage("Failed to update", "danger");
    }

  }
}
