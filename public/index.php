<?php 

require_once __DIR__ . '/../config/app.php';

use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\PageController;
use Router\Router;

$router = new Router();

// Pagina Publicas
$router->get('/', [PageController::class, 'index']);
$router->get('/nosotros', [PageController::class, 'nosotros']);
$router->get('/menu', [PageController::class, 'menu']);
$router->get('/contacto', [PageController::class, 'contacto']);
$router->get('/checkout', [PageController::class, 'checkout']);
$router->post('/checkout', [PageController::class, 'checkout']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

$router->get('/signup', [LoginController::class, 'signup']);
$router->post('/signup', [LoginController::class, 'signup']);

$router->get('/logout', [LoginController::class, 'logout']);


//Paginas Publicas
$router->get('/admin', [AdminController::class, 'index']);


$router->run();

