<?php

namespace Controllers;

class AdminController{

    public static function index(){
        if(!session_start()){
            session_start();
        }

        echo 'Admin';
        echo 'Bienvenido ' . $_SESSION['nombre'];

        echo "<a href='/logout'>Cerrar Sesion</a>";
    }
}