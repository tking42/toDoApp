<?php

namespace App\Models;

use PDO;

class EditTaskPageModel
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function editTask($id)
    {
        $query = $this->db->prepare("SELECT `id`, `message`, `completed`, `created` FROM `Task` WHERE `id` = :id");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function editedTask($id, $message)
    {
        $query = $this->db->prepare("UPDATE `Task` SET `message` = :message WHERE `id` = :id");
        $query->execute(['id' => $id, 'message' => $message]);
    }
}