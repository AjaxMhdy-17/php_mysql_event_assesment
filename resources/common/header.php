<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="">
    <header class="container-fluid">
        <nav class="navbar navbar-expand-lg mb-3" style="background : #e1e5ea ; margin-top: 30px;  border-radius:10px" data-bs-theme="light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/ollyo/public/index.php?page=home">Ollyo Events</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor03">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/ollyo/public/index.php?page=home">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ollyo/public/index.php?page=attending">Attending</a>
                        </li>
                        <?php
                        session_start();
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['user_role'] == 'admin') {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/ollyo/public/index.php?page=submitted-events">All Submitted Events</a>
                            </li>
                        <?php } ?>

                        <?php
                        session_start();
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && ($_SESSION['user_role'] == 'event_maker' || $_SESSION['user_role'] == 'admin')) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/ollyo/public/index.php?page=create-event">Create Events</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/ollyo/public/index.php?page=my-event">My Events</a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/ollyo/public/index.php?page=about/<?php echo getUserId(); ?>/profile">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/ollyo/public/index.php?page=outro">Outro</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <?php
                        if (getIsLoggedIn()) {
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                                <div class=" dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item text-capitalize" href="#">
                                        <?php
                                        if (getUserName()) {
                                            echo getUserName();
                                        } else {
                                            echo "guest";
                                        }
                                        ?>
                                    </a>
                                    <a class="dropdown-item" href="/ollyo/public/index.php?page=attending">Attending</a>

                                    <?php
                                    session_start();
                                    if (getIsLoggedIn() && (getUserRole() == 'event_maker' || getUserRole() == 'admin')) {
                                    ?>
                                        <a class="dropdown-item" href="/ollyo/public/index.php?page=create-event">create events</a>
                                    <?php } ?>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/ollyo/resources/pages/auth/logout-handler.php">Logout</a>
                                </div>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/ollyo/public/index.php?page=auth/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/ollyo/public/index.php?page=auth/register">Register</a>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid">