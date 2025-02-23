<?php

veiwAllErrors();
require_once dirname(__DIR__, 3) . '/app/Controllers/UserController.php';

use App\Controllers\UserController;

 $x = userIsLoggedInRedirectToIndex();
 echo $x ; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $userController = new UserController();
        $response = $userController->login([
            'email' => $email,
            'password' => $password,
        ]);
        if ($response) {
            $_SESSION['user_id'] = $response['id'];
            $_SESSION['user_name'] = $response['name'];
            $_SESSION['user_role'] = $response['role'];
            $_SESSION['logged_in'] = true;
            header('Location: /ollyo/public/index.php?page=home');
            exit;
        } else {
            echo "Something Went Wrong!";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
