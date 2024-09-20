<?php

namespace App\Models;

use PDO;

class DeleteTaskModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function deleteTask($id)
    {
        $query = $this->db->prepare("DELETE FROM `Task` WHERE `id` = :id");
        $query->execute(['id' => $id]);
    }
}