<?php

class pedidos extends Validator{
    private $id = null;
    private $id_cliente = null;
    private $id_cupon = null;
    private $id_detalle = null;
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

public function setCosto_envio($value)
    {
        if($this->validateNaturalNumber($value)){
            $this->costo_envio = $value;
            return true;    
        }
        else{
            return false;
        }
    }

public function setFecha_pedido($value)
{
    if($this->validateAlphanumeric($value, 1, 50)) {
        $this->fecha_pedido = $value;
        return true;
    } else {
        return false;
    }
}

public function setFecha_entrega($value)
{
    if($this->validateAlphanumeric($value, 1, 50)) {
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
        return $this->nombre;
    } 

    public function getId_cupon()
    {
        return $this->precio;
    }

    public function getId_detalle()
    {
        return $this->descripcion;
    }

    public function getCosto_envio()
    {
        return $this->imagen;
    }

    public function getFecha_pedido()
    {
        return $this->id_categoria;
    }
    
    public function getFecha_entrega()
    {
        return $this->estado;
    }

    //Metodo para buscar un pedidos
    public function buscarPedidos($value)
    {
        $sql = 'SELECT Id_pedido, Id_cliente, Id_cupon, Id_detalle_pedido, Costo_envio, Fecha_pedido , Fecha_entrega
                FROM tb_pedido
                WHERE Id_pedido ILIKE ? OR Id_cliente ILIKE ?
                ORDER BY Id_pedido';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar una nuevo pedidos
    public function crearPedidos()
    {
        if ($this->saveFile($this->Id_cliente, $this->Id_cupon, $this->Id_detalle_pedido, $this->Costo_envio, $this->Fecha_pedido, $this->Fecha_entrega)) {
            $sql = 'INSERT INTO tb_pedidos(Id_cliente, Id_cupon, Id_detalle_pedido, Costo_envio, Fecha_pedido, Fecha_entrega)
                    VALUES(?, ?, ?, ?, ?, ?)';
            $params = array($this->Id_cliente, $this->Id_cupon, $this->Id_detalle_pedido, $this->Costo_envio, $this->Fecha_pedido, $this->Fecha_entrega);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    //Metodo para leer todas las pedidos
    public function leerTodosPedidos()
    {
        $sql = 'SELECT Id_pedido, Id_cliente, Id_cupon, Id_detalle_pedido, Costo_envio, Fecha_pedido, Fecha_entrega
                FROM tb_pedidos
                ORDER BY Id_pedido,';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para leer solo una pedido
    public function leerUnPedidos()
    {
        $sql = 'SELECT Id_pedido, Id_pedido, Id_cliente, Id_cupon, Id_detalle_pedido, Costo_envio, Fecha_pedido, Fecha_entrega
                FROM tb_pedidos
                WHERE Id_pedido, = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar una pedidos
    public function actualizarPedidos()
    {
        $sql = 'UPDATE tb_pedidos
                SET Id_cliente = ?, Id_cupon = ?, Id_detalle_pedido = ?, Costo_envio = ?, Fecha_pedido = ?, Fecha_entrega = ?
                WHERE Id_pedido = ?';
        $params = array($this->Id_cliente, $this->Id_cupon, $this->Id_detalle_pedido, $this->Costo_envio, $this->Fecha_pedido, $this->Fecha_entrega, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una pedidos
    public function eliminarPedidos()
    {
        $sql = 'DELETE FROM tb_pedidos
                WHERE Id_pedido = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }









}
?>
