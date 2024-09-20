<?php

namespace App\Models;

use PDO;

class CompleteTaskModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function completeTask($id)
    {
        $query = $this->db->prepare("UPDATE `Task` SET `completed` = 1 WHERE `id` = :id");
        $query->execute(['id' => $id]);
    }
}