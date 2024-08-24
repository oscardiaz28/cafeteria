<?php

namespace Controllers;

use Router\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Models\Producto;


class ProductoController{
    private static function verifyAdmin(){
        session_start();
        !isAdmin() ? header('Location: /login') : true;
    }

    public static function editar(Router $router){
        self::verifyAdmin();  
        $admincss = 'admin.css';
        $id = $_GET['id'];
        // if(!isset($_GET['id']) || empty($_GET['id']) ){
        //     header('Location: /admin/productos');
        // }
        
        $producto = Producto::getOne($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $producto = new Producto($_POST);
            $producto->setId($_POST['id']);

            if( !empty($_FILES['imagen']['name']) ){
                $img = $_FILES['imagen'];
                $nombreImagen = $img['name'];
                $_POST['imagen'] = $nombreImagen;

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
            }

            $update = $producto->update();

            if($update['status']){
                header('Location: /admin/productos?success=2');
            }
        }

        $router->render('admin/productos/editar', [
            'admincss' => $admincss,
            'producto' => $producto
        ]);
    }

    public static function delete(){
        $id = $_GET['id'];

        if( empty($id) || !isset($id) ){
            header('Location: /admin/productos');
        }

        $producto = Producto::getOne($id);

        if($producto == null){
            header('Location: /admin/productos');
        }

        $producto = new Producto();
        $producto->setId($id);
        $delete = $producto->delete();

        if($delete){
            header('Location: /admin/productos?success=3');
        }

    }

}