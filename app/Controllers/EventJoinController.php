<?php

namespace App\Controllers;

use app\Repositories\EventJoinRepository;
use app\Services\EventJoinService;

require_once dirname(__DIR__, 1) . '/Services/EventJoinService.php';
require_once dirname(__DIR__, 1) . '/Repositories/EventJoinRepository.php';

class EventJoinController
{
    public function joinEvent($data)
    {
        $eventJoinRepository = new EventJoinRepository();
        $eventJoinService = new EventJoinService($eventJoinRepository);
        $eventJoinService->joinEvent($data);
        return true ; 
    }
}
