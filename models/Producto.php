<?php

namespace Models;

class Producto extends Model{

    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'imagen', 'nombre', 'descripcion', 'precio', 'estado'];
    protected $id;
    public $imagen;
    public $nombre;
    public $descripcion;
    public $precio;
    public $estado;

    public function __construct($post = [])
    {   
        $this->id = $post['id'] ?? null;
        $this->imagen = $post['imagen'] ?? '';
        $this->nombre = $post['nombre'] ?? '';
        $this->descripcion = $post['descripcion'] ?? '';
        $this->precio = $post['precio'] ?? 0;
        $this->estado = $post['estado'] ?? 1;
    }

    public static function all(){
        $sql = "SELECT * FROM productos";

        $productos = self::$db->query($sql);

        if($productos->num_rows){
            while($row = $productos->FETCH_ASSOC()){
                $data[] = $row;
            }
            return $data;
        }else{
            return [];
        }
    }

    public static function allActive(){
        $sql = "SELECT * FROM productos WHERE estado = 1";

        $productos = self::$db->query($sql);

        if($productos->num_rows){
            while($row = $productos->FETCH_ASSOC()){
                $data[] = $row;
            }
            return $data;
        }else{
            return [];
        }
    }
    
    public function setImagen($nombre){
        $this->imagen = $nombre;
    }


    public static function getOne($id){
        $sql = "SELECT * FROM productos  WHERE id = " . $id;
        $producto = self::$db->query($sql);
        if($producto){
            return $producto->FETCH_ASSOC();
        }else{
            return [];
        }
    }

    public static function getTotal(){
        $sql = "SELECT count(*) as 'total' from productos";
        $total = self::$db->query($sql);
        if($total){
            return $total->FETCH_ASSOC();
        }else{
            return 0;
        }
    }

    
    
}