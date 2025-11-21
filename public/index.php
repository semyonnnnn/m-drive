<?php
const BASE_PATH = __DIR__ . '/../';
include BASE_PATH . "utils/helpers.php";
_include('vendor/autoload');

use App\Core\OldRouter;
use App\Core\Router;

// new OldRouter;

$router = new Router;
// $routes = _include('routes');

$router->get('/', 'Main');
$router->get('/about', 'About');
$router->get('/contacts', 'Contacts');

foreach ($router->getRoutes() as $route) {
    $router->smallBang($route['uri'], $route['method']);
}


// dd($routes);

