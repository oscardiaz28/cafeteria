<?php

namespace Controllers;
use Router\Router;
use Models\Usuario;

use Intervention\Image\ImageManagerStatic as Image;

class UsuarioController{

    private static function verifyAdmin(){
        session_start();
        !isAdmin() ? header('Location: /login') : true;
    }

    public static function editar(Router $router){
        self::verifyAdmin();  
        $admincss = 'admin.css';
        $id = $_GET['id'];

        $usuario = Usuario::getOne($id);


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $usuario = new Usuario($_POST);
            $usuario->setId($_POST['id']);

            if(!empty($_FILES['imagen']['name'])){
                $img = $_FILES['imagen'];
                $nombreImagen = $img['name'];
                $_POST['imagen'] = $nombreImagen;

                if($_FILES['imagen']['tmp_name']){
                    $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit(200, 200);
                    $usuario->setImagen($nombreImagen);
                }

                $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/images/perfil/';

                if(!is_dir($carpeta)){
                    mkdir($carpeta, 0777, true);
                }

                $imagen->save($carpeta . $nombreImagen);
            }

            $update = $usuario->update();

            if($update['status']){
                header('Location: /admin/usuarios?success=2');
            }

        }

        $router->render('admin/usuarios/editar', [
            'admincss' => $admincss,
            'usuario' => $usuario
        ]);
    }
  

    public static function delete(){
        $id = $_GET['id'];

        $usuario = Usuario::getOne($id);

        if($usuario == null){
            header('Location: /admin/usuarios');
        }

        $usuario = new Usuario();
        $usuario->setId($id);

        $delete = $usuario->delete();

        if($delete){
            header("Location: /admin/usuarios?success=3");
        }

    }


}