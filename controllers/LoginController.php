<?php

namespace Controllers;

use Models\Usuario;
use Router\Router;

class LoginController{

    public static function login(Router $router){

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST' ){

            $usuario = new Usuario($_POST);

            $alertas = $usuario->validarLogin();

            if(empty($alertas)){

                $usuario = $usuario->existe();

                if($usuario){

                    $checkPassword =Usuario::checkPassword($_POST['password'], $usuario['password']);

                    if($checkPassword){
                        if(!session_start()){
                            session_start();
                        }
                        $_SESSION['id'] = $usuario['id'];
                        $_SESSION['nombre'] = $usuario['nombre'];
                        $_SESSION['apellidos'] = $usuario['apellidos'];
                        $_SESSION['email'] = $usuario['email'];
                        $_SESSION['login'] = true;
                        $rol = $usuario['rol'];

                        if( $rol != 'user'){
                            $_SESSION['admin'] = true;
                            header('Location: /admin');
                            
                        }else{
                            header('Location: /');
                        }

                    }else{
                        Usuario::setAlerta('error', 'Contraseña Incorrecta');
                    }
                }else{
                    Usuario::setAlerta('error', 'Email no registrado');
                }

            }

        }

        $alertas = Usuario::getAlertas();

        $router->render('pages/login', [
            'alertas' => $alertas
        ]);
    }



    public static function signup(Router $router){

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST' ){

            $usuario = new Usuario($_POST);
    
            $alertas = $usuario->validarRegistro();

            if(empty($alertas)){
                
                $existeUsuario = $usuario->existe();

                if($existeUsuario){
                    Usuario::setAlerta('error', 'El usuario ya esta registrado');
                }else{

                    $usuario->hashPassword();

                    $save = $usuario->save();

                    if($save){
                        session_start();
                        $_SESSION['id'] = $save['id'];
                        $_SESSION['nombre'] = $_POST['nombre'];
                        $_SESSION['apellidos'] = $_POST['apellidos'];
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['login'] = true;
                        $_SESSION['rol'] = 'user';

                        header('Location: /');

                    }else{
                        Usuario::setAlerta('error', 'Hubo un problema al registrarse');
                    }

                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('pages/signup', [
            'alertas' => $alertas
        ]);
    }

    public static function logout(){
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION =  [];

        header('Location: /');
    }

}