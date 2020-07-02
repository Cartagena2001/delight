<?php

class pedidos extends Validator{
    private $id = null;
    private $id_cliente = null;
    private $cliente = null;
    private $id_cupon = null;
    private $cupon = null;
    private $id_detalle = null;
    private $detalle = null;
    private $costo_envio = null;
    private $fecha_pedido = null;
    private $fecha_entrega = null;
    private $estado = null;

    ///////////////////////////////////////////////
    private $id_producto = null;
    private $precio = null;
    private $cantidad = null;

    public function setId_producto($value){
        if($this->validateNaturalNumber($value)){
            $this->id_producto = $value;
            return true;    
        }
        else{
            return false;
        }
    }

    public function setPrecio($value)
    {
        if($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidad($value)
    {
        if($this->validateNaturalNumber($value, 1, 50)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId_producto()
    {
        return $this->id_producto;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    ///////////////////////////////////////////////

//Metodos para asignar valores a los atributos
public function setId($value){
    if($this->validateNaturalNumber($value)){
        $this->id = $value;
        return true;    
    }
    else{
        return false;
    }
}

public function setId_cliente($value)
{
    if($this->validateNaturalNumber($value)){
        $this->id_cliente = $value; 
        return true;    
    }
    else{ 
        return false;
    }
}

public function setCliente($value)
{
    if($this->validateAlphanumeric($value, 1, 50)) {
        $this->cliente = $value;
        return true;
    } else {
        return false;
    }
}

public function setId_cupon($value)
{
    if($this->validateNaturalNumber($value)){
        $this->id_cupon = $value;
        return true;    
    }
    else{
        return false;
    }
}

public function setCupon($value)
{
    if($this->validateNaturalNumber($value, 1, 50)) {
        $this->cupon = $value;
        return true;
    } else {
        return false;
    }
}

public function setId_detalle($value)
{
    if($this->validateNaturalNumber($value)){
        $this->id_detalle = $value;
        return true;    
    }
    else{
        return false;
    }
}

public function setDetalle($value)
{
    if($this->validateAlphanumeric($value, 1, 50)) {
        $this->detalle = $value;
        return true;
    } else {
        return false;
    }
}

public function setCosto_envio($value)
    {
        if($this->validateMoney($value)){
            $this->costo_envio = $value;
            return true;    
        }
        else{
            return false;
        }
    }

public function setFecha_pedido($value)
{
    if($value) {
        $this->fecha_pedido = $value;
        return true;
    } else {
        return false;
    }
}

public function setFecha_entrega($value)
{
    if($value) {
        $this->fecha_entrega = $value;
        return true;
    } else {
        return false;
    }
}

public function setEstado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    } 

    public function getId_cupon()
    {
        return $this->id_cupon;
    }

    public function getId_detalle()
    {
        return $this->id_detalle;
    }

    public function getCosto_envio()
    {
        return $this->costo_envio;
    }

    public function getFecha_pedido()
    {
        return $this->fecha_pedido;
    }
    
    public function getFecha_entrega()
    {
        return $this->fecha_entrega;
    }

    public function createDetalle()
    {
        $sql = 'INSERT INTO tb_detelle_pedido(id_producto, precio, cantidad, id_pedido)
                VALUES(?, ?, ?, ?)';
        $params = array($this->id_producto, $this->precio, $this->cantidad, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function leerOrden(){
        $sql = 'SELECT id_pedido
                FROM tb_pedidos
                WHERE estadopedido = 0 AND id_cliente = ?';
        $params = array($this->id_cliente);
        if($data = Database::getRow($sql, $params)){
            $this->id = $data['id_pedido'];
            return true;
        }else{
            $sql = 'INSERT INTO tb_pedidos(id_cliente, costo_envio, fecha_pedido, fecha_entrega)
            VALUES(?, ?, current_date, current_date+15)';
            $params = array($this->id_cliente, '2.50');
            if (Database::executeRow($sql, $params)) {
                $this->id = Database::getLastRowId();
                return true;
            } else {
                return false;
            }
        }
    }

    public function LeerCarrito()
    {
        $sql = 'SELECT tb_detelle_pedido.id_detalle_pedido, tb_productos.nombre_p, tb_detelle_pedido.precio, tb_detelle_pedido.cantidad
        FROM  tb_pedidos INNER JOIN tb_detelle_pedido ON tb_detelle_pedido.id_pedido = tb_pedidos.id_pedido 
        INNER JOIN tb_productos ON tb_detelle_pedido.id_producto = tb_productos.id_producto WHERE tb_pedidos.id_pedido = ?
        GROUP BY tb_detelle_pedido.id_detalle_pedido, tb_productos.nombre_p, tb_detelle_pedido.precio, tb_detelle_pedido.cantidad';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    // public function leerOrden(){
    //     $sql = 'SELECT tb_productos.nombre_p, tb_productos.precio, tb_detelle_pedido.cantidad
    //     FROM tb_pedidos INNER JOIN tb_detelle_pedido ON tb_pedidos.id_detalle_pedido = tb_detelle_pedido.id_detalle_pedido 
    //     INNER JOIN tb_productos ON tb_detelle_pedido.id_producto = tb_productos.id_producto WHERE tb_pedidos.estadoPedido = 0 AND tb_pedidos.id_cliente = ? 
    //     GROUP BY tb_productos.nombre_p, tb_productos.precio, tb_detelle_pedido.cantidad ';
    //     $params = array($this->cliente);
    //     if($data = Database::getRow($sql, $params)){
    //         $this->id_pedido = $data['id_detalle_pedido'];
    //         return true;
    //     }else{
    //         $sql = 'INSERT INTO tb_pedidos(id_cliente, id_detalle_pedido, costo_envio, fecha_pedido, fecha_entrega, estadopedido)
    //         VALUES(?, ?, ?, ?, ?, ?)';
    //         $params = array($this->id_producto, $this->precio, $this->cantidad);
    //         if (Database::executeRow($sql, $params)) {
    //             $this->id = Database::getLastRowId();
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }
    // }


    //Metodo para buscar un pedidos
    public function buscarPedidos($value)
    {
        $sql = 'SELECT Id_pedido, p.Id_cliente,c.nombre, p.Id_cupon,p.id_detalle_pedido, 
        Costo_envio, Fecha_pedido, Fecha_entrega
        FROM 
        tb_pedidos p inner join tb_cliente c
        on p.Id_cliente = c.Id_cliente
        inner join tb_cupones u
        on p.Id_cupon = u.Id_cupon
        inner join tb_detelle_pedido d
        on p.id_detalle_pedido = d.id_detalle_pedido 
        WHERE c.nombre LIKE ?
        ORDER BY p.Id_pedido';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar una nuevo pedidos
    public function crearPedidos()
    {
        $sql = 'INSERT INTO tb_pedidos(id_cliente, id_cupon, id_detalle_pedido, costo_envio, fecha_pedido, fecha_entrega)
                    VALUES(?, ?, ?, ?, ?, ?)';
            $params = array($this->id_cliente, $this->id_cupon, $this->id_detalle, $this->costo_envio, $this->fecha_pedido, $this->fecha_entrega);
            return Database::executeRow($sql, $params);
    }

    //Metodo para leer todas las pedidos
    public function leerTodosPedidos()
    {
        $sql = 'SELECT Id_pedido, p.Id_cliente,c.nombre, p.Id_cupon,p.id_detalle_pedido, 
        Costo_envio, Fecha_pedido, Fecha_entrega
        FROM 
        tb_pedidos p inner join tb_cliente c
        on p.Id_cliente = c.Id_cliente
        inner join tb_cupones u
        on p.Id_cupon = u.Id_cupon
        inner join tb_detelle_pedido d
        on p.id_detalle_pedido = d.id_detalle_pedido
        ORDER BY Id_pedido';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para leer solo una pedido
    public function leerUnPedidos()
    {
        $sql = 'SELECT id_pedido, id_cliente, id_cupon, id_detalle_pedido, costo_envio, fecha_pedido, fecha_entrega
                FROM tb_pedidos
                WHERE id_pedido = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar una pedidos
    public function actualizarPedidos()
    {
        $sql = 'UPDATE tb_pedidos
                SET id_cliente = ?, id_cupon = ?, id_detalle_pedido = ?, costo_envio = ?, fecha_pedido = ?, fecha_entrega = ?
                WHERE id_pedido = ?';
        $params = array($this->id_cliente, $this->id_cupon, $this->id_detalle, $this->costo_envio, $this->fecha_pedido, $this->fecha_entrega, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function actualizarCarrito()
    {
        $sql = 'UPDATE tb_detelle_pedido
                SET cantidad = ?
                WHERE id_detalle_pedido = ?';
        $params = array($this->cantidad, $this->id_detalle);
        return Database::executeRow($sql, $params);
    }

    public function actualizarEstadoOrden()
    {
        $sql = 'UPDATE tb_pedidos
                SET estadopedido = ?
                WHERE id_pedido = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function eliminarDetalle()
    {
        $sql = 'DELETE FROM tb_detelle_pedido
                WHERE id_detalle_pedido = ? AND id_pedido = ?';
        $params = array($this->id_detalle, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una pedidos
    public function eliminarPedidos()
    {
        $sql = 'DELETE FROM tb_pedidos
                WHERE id_pedido = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function leerPedidoPorClint()
    {
        $sql = 'SELECT tb_pedidos.id_pedido, tb_cliente.nombre, tb_pedidos.costo_envio, tb_pedidos.fecha_pedido, tb_pedidos.fecha_entrega, tb_pedidos.estadopedido
                FROM tb_pedidos INNER JOIN tb_cliente ON tb_pedidos.id_cliente = tb_cliente.id_cliente 
                WHERE tb_cliente.id_cliente = ?  ORDER BY  tb_pedidos.id_pedido ASC';
        $params = array($this->id_cliente);
        return Database::getRows($sql, $params);
    }

    public function leerDetallePedido()
    {
        $sql = 'SELECT tb_detelle_pedido.id_detalle_pedido, tb_productos.nombre_p, tb_detelle_pedido.precio, tb_detelle_pedido.cantidad
        FROM  tb_pedidos INNER JOIN tb_detelle_pedido ON tb_detelle_pedido.id_pedido = tb_pedidos.id_pedido 
        INNER JOIN tb_productos ON tb_detelle_pedido.id_producto = tb_productos.id_producto WHERE tb_pedidos.id_pedido = ?
        GROUP BY tb_detelle_pedido.id_detalle_pedido, tb_productos.nombre_p, tb_detelle_pedido.precio, tb_detelle_pedido.cantidad';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }



}
?>
