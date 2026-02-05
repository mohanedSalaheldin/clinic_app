<?php


namespace App\Models;

use PDO;

class Major
{
    private string $id;
    private string $name;
    private PDO $db;


    public function __construct(PDO $db, string $name='')
    {   
        $this->db = $db;
        $this->name = $name;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public  function create(): bool
    {
        $sql = "INSERT INTO majors (name) VALUES (:name)";

        $stmt = $this->db->prepare($sql);

        if ($stmt->execute([':name' => $this->name])) {
            $this->id = (int) $this->db->lastInsertId();
            return true;
        }
    
        return false;
    }

    public static function getAllMajors(PDO $db) : array {
        $stmt = $db->prepare("SELECT * FROM majors");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
}
