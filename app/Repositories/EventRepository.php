<?php

namespace app\Repositories;

require_once dirname(__DIR__, 2) . '/app/Config/Database.php';

use app\Config\Database;

use PDO;


class EventRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createEvent($data)
    {

        $user_id = getUserId();
        $sql = "INSERT INTO events (user_id, topic ,  name, description , seat_limit , start_time, end_time, created_at, updated_at) 
        VALUES (:user_id, :topic ,  :name, :description, :seat_limit ,  :start_time, :end_time, NOW(), NOW())";
        $stmt = $this->db->prepare($sql);
        $data['user_id'] = $user_id;
        return $stmt->execute($data);
    }


    public function updateEvent($data)
    {

        $event_id = $data['event_id'];
        $name = $data['name'];
        $description = $data['description'];
        $seat_limit = $data['seat_limit'];
        $start_time = $data['start_time'];
        $end_time = $data['end_time'];


        $sql = "UPDATE events SET 
            name = :name, 
            description = :description, 
            seat_limit = :seat_limit, 
            start_time = :start_time, 
            end_time = :end_time
           
        WHERE id = :event_id AND user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':seat_limit', $seat_limit, PDO::PARAM_INT);
        $stmt->bindParam(':start_time', $start_time, PDO::PARAM_STR);
        $stmt->bindParam(':end_time', $end_time, PDO::PARAM_STR);

        return $stmt->execute();
    }


    public function deleteEvent($data)
    {
        $event_id = $data['event_id'];
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT id FROM events WHERE id = :event_id AND user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $deleteSql = "DELETE FROM events WHERE id = :event_id AND user_id = :user_id";
            $deleteStmt = $this->db->prepare($deleteSql);
            $deleteStmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
            $deleteStmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            if ($deleteStmt->execute()) {
                return true;
            } else {
                die("Error: Error deleting event.");
            }
        } else {
            die("Error: Event not found or not owned by the logged-in user");
        }
    }
}
