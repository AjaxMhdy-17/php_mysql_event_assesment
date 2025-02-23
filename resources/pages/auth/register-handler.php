<?php
veiwAllErrors();
require_once dirname(__DIR__, 3) . '/app/Controllers/UserController.php';
use App\Controllers\UserController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '3';
    try {
        $userController = new UserController();
        $response  = $userController->register([
            'name' => $username,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        ]);
        if ($response) {
            header('Location: /ollyo/public/index.php?page=auth/login');
            exit;
        } else {
            echo "Something Went Wrong!";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
