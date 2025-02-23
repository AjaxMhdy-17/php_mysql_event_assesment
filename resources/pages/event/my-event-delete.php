<?php

veiwAllErrors();
userNotLoggedInRedirectToLogin();

require_once dirname(__DIR__, 3) . '/app/Controllers/EventMakerController.php';

use App\Controllers\EventMakerController;


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_method']) && $_POST['_method'] == 'DELETE') {

    $event_id = $_POST['event_id'] ?? "";

    $eventMakerController = new EventMakerController();

    try {
        $response = $eventMakerController->delete([
            'event_id' => $event_id,
        ]);
        if ($response) {
            myEvents();
            exit;
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
