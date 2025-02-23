<?php

namespace app\Services;

veiwAllErrors();

require_once dirname(__DIR__) . '/Repositories/EventJoinRepository.php';

use app\Repositories\EventJoinRepository;


class EventJoinService
{
    private $eventJoinRepository;

    public function __construct(EventJoinRepository $eventJoinRepository)
    {
        $this->eventJoinRepository = $eventJoinRepository;
    }

    public function joinEvent($data){
        $this->eventJoinRepository->joinEvent($data) ; 
    }

}
