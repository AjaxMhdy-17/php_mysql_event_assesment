<?php

use app\Config\Database;

require_once dirname(__DIR__, 2) . '/app/Config/Database.php';


function fetchAllEventsAsAdmin()
{
    $db = Database::getInstance()->getConnection();
    $sql = "
    SELECT 
        e.id AS event_id, 
        e.name, 
        e.user_id,
        e.topic, 
        e.description, 
        e.seat_limit, 
        IFNULL(COUNT(jr.id), 0) AS total_attendees
    FROM 
        events e
    LEFT JOIN 
        join_record jr ON e.id = jr.event_id
    GROUP BY 
        e.id, e.name, e.topic, e.description, e.seat_limit
    ORDER BY 
        e.id DESC
    ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function fetchMyEventsAsEventMaker()
{
    $db = Database::getInstance()->getConnection();

    $user_id = getUserId();
    $sql = "
    SELECT 
        e.id AS event_id, 
        e.name, 
        e.topic, 
        e.description, 
        e.seat_limit, 
        IFNULL(COUNT(jr.id), 0) AS total_attendees
    FROM 
        events e
    LEFT JOIN 
        join_record jr ON e.id = jr.event_id
    WHERE 
        e.user_id = :user_id  
    GROUP BY 
        e.id, e.name, e.topic, e.description, e.seat_limit
    ORDER BY 
        e.id DESC
    ";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




function fetchAllEvents()
{
    $db = Database::getInstance()->getConnection();
    $sql = "SELECT  event.id, 
                event.name, 
                event.topic, 
                event.description, 
                event.seat_limit, 
                event.start_time,
                user.id as user_id , 
                user.name as user_name , 
                user.email as user_email
                from events event join users user on event.user_id = user.id";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function fetchUnAttentedEvents()
{
    $db = Database::getInstance()->getConnection();
    $user_id = getUserId();
    $sql = "SELECT event.id, 
                   event.name, 
                   event.topic, 
                   event.description, 
                   event.seat_limit, 
                   event.start_time,
                   user.id AS user_id, 
                   user.name AS user_name, 
                   user.email AS user_email
            FROM events event
            JOIN users user ON event.user_id = user.id
            WHERE event.id NOT IN (
                SELECT event_id FROM join_record WHERE user_id = :user_id
            )";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function fetchMyEvents()
{
    $db = Database::getInstance()->getConnection();
    $sql = "SELECT id, name, topic, seat_limit FROM events WHERE user_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function fetchMyEventWithId()
{
    if (!isset($_REQUEST['params'][1])) {
        die('Event ID not provided in the URL!');
    }
    $user_id = getUserId();
    $id = intval($_REQUEST['params'][1]);
    $db = Database::getInstance()->getConnection();
    $sql = "SELECT * FROM events WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $event = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$event) {
        die('Event not found!');
        exit;
    }
    if ($event['user_id'] != $user_id && getUserRole() != 'admin') {
        die('Unauthorized access! This event does not belong to you.');
        exit;
    }
    return $event;
}


function fetAllUsersAttendingThisEvent()
{
    if (!isset($_REQUEST['params'][1])) {
        die('Event ID not provided in the URL!');
    }
    $event_id = intval($_REQUEST['params'][1]);
    $db = Database::getInstance()->getConnection();
    $sql = "SELECT name , email , role FROM users 
    WHERE id IN (
        SELECT user_id FROM join_record WHERE event_id = :event_id
    )";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function fetchViewEvent()
{

    if (!isset($_REQUEST['params'][1])) {
        die('Event ID not provided in the URL!');
    }
    $id = intval($_REQUEST['params'][1]);
    $db = Database::getInstance()->getConnection();

    $sql = "SELECT event.*, user.name AS user_name 
        FROM events event
        JOIN users user ON event.user_id = user.id
        WHERE event.id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function checkIsEventRequestSendOrNot()
{

    $event_id = intval($_REQUEST['params'][1]);
    $user_id = getUserId();

    $db = Database::getInstance()->getConnection();

    $sql = "SELECT * FROM join_record WHERE  user_id = :user_id AND event_id = :event_id  ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
    $stmt->execute();
    $status =  $stmt->fetch(PDO::FETCH_ASSOC);
    if ($status == null) {
        return 0;
    } else if ($status['approve'] == 1) {
        return 1;
    } else if ($status['approve'] == 0) {
        return 2;
    }
}

function fetchAttendedEvents()
{
    $db = Database::getInstance()->getConnection();
    $user_id = getUserId();
    $sql = "SELECT event.id, 
                   event.name, 
                   event.topic, 
                   event.description, 
                   event.seat_limit, 
                   event.start_time,
                   user.id AS user_id, 
                   user.name AS user_name, 
                   user.email AS user_email
            FROM events event
            JOIN users user ON event.user_id = user.id
            WHERE event.id IN (
                SELECT event_id FROM join_record WHERE user_id = :user_id
            )";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function fetchUserProfileInfo()
{
    $db = Database::getInstance()->getConnection();
    $user_id = intval($_REQUEST['params'][1]);
    $sql = "SELECT name , email , role  from users where id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function generateUsersDataForEachEvent()
{
    $event_id = intval($_REQUEST['params'][1]);
    $db = Database::getInstance()->getConnection();
    $sql = "SELECT name , email , role from users where id in (
        SELECT user_id from join_record where event_id = :event_id
    )";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $basePath = realpath(__DIR__ . '/../../');
    $folderPath = $basePath . '/export/';
    $fileName = 'users_from_event_' . $event_id . "_" . date('Y-m-d_H-i-s') . '.csv';
    $filePath = $folderPath . $fileName;
    if (!file_exists($folderPath)) {
        if (!mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            die("Error: Failed to create directory '$folderPath'. Check permissions.");
        }
    }
    $output = fopen($filePath, 'w');
    if (!$output) {
        die("Error: Could not open file '$filePath' for writing.");
    }
    if (!empty($records)) {
        fputcsv($output, array_keys($records[0]));
    }
    foreach ($records as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
    echo "CSV file saved to: " . $filePath;
    return true;
}



function numberOfAttendeeinThisEvent()
{
    $db = Database::getInstance()->getConnection();
    $event_id = intval($_REQUEST['params'][1]);
    $sql = "SELECT * FROM join_record where event_id = :event_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
    $stmt->execute();
    return (count($stmt->fetchAll(PDO::FETCH_ASSOC)));
}
