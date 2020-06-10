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
        WHERE p.Id_pedido ILIKE ? OR p.Id_cliente ILIKE ?
        ORDER BY p.Id_pedido';
        $params = array("%$value%", "%$value%");
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

    //Metodo para eliminar una pedidos
    public function eliminarPedidos()
    {
        $sql = 'DELETE FROM tb_pedidos
                WHERE id_pedido = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }









}
?>
