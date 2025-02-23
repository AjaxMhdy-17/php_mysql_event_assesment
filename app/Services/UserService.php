<?php

namespace app\Services;
require_once dirname(__DIR__) . '/Repositories/UserRepository.php';
use app\Repositories\UserRepository;

class UserService
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUser(array $userData)
    {

        if (empty($userData['name']) || strlen($userData['name']) < 3) {
            die("Error: Username must be at least 3 characters long.");
        }
        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            die("Error: Invalid email address.");
        }
        if (strlen($userData['password']) < 6) {
            die("Error: Password must be at least 6 characters long.");
        }
        $userData['password'] = password_hash($userData['password'], PASSWORD_BCRYPT);

        $data = [
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => $userData['password'],
            'role' => $userData['role'],
        ];

        return $this->userRepository->register($data);
    }

    public function loginUser(array $userData)
    {
        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            die("Error: Invalid email address.");
        }
        if (strlen($userData['password']) < 6) {
            die("Error: Password must be at least 6 characters long.");
        }
        $data = [
            'email' => $userData['email'],
            'password' => $userData['password'],
        ];
        return $this->userRepository->login($data) ; 
    }
}
