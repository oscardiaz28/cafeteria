<?php

namespace Models;

class Model{

    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];
    protected $id;

    public static function setDB($database){
        self::$db = $database;
    }

    public static function all(){
        // static se refiere a la clase en la que se está llamando al método (puede ser la clase actual o una clase derivada).
        $sql = "SELECT * FROM " . static::$tabla ;

        $results = self::$db->query($sql);

        if($results->num_rows){
            return $results;
        }else{
            return false;
        }
    }

    private function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna == 'id'){
                continue;
            }
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function save(){
        $atributos = $this->atributos();
        $columnas = join(', ', array_keys($atributos));
        $valores = join("', '", array_values($atributos));

        $sql = "INSERT into ". static::$tabla . "( $columnas ) VALUES ( '$valores' )";

        $result = self::$db->query($sql);

        if($result){
            $status = true;
        }else{
            $status = false;
        }
        
        return [
            'status' => $status,
            'id' => self::$db->insert_id
        ]; 
    }

    public function update(){
        $atributos = $this->atributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        unset($valores[3]);

        $query = "UPDATE ". static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";

        
        $resultado = self::$db->query($query);

        if($resultado){
            $status = true;
        }else{
            $status = false;
        }
        
        return [
            'status' => $status,
        ];
        
    }

    public function delete(){
        $sql = "DELETE from " . static::$tabla . ' WHERE id = ' . $this->id;

        $delete = self::$db->query($sql);

        return $delete;

    }

    public function setId($id){
        $this->id = $id;
    }

    public function sincronizar($post){
        foreach($post as $key => $value){
            if(property_exists($this, $key) && !is_null($value) ){
                $this->$key = $value;
            }
        }
    }
    
}