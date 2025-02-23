<?php
$app = dirname(__DIR__);
require_once $app . '/vendor/autoload.php';

$routes = require_once $app . '/routes/web.php';

define('ROOT', $app . '/resources');
require_once ROOT . '/common/header.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$method = $_SERVER['REQUEST_METHOD'];
$foundRoute = false;

foreach ($routes as $route => $filePath) {
    $pattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $route);
    $pattern = '#^' . $pattern . '$#';

    if (preg_match($pattern, $page, $matches)) {
        $_REQUEST['params'] = $matches;
        if (!file_exists($filePath)) {
            die("Route matched, but file not found: $filePath");
        }
        require_once $filePath;
        $foundRoute = true;
        break;
    }
}

if (!$foundRoute) {
    require_once ROOT . '/common/404.php';
}

require_once ROOT . "/common/footer.php";
