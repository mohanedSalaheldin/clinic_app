<?php


namespace App\Models;

use PDO;

class Major
{
    private PDO $db;
    private int $id;
    private string $name;


    public function __construct(PDO $db,int $id,string $name )
    {
        $this->db = $db;
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public static function create(PDO $db,string $name){
        $stmt = $db->prepare("INSERT INTO majors (name) VALUES (?)"); 
        $success = $stmt->execute([$name]);


        if($success){
            $id = (int) $db->lastInsertId();
            return new self($db,$id,$name);
        }
        return null;

    }

     public static function getAll(PDO $db){
        $stmt = $db->query("SELECT * FROM majors"); 
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $majors =[];
       foreach($rows as $row){
        $majors[]= new Major($db,$row['id'],$row['name']);
       }
       return $majors;

    }


     public static function getbyId(PDO $db,$id){
        $stmt = $db->query("SELECT * FROM majors WHERE id= ?"); 
        $stmt->execute([$id]);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $majors =[];
       foreach($rows as $row){
        $majors[]= new Major($db,$row['id'],$row['name']);
       }
       return $majors;

    }

}