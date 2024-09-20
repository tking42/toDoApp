<?php

namespace App\Models;

use PDO;

class AllTasksModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getAllTasks()
    {
        $query = $this->db->prepare("SELECT `id`, `message`, `completed`, `created` FROM `Task` ORDER BY `created` DESC");
        $query->execute();
        return $query->fetchAll();
    }
}