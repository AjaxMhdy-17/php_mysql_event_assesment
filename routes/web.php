<?php
define('root', dirname(__DIR__));
define('ROOT', root . '/resources');
require_once root . '/app/Helpers/helpers.php';

return [
    'home' => ROOT . '/pages/home.php',
    'about/{id}/profile' => ROOT . '/pages/about.php',
    'auth/login' => ROOT . '/pages/auth/login.php',
    'auth/login-handler' => ROOT . '/pages/auth/login-handler.php',
    'auth/register' => ROOT . '/pages/auth/register.php',
    'auth/register-handler' => ROOT . '/pages/auth/register-handler.php',
    'attending' => ROOT . '/pages/attending.php',
    'create-event' => ROOT . '/pages/event/my-event-create.php',
    'create-event-handler' => ROOT . '/pages/event/event-create-handler.php',
    'event-view/{id}/details' => ROOT . '/pages/event/event-view.php',
    'generate-event-csv/{id}/details' => ROOT . '/pages/event/generate-event-csv.php',
    'event-join/{event_id}/{user_id}/join' => ROOT . '/pages/event/event-join.php',
    'my-event' => ROOT . '/pages/event/my-event.php',
    'my-event-detail/{id}/detail' => ROOT . '/pages/event/my-event-detail.php',
    'my-event-edit/{id}/edit' => ROOT . '/pages/event/my-event-edit.php',
    'my-event-update' => ROOT . '/pages/event/my-event-update.php',
    'my-event-delete/{id}/delete' => ROOT . '/pages/event/my-event-delete.php',
    'submitted-events' => ROOT . '/pages/event/submitted-events.php',
    'outro' => ROOT . '/pages/outro.php',
    
    // 'auth/register-update/{id}/{action}' => ROOT . '/pages/auth/register-update-with-id-action-handler.php',


];
