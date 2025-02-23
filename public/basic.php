<?php

$app =  dirname(__DIR__);
require_once $app . '/app/helpers/helpers.php';
$routes = require_once $app . '/routes/web.php';

define('root', dirname(__DIR__));
define('ROOT', root . '/resources');
require_once ROOT . '/common/header.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$method = $_SERVER['REQUEST_METHOD'];


if ($method === 'POST' && $routes["{$page}-handler"]) {
    require_once $routes["{$page}-handler"];
} elseif ($method === 'PUT' && isset($routes["{$page}-update-handler"])) {
    require_once $routes["{$page}-update-handler"];
} elseif ($method === 'DELETE' && isset($routes["{$page}-delete-handler"])) {
    require_once $routes["{$page}-delete-handler"];
} else if (isset($routes[$page])) {
    require_once $routes[$page];
} else {
    require_once ROOT . '/common/404.php';
}

require_once ROOT . "/common/footer.php";
