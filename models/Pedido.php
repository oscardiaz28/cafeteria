<?php

namespace Models;

class Pedido extends Model{

    protected static $tabla = 'pedidos';
    protected $id;
    private $id_usuario;
    private $fecha;
    private $estado;
    private $direccion;
    private $telefono;

    public function __construct($post = []){
        $this->id = $post['id'] ?? null;
        $this->id_usuario = isset($post['id_usuario']) ? self::$db->escape_string( trim($post['id_usuario']) ) : '';
        $this->fecha = isset($post['fecha']) ? self::$db->escape_string( trim($post['fecha']) ) : '';
        $this->estado = isset($post['estado']) ? self::$db->escape_string( trim($post['estado']) ) : '';
        $this->direccion = isset($post['direccion']) ? self::$db->escape_string( trim($post['direccion']) ) : '';
        $this->telefono = isset($post['telefono']) ? self::$db->escape_string( trim($post['telefono']) ) : '';
    }

    public function save(){
        $sql = "INSERT INTO pedidos VALUES (null, '$this->id_usuario', '$this->fecha', '$this->estado', '$this->direccion', '$this->telefono')";

        $save = self::$db->query($sql);

        if($save){
            return [
                'status' => $save,
                'id' => self::$db->insert_id
            ];
        }else{
            return [
                'status' => false
            ];
        }
    }

    public static function belongsTo($id){
        $sql = "SELECT * FROM pedidos  WHERE id_usuario = " . $id;

        $pedidos = self::$db->query($sql);

        if($pedidos->num_rows){
            while($row = $pedidos->FETCH_ASSOC()){
                $data[] = $row;
            }
            return $data;
        }else{
            return [];
        }

    }

    public static function all(){
        $sql = "SELECT p.id as 'pedidoId', u.id as 'userId', u.nombre as 'nombreUsuario', u.apellidos as 'apellidoUsuario', p.direccion as 'direccion', p.telefono as 'telefono', p.fecha as 'fecha', p.estado as 'estado' from pedidos p inner join usuarios u on u.id = p.id_usuario;";

        $pedidos = self::$db->query($sql);

        if($pedidos->num_rows){
            while($row = $pedidos->FETCH_ASSOC()){
                $data[] = $row;
            }
            return $data;
        }else{
            return [];
        }
    }

    public static function getOne($id_pedido){
        $sql = "SELECT * FROM pedidos  WHERE id = " . $id_pedido;
        $pedido = self::$db->query($sql);
        if($pedido){
            return $pedido->FETCH_ASSOC();
        }else{
            return [];
        }
    }

    public static function getTotal(){
        $sql = "SELECT SUM(pd.precio * pp.cantidad) + (COUNT(DISTINCT pp.id) * 10) AS ingreso_total FROM pedidos p INNER JOIN pedidos_productos pp ON p.id = pp.id_pedido INNER JOIN productos pd ON pd.id = pp.id_producto";

        $total = self::$db->query($sql);

        if($total){
            return $total->FETCH_ASSOC();
        }else{
            return false;
        }

    }

    public static function getPedidosHoy(){
        $sql = "SELECT count(*) as 'total' FROM `pedidos` where fecha = CURRENT_DATE";

        $pedidos = self::$db->query($sql);

        if($pedidos){
            return $pedidos->FETCH_ASSOC();
        }

    }

    public static function getPedidosDayOfWeek(){
        $sql = "SELECT case(dayofweek(fecha)) when 1 then 'Domingo' when 2 then 'Lunes' when 3 then 'Martes' when 4 then 'Miercoles' when 5 then 'Jueves' when 6 then 'Viernes' when 7 then 'Sabado' end as 'nombre' , count(*) as 'totalPedidos' from pedidos group by nombre;";

        $pedidos = self::$db->query($sql);

        if($pedidos){
            while($row = $pedidos->FETCH_ASSOC()){
                $data[] = $row;
            }
            return $data;


        }else{
            return [];
        }

    }

    public static function edit($data, $pedido_id){

        $sql = "UPDATE " . self::$tabla . " set estado = '$data' where id = " . $pedido_id; 

        $resultado = self::$db->query($sql);

        if($resultado){
            $status = true;
        }else{
            $status = false;
        }
        
        return [
            'status' => $status,
        ];

    }

}