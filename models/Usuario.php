<?php

namespace Models;

class Usuario extends Model{

    protected $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $password;
    public $imagen;
    public $rol;

    private $keys = ['id', 'nombre', 'apellidos', 'email', 'password', 'imagen', 'rol'];
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'email', 'password', 'imagen', 'rol'];


    protected static $alertas = [];
    protected static $tabla = 'usuarios';

    public function __construct($post = []){
        $this->id = $post['id'] ?? null;
        $this->nombre = isset($post['nombre']) ? self::$db->escape_string( trim($post['nombre'])) ?? '' : '';
        $this->apellidos = isset($post['apellidos']) ? self::$db->escape_string( trim($post['apellidos'])) ?? '' : '';
        $this->email = isset($post['email']) ? self::$db->escape_string( trim($post['email'])) ?? '' : '';
        $this->password = isset($post['password']) ? self::$db->escape_string( trim($post['password'])) ?? '' : '';
        $this->imagen = isset($post['imagen']) ? $post['imagen'] : 'default.png';
        $this->rol = isset($post['rol']) ? $post['rol'] : 'user';
    }

    public function validarLogin(){
        if(empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL) ){
            self::$alertas['error'][] = 'El email es obligatorio y debe ser valido';
        }
        if(empty($this->password)){
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        return self::$alertas;
    }

    public function validarRegistro(){
        if(empty($this->nombre)){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if(empty($this->apellidos)){
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }
        if(empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL) ){
            self::$alertas['error'][] = 'El email es obligatorio y debe ser válido';
        }
        if(empty($this->password)){
            self::$alertas['error'][] = 'El contraseña es obligatoria';
        }
        return self::$alertas;
    }

    public function existe(){
        $sql = "SELECT * FROM usuarios WHERE email = '$this->email'";

        $query = self::$db->query($sql);

        if($query->num_rows){
            return $query->FETCH_ASSOC();     
        }else{
            return false;
        }
    }

    public static function checkPassword($password, $hashPassword){
        return password_verify($password, $hashPassword);
    }

    public function save(){
        $atributos = $this->saveKeys();
        $keys = join(',', $atributos);

        $sql = "INSERT INTO usuarios( $keys ) VALUES( '$this->nombre', '$this->apellidos', '$this->email', '$this->password', '$this->imagen', '$this->rol')";

        $save = self::$db->query($sql);

        if($save){
            return [
                'status' => true,
                'id' => self::$db->insert_id
            ];
        }else{
            return false;
        }
    }

    public function setImagen($nombre){
        $this->imagen = $nombre;
    }

    private function saveKeys(){
        $atributos = [];
        foreach($this->keys as $value){
            if($value == 'id'){
                continue;
            }
            array_push($atributos, $value);
        }
        return $atributos;
    }
   
    public static function setAlerta($tipo, $mensaje){
        self::$alertas[$tipo][] = $mensaje;     
    }

    public static function getAlertas(){
        return self::$alertas;
    }

    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public static function getOne($id){
        $sql = "SELECT * FROM usuarios where id = " . $id;
        $usuario = self::$db->query($sql);
        if($usuario){
            return $usuario->FETCH_ASSOC();
        }
    }

    public static function getTotal(){
        $sql = "SELECT count(*) as 'usuarios' FROM usuarios";
        $usuario = self::$db->query($sql);
        if($usuario){
            return $usuario->FETCH_ASSOC();
        }
    }

}