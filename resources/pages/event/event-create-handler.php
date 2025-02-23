<?php

veiwAllErrors();
userNotLoggedInRedirectToLogin();

require_once dirname(__DIR__, 3) . '/app/Controllers/EventMakerController.php';

use App\Controllers\EventMakerController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $topic = $_POST['topic'] ?? "";
    $name = $_POST['name'] ?? "";
    $description = $_POST['description'] ?? "";
    $seat_limit = $_POST['seat_limit'] ?? "";
    $eventStartDate = $_POST['event_start_date'] ?? '';
    $eventStartTime = $_POST['event_start_time'] ?? '';
    $eventEndDate = $_POST['event_end_date'] ?? '';
    $eventEndTime = $_POST['event_end_time'] ?? '';
    $start_time = $eventStartDate . ' ' . $eventStartTime;
    $end_time = $eventEndDate . ' ' . $eventEndTime;

    $eventMakerController = new EventMakerController();

    try {
        $response = $eventMakerController->create([
            'topic' => $topic,
            'name' => $name,
            'description' => $description,
            'seat_limit' => $seat_limit,
            'start_time' => $start_time,
            'end_time' => $end_time
        ]);
        if ($response) {
            myEvents();
            exit;
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
