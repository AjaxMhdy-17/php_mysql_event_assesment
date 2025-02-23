<?php


function isUserLoggedIn()
{

    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
}

function userIsLoggedInRedirectToIndex()
{
    $isLoggedIn = isUserLoggedIn();
    if ($isLoggedIn) {
        header("Location: /ollyo/public/index.php?page=home");
        exit;
    }
}

function userNotLoggedInRedirectToLogin($redirectTo = '/ollyo/public/index.php?page=auth/login')
{
    $isLoggedIn = isUserLoggedIn();
    if (!$isLoggedIn) {
        header("Location: $redirectTo");
        exit;
    }
}

function clear_session()
{
    session_start();
    session_destroy();
}

function veiwAllErrors()
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}


function getUserId()
{
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}


function getUserName()
{
    return isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
}


function getUserRole()
{
    return isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
}

function getIsLoggedIn()
{
    return isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null;
}

function myEvents($redirectTo = '/ollyo/public/index.php?page=auth/my-event')
{
    echo '<script>window.location.href="/ollyo/public/index.php?page=my-event";</script>';
}

function attending()
{
    echo '<script>window.location.href="/ollyo/public/index.php?page=attending";</script>';
}

function errorMessage()
{
    die("Error: Something Went Wrong");
}

function userRoleAttendee()
{
    $role = getUserRole();
    if ($role == 'attendee') {
        errorMessage();
    }
}
