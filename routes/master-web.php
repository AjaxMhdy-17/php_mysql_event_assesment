<?php
define('root', dirname(__DIR__));
define('ROOT', root . '/resources');

return [
    'home' => ROOT . '/pages/home.php',
    'about' => ROOT . '/pages/about.php',
    'auth/login' => ROOT . '/pages/auth/login.php',
    'auth/register' => ROOT . '/pages/auth/register.php',
    'auth/register-handler' => ROOT . '/pages/auth/register-handler.php',
    'auth/update-handler' => ROOT . '/pages/auth/update-handler.php',
    'auth/delete-handler' => ROOT . '/pages/auth/delete-handler.php',

    'auth/register-details/{id}' => ROOT . '/pages/auth/register-details-with-id-handler.php',
    'auth/register-details/{id}/{action}' => ROOT . '/pages/auth/register-details-with-action-handler.php',

    'auth/register-update/{id}' => ROOT . '/pages/auth/register-update-with-id-handler.php',
    'auth/register-update/{id}/{action}' => ROOT . '/pages/auth/register-update-with-id-action-handler.php',


    'auth/register-delete/{id}' => ROOT . '/pages/auth/register-delete-with-id-handler.php',

];
