<?php

namespace Controllers;

use Models\Pedido;
use Models\PedidoProducto;
use Models\Usuario;
use Router\Router;

class PedidoController{

    public static function index(Router $router){
        session_start();
        if(isAuth() == false ||  isAdmin() == true ){
            header('Location: /login');
        }
        
        $id = $_SESSION['id'];
        $pedidos = Pedido::belongsTo($id);

        $router->render('pages/mispedidos', [
            'pedidos' => $pedidos
        ]);    
    }

    public static function detalle(Router $router){
        session_start();
        $id_pedido = $_GET['id'];
        $id_usuario = $_SESSION['id'];

        $usuario = Usuario::getOne($id_usuario);
        $pedido = Pedido::getOne($id_pedido);
        $pedidos_productos = PedidoProducto::getProductsByPedido(id_pedido: $id_pedido, id_usuario: $id_usuario);

        $router->render('pages/detalle', [
            'pedidos_productos' => $pedidos_productos,
            'usuario' => $usuario,
            'pedido' => $pedido
        ]);
    }

    public static function save(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){

            $pedido = new Pedido($_POST);

            $resultado = $pedido->save();

            $id = $resultado['id'];

            //almacenar los productos con el id del pedido
            $idProductos = json_decode($_POST['productos']);

            foreach($idProductos as $producto){
                $pedidoProducto = [
                    'id_pedido' => $id,
                    'id_producto' => $producto->id,
                    'cantidad' => $producto->cantidad
                ];
                $pedido_producto = new PedidoProducto($pedidoProducto);
                $pedido_producto->save();
            }   
            
            $response = [
                'status' => $resultado['status']
            ];

            echo json_encode($response);
        }
    }

    public static function bestSellingProducts(){
        $productos = PedidoProducto::getTotalByProductos();

        echo json_encode(
            $productos
        );
    }  

    public static function pedidosByDay(){
        $pedidos = Pedido::getPedidosDayOfWeek();

        echo json_encode(
            $pedidos
        );
    }


    public static function editar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
            $pedido_id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            $update = Pedido::edit($estado, $pedido_id);

            if($update['status']){
                header('Location: /admin/pedidos?success=2');
            }
        }

    }

    public static function delete(){
        $id = $_GET['id'];

        if( empty($id) || !isset($id) ){
            header('Location: /admin/pedidos');
        }

        $pedido = Pedido::getOne($id);

        if($pedido == null){
            header('Location: /admin/pedidos');
        }

        $pedido = new Pedido();
        $pedido->setId($id);

        $delete = $pedido->delete();

        if($delete){
            header('Location: /admin/pedidos?success=3');
        }
    }



}