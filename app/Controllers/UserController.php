<?php

namespace App\Controllers;

require_once dirname(__DIR__, 1) . '/Repositories/UserRepository.php';
require_once dirname(__DIR__, 1) . '/Services/UserService.php';
use App\Repositories\UserRepository;
use App\Services\UserService ; 

class UserController
{ 
    
    public function register($data)
    {
        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
        return $userService->registerUser($data) ; 
    }

    public function login($data){
        $userRepository = new UserRepository();
        $userService = new UserService($userRepository);
        return $userService->loginUser($data) ; 
    }
}
