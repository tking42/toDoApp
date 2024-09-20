<?php

namespace App\Models;

use PDO;

class UpdateTaskModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function editedTask($id, $message)
    {
        $query = $this->db->prepare("UPDATE `Task` SET `message` = :message WHERE `id` = :id");
        $query->execute(['id' => $id, 'message' => $message]);
    }
}