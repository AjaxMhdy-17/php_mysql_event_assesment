<?php

namespace app\Repositories;

require_once dirname(__DIR__, 2) . '/app/Config/Database.php';

use app\Config\Database;

use PDO;

class EventJoinRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function joinEvent($data)
    {
        $event_id = $data['event_id'];
        $user_id = $data['user_id'];
        $sql = "INSERT INTO join_record (user_id , event_id) VALUES (:user_id , :event_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
        return $stmt->execute($data);
    }
}
