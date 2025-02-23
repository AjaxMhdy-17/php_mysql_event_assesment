<?php

namespace app\Services;


veiwAllErrors() ; 

require_once dirname(__DIR__) . '/Repositories/EventRepository.php';

use app\Repositories\EventRepository;

class EventService
{


    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }


    public function createEvent($data)
    {
        $this->validateEvent($data);
        return $this->eventRepository->createEvent($data);
    }

    public function updateEvent($data)
    {

        $this->validateEvent($data);
        return $this->eventRepository->updateEvent($data);
    }


    public function deleteEvent($data){
        return $this->eventRepository->deleteEvent($data);
    }

    public function validateEvent($data)
    {
        if (empty($data['topic']) || strlen($data['topic']) < 3) {
            die("Error: Event Topic Name must be at least 3 characters long.");
        }
        if (empty($data['name']) || strlen($data['name']) < 3) {
            die("Error: Event Name must be at least 3 characters long.");
        }
        if (empty($data['description']) || strlen($data['description']) < 3) {
            die("Error: Event Description must be at least 3 characters long.");
        }
        if (empty($data['seat_limit']) || strlen($data['seat_limit']) <= 0) {
            die("Error: Event Seat Limit Must Be A Positive Number.");
        }
    }
}
