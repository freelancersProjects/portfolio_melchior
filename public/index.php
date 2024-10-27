<?php
session_start();

foreach (glob('../src/controllers/*.php') as $controllerFile) {
    require_once $controllerFile;
}

$route = isset($_GET['route']) ? $_GET['route'] : 'home';

switch ($route) {
    case 'home':
        $controller = new HomeController();
        break;

    case 'oeuvre':
        $controller = new OeuvreController();
        break;

    default:
        http_response_code(404);
        echo "404 Not Found";
        exit;
}

if (isset($controller)) {
    $controller->index();
}

include '../templates/components/footer.php';
