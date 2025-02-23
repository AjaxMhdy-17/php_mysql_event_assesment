
<?php

veiwAllErrors();
userNotLoggedInRedirectToLogin();

require_once dirname(__DIR__, 3) . '/app/Controllers/EventJoinController.php';

use App\Controllers\EventJoinController;



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_id = $_POST['user_id'] ?? "";
    $event_id = $_POST['event_id'] ?? "";

    $eventJoinController = new EventJoinController();

    try {
        $response = $eventJoinController->joinEvent([
            'user_id' => $user_id,
            'event_id' => $event_id
        ]);
        attending();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}


?>