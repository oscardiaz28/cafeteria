<?php

namespace Models;

class PedidoProducto extends Model{

    protected static $tabla = 'pedidos_productos';
    protected $id;
    private $id_pedido;
    private $id_producto;
    private $cantidad;

    public function __construct($post){
        $this->id = $post['id'] ?? null;
        $this->id_pedido = isset($post['id_pedido']) ? self::$db->escape_string( trim($post['id_pedido']) ) : '';
        $this->id_producto = isset($post['id_producto']) ? self::$db->escape_string( trim($post['id_producto']) ) : '';
        $this->cantidad = isset($post['cantidad']) ? self::$db->escape_string( trim($post['cantidad']) ) : '';
    }

    public function save(){
        $sql = "INSERT INTO pedidos_productos VALUES (null, '$this->id_pedido', '$this->id_producto', '$this->cantidad')";

        $save = self::$db->query($sql);
    
        if($save){
            return true;
        }
    }

    public static function getProductsByPedido($id_pedido, $id_usuario){
        $sql = "SELECT pp.cantidad as 'unidades', p.imagen as 'imagen_producto', p.nombre as 'nombre_producto', p.precio as 'precio_producto' from pedidos_productos pp inner join productos p on pp.id_producto = p.id inner join pedidos pd on pd.id = pp.id_pedido inner join usuarios u on u.id = pd.id_usuario where pp.id_pedido = " . $id_pedido . ' and u.id = ' . $id_usuario;

        $pedido = self::$db->query($sql);

        if($pedido->num_rows){
            while($row = $pedido->FETCH_ASSOC()){
                $results[] = $row;
            }
            return $results;
        }else{
            return [];
        }

    }

    public static function getTotalByProductos(){
        $sql = "SELECT pd.nombre, sum( pp.cantidad ) as totalPedidos from pedidos p inner join pedidos_productos pp on pp.id_pedido = p.id inner join productos pd on pd.id = pp.id_producto group by pd.nombre;";

        $productos = self::$db->query($sql);

        if($productos->num_rows){
            while($row = $productos->FETCH_ASSOC()){
                $data[] = $row;
            };
            return $data;
        }else{
            return [];
        }

    }

}