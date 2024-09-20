<?php

namespace App\Models;

use PDO;

class AddTaskModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function addTask($message)
    {
        $query = $this->db->prepare("INSERT INTO `Task` (`message`) VALUES (:message)");
        $query->execute(['message' => $message]);
    }
}