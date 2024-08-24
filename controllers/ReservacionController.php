<?php

namespace Controllers;

use Models\Reservacion;

class ReservacionController{

    public static function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data);

            $arr = get_object_vars($data);

            $reservacion = new Reservacion($arr);

            $save = $reservacion->save();
        }
    }

    public static function editar(){
        $id = $_GET['id'];
        $estado = '';

        $reservacion = Reservacion::getOne($id);
            
        if($reservacion['estado'] == 0){
            $estado = 1;
        }else{
            $estado = 0;
        }

        $update = Reservacion::change($estado, $id);

        if($update['status']){
            header('Location: /admin/reservaciones?success=2');
        }

    }

    public static function delete(){
        $id = $_GET['id'];

        $reservacion = new Reservacion();
        $reservacion->setId($id);

        $delete = $reservacion->delete();

        if($delete){
            header('Location: /admin/reservaciones?success=3');
        }

    }

}