<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_role']);
unset($_SESSION['logged_in']);
header('Location: /ollyo/public/index.php?page=auth/login');
exit;
