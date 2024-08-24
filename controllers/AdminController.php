<?php

namespace Controllers;

use Models\Pedido;
use Models\PedidoProducto;
use Models\Producto;
use Models\Usuario;
use Router\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Models\Reservacion;

class AdminController{

    private static function verifyAdmin(){
        session_start();
        !isAdmin() ? header('Location: /login') : true;
    }

    public static function index(Router $router){
        self::verifyAdmin();  
        
        $total = Pedido::getTotal()['ingreso_total'];
        $totalProductos = Producto::getTotal()['total'];
        $usuarios = Usuario::getTotal()['usuarios'];
        $pedidos = Pedido::getPedidosHoy()['total'];

        $admincss = 'admin.css';

        $router->render('admin/index', [
            'admincss' => $admincss,
            'countUsers' => 0,
            'total' => $total,
            'totalProductos' => $totalProductos,
            'usuarios' => $usuarios,
            'pedidos' => $pedidos,
        ]);
    }


    public static function usuarios(Router $router){
        self::verifyAdmin();  
        $admincss = 'admin.css';

        $state = $_GET['success'] ?? null;

        $usuarios = Usuario::all();

        $router->render('admin/usuarios/listado', [
            'admincss' => $admincss,
            'usuarios' => $usuarios,
            'state' => $state
        ]);
    }


    // PRODUCTOS ACTIONS
    public static function productos(Router $router){
        self::verifyAdmin();  
        $admincss = 'admin.css';

        $state = $_GET['success'] ?? null;

        $productos = Producto::all();

        $router->render('admin/productos/listado', [
            'admincss' => $admincss,
            'productos' => $productos,
            'state' => $state
        ]);
    }

    public static function crear(Router $router){
        self::verifyAdmin();  
        $admincss = 'admin.css';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $producto = new Producto($_POST);
            $file = $_FILES['imagen'];
            $nombreImagen = $file['name'];

            if($_FILES['imagen']['tmp_name']){
                $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
                $producto->setImagen($nombreImagen);
            }

            // Carpeta de imagenes
            $carpetaImagenes = $_SERVER['DOCUMENT_ROOT'] . '/images/menu/';

            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes, 0777, true);
            }

            //guardar imagen en el servidor
            $imagen->save($carpetaImagenes . $nombreImagen);

            $save = $producto->save();
            if($save['status'] == true){
                header('Location: /admin/productos?success=1');
            }
        }

        $router->render('admin/productos/crear', [
            'admincss' => $admincss,
        ]);
    }

    public static function detalle(Router $router){
        self::verifyAdmin();  
        $admincss = 'admin.css';

        $id_pedido = $_GET['id'];
        $id_usuario = $_GET['userId'];

        $usuario = Usuario::getOne($id_usuario);
        $pedido = Pedido::getOne($id_pedido);
        $pedidos_productos = PedidoProducto::getProductsByPedido(id_pedido: $id_pedido, id_usuario: $id_usuario);

        $router->render('admin/detalle', [
            'admincss' => $admincss,
            'pedidos_productos' => $pedidos_productos,
            'pedido' => $pedido,
            'usuario' => $usuario
        ]);
    }
    // --------------


    public static function pedidos(Router $router){
        self::verifyAdmin();  
        $admincss = 'admin.css';

        $state = $_GET['success'] ?? null;

        $pedidos = Pedido::all();

        $router->render('admin/pedidos', [
            'admincss' => $admincss,
            'pedidos' => $pedidos,
            'state' => $state
        ]);

    }

    public static function reservaciones(Router $router){
        self::verifyAdmin();  
        $admincss = 'admin.css';

        $state = $_GET['success'] ?? null;

        $reservaciones = Reservacion::all();

        if($reservaciones == false){
            $reservaciones = [];
        }

        $router->render('admin/reservaciones', [
            'admincss' => $admincss,
            'reservaciones' => $reservaciones,
            'state' => $state
        ]);
    }
    

}