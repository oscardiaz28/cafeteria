<?php

namespace Models;

class Model{

    protected static $db;
    protected static $table = '';

    public static function setDB($database){
        self::$db = $database;
    }

    public static function all(){
        // static se refiere a la clase en la que se está llamando al método (puede ser la clase actual o una clase derivada).
        $sql = "SELECT * FROM " . static::$table ;

        $results = self::$db->query($sql);

        if($results->num_rows){
            return $results;
        }else{
            return false;
        }
    }
    
}