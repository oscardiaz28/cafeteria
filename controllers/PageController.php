<?php

namespace Controllers;

use Models\Producto;
use Models\Usuario;
use Router\Router;  

class PageController{

    public static function index(Router $router){

        $index = 'index';
        $router->render('pages/home', [
            'index' => $index
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('pages/nosotros');
    }

    public static function menu(Router $router){

        $productos = Producto::allActive();

        $router->render('pages/menu', [
            'productos' => $productos
        ]);
    }

    public static function contacto(Router $router){
        $router->render('pages/contacto');
    }

    public static function checkout(Router $router){
        session_start();

        $router->render('pages/checkout', [
        ]);
    }

}