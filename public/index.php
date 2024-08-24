<?php 

require_once __DIR__ . '/../config/app.php';

use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\PageController;
use Controllers\PedidoController;
use Controllers\ProductoController;
use Controllers\ReservacionController;
use Controllers\UsuarioController;
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

//Paginas Privadas
$router->get('/mispedidos', [PedidoController::class, 'index']);
$router->get('/mispedidos/detalle', [PedidoController::class, 'detalle']);
// --------------------------------

//API
$router->post('/api/reservacion', [ReservacionController::class, 'add']);
$router->post('/api/pedidos', [PedidoController::class, 'save']);

$router->get('/api/bestselllingproducts', [PedidoController::class, 'bestSellingProducts']);
$router->get('/api/pedidosbyday', [PedidoController::class, 'pedidosByDay']);
// -------------------

//Paginas Privadas Admin
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/usuarios', [AdminController::class, 'usuarios']);

//Productos

$router->get('/admin/productos', [AdminController::class, 'productos']);
$router->get('/admin/productos/crear', [AdminController::class, 'crear']);
$router->post('/admin/productos/crear', [AdminController::class, 'crear']);

$router->get('/admin/productos/editar', [ProductoController::class, 'editar']);
$router->post('/admin/productos/editar', [ProductoController::class, 'editar']);

$router->get('/admin/productos/eliminar', [ProductoController::class, 'delete']);


// Usuarios
$router->get('/admin/usuarios/editar', [UsuarioController::class, 'editar']);
$router->post('/admin/usuarios/editar', [UsuarioController::class, 'editar']);
$router->get('/admin/usuarios/eliminar', [UsuarioController::class, 'delete']);


$router->get('/admin/pedidos', [AdminController::class, 'pedidos']);
$router->get('/admin/pedidos/detalle', [AdminController::class, 'detalle']);
$router->post('/admin/pedidos/detalle', [PedidoController::class, 'editar']);
$router->get('/admin/pedidos/eliminar', [PedidoController::class, 'delete']);


//Reservaciones
$router->get('/admin/reservaciones', [AdminController::class, 'reservaciones']);
$router->get('/admin/reservaciones/editar', [ReservacionController::class, 'editar']);
$router->get('/admin/reservaciones/eliminar', [ReservacionController::class, 'delete']);


$router->run();

