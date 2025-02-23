<?php 

namespace App\Controllers ; 
require_once dirname(__DIR__, 1) . '/Services/EventService.php';

use app\Repositories\EventRepository;
use App\Services\EventService ; 

class EventMakerController{



    public function list(){

    }

    public function view(){

    }

    public function create($data){
        $eventRepository = new EventRepository();
        $eventService = new EventService($eventRepository);
        return $eventService->createEvent($data) ;
    }

    public function update($data){
        $eventRepository = new EventRepository();
        $eventService = new EventService($eventRepository);
        return $eventService->updateEvent($data) ;
    }

    public function delete($data){
        $eventRepository = new EventRepository();
        $eventService = new EventService($eventRepository);
        return $eventService->deleteEvent($data) ;
    }

}