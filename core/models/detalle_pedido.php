<?php

class  detalle_pedido extends Validator{

    //Atributos
    private $id = null;
    private $id_producto = null;
    private $precio = null;
    private $cantidad = null;


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

    //Metodos para obtener los valores de los artibutos
    public function getId()
    {
        return $this->id;
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

    //Metodos para realizar las acciones del SCRUD
    public function buscarDetalle($value)
    {
        $sql = 'SELECT d.Id_detalle_pedido, d.Id_producto,p.nombre_p, d.Precio, d.cantidad
                FROM tb_detelle_pedido d inner join tb_productos p
                on d.Id_producto = p.Id_producto
                WHERE p.nombre_p LIKE ?
                ORDER BY d.Id_detalle_pedido';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar una nuevo detalle pedido
    public function crearDetalle()
    {
        $sql = 'INSERT INTO tb_detelle_pedido(id_producto, precio, cantidad)
        VALUES(?, ?, ?)';
        $params = array($this->id_producto, $this->precio, $this->cantidad);
        return Database::executeRow($sql, $params);
    }

    //Metodo para leer todas las detalle pedidos
    public function leerTodosDetalle()
    {
        $sql = 'SELECT d.Id_detalle_pedido, d.Id_producto,p.nombre_p, d.Precio, d.cantidad
                FROM tb_detelle_pedido d inner join tb_productos p
                on d.Id_producto = p.Id_producto 
                ORDER BY d.Id_detalle_pedido';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para leer solo una detalle pedido
    public function leerUnaDetalle()
    {
        $sql = 'SELECT id_detalle_pedido, id_producto, precio, cantidad
                FROM tb_detelle_pedido
                WHERE id_detalle_pedido = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar una detalle pedido
    public function actualizarDetalle()
    {
        $sql = 'UPDATE tb_detelle_pedido
                SET Id_producto= ?, precio= ?, cantidad = ?
                WHERE Id_detalle_pedido = ?';
        $params = array($this->id_producto, $this->precio, $this->cantidad, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una detalle pedido
    public function eliminarDetalle()
    {
        $sql = 'DELETE FROM tb_detelle_pedido
                WHERE Id_detalle_pedido = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
