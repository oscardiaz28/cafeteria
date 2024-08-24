<?php

namespace Models;

class Reservacion extends Model{

    protected static $tabla = 'reservaciones';
    protected $id;
    private $nombre;
    private $apellidos;
    private $fecha;
    private $hora;
    private $telefono;
    private $mensaje;
    private $estado;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = isset($args['nombre']) ? self::$db->escape_string( trim($args['nombre']) ) ?? '' : '';
        $this->apellidos = isset($args['apellido']) ? self::$db->escape_string( trim($args['apellido']) ) ?? '' : '';
        $this->fecha = isset($args['fecha']) ? self::$db->escape_string( trim($args['fecha']) ) ?? '' : '';
        $this->hora = isset($args['hora']) ? self::$db->escape_string( trim($args['hora']) ) ?? '' : '';
        $this->telefono = isset($args['telefono']) ? self::$db->escape_string( trim($args['telefono']) ) ?? '' : '';
        $this->mensaje = isset($args['mensaje']) ? self::$db->escape_string( trim($args['mensaje']) ) ?? '' : '';
        $this->estado = 0;
    }

    public function save(){
        $sql = "INSERT INTO " . static::$tabla . "(nombre, apellidos, fecha, hora, telefono, mensaje, estado) VALUES ( '$this->nombre', '$this->apellidos', '$this->fecha', '$this->hora', '$this->telefono', '$this->mensaje', '$this->estado' )";

        $save = self::$db->query($sql);

        if($save){
            echo json_encode(array(
                'status' => true,
                'id' => self::$db->insert_id
            ));
        }else{
            echo json_encode([
                'status' => false
            ]);
        }
    }

    public static function getOne($id){
        $sql = "SELECT * FROM reservaciones where id = $id";

        $reservacion = self::$db->query($sql);

        if($reservacion){
            return $reservacion->FETCH_ASSOC();
        }

    }

    public static function change($estado, $id){
        $sql = "UPDATE reservaciones set estado = $estado where id = $id";

        $update = self::$db->query($sql);

        if($update){
            return [
                'status' => 'success'
            ];
        }

    }

}