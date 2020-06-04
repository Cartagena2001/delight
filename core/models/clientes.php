<?php

class clientes extends Validator{

    private $id = null;
    private $usuario = null;
    private $nombre = null;
    private $direccion = null;
    private $correo = null;
    private $telefono = null;
    private $clave = null;
    private $estado = null;


//Metodos para asignar valores a los atributos
public function setId($value)
{
    if($this->validateNaturalNumber($value)){
        $this->id = $value;
        return true;    
    }
    else{
        return false;
    }
}

public function setUsuario($value)
{
    if($this->validateAlphanumeric($value, 1, 50)) {
        $this->usuario = $value;
        return true;
    } else {
        return false;
    }
}

public function setNombre($value)
{
    if($this->validateAlphanumeric($value, 1, 50)) {
        $this->nombre = $value;
        return true;
    } else {
        return false;
    }
}

public function setDireccion($value)
{
    if($this->validateAlphanumeric($value, 1, 50)) {
        $this->direccion = $value;
        return true;
    } else {
        return false;
    }
}

public function setCorreo($value)
{
    if ($value) {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }
}

public function setTelefono($value)
{
    if($this->validateNaturalNumber($value)){
        $this->telefono = $value;
        return true;    
    }
    else{
        return false;
    }
}


public function setClave($value)
{
        if ($this->validatePassword($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
}

public function setEstado($value)
{
        if ($this->validateAlphanumeric($value, 1, 50)) {
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

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    } 

    public function getDireccion()
    {
        return $this->direccion;
    } 

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function buscarClientes($value)
    {
        $sql = 'SELECT Id_cliente, Usuario, Nombre, Direccion, Correo, Telefono, clave, estado_cliente
                FROM tb_cliente
                WHERE Nombre ILIKE ? OR Direccion ILIKE ?
                ORDER BY Nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar una nuevo cliente
    public function crearClientes()
    {
        $sql = 'INSERT INTO tb_cliente(Nombre, Direccion, Correo, Telefono, clave, estado_cliente)
                VALUES(?, ?, ?, ?, ?, ?)';
        $params = array($this->Nombre, $this->Direccion, $this->Correo, $this->Telefono, $this->clave, $this->estado_cliente);
        return Database::executeRow($sql, $params);
    }

    //Metodo para leer todas las clientes
    public function leerTodosClientes()
    {
        $sql = 'SELECT id_cliente ,usuario, nombre, correo, telefono, estado_cliente
                FROM tb_cliente
                ORDER BY nombre';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para leer solo una cliente
    public function leerUnCliente()
    {
        $sql = 'SELECT Id_cliente, Usuario, Nombre, Direccion, Correo, Telefono, clave, estado_cliente
                FROM tb_Cliente
                WHERE Id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar una cliente
    public function actualizarClientes()
    {
        $sql = 'UPDATE tb_Cliente
                SET Nombre = ?, Direccion = ?, Correo = ? Telefono = ?, clave = ? estado_cliente = ?
                WHERE Id_cliente = ?';
        $params = array($this->Nombre, $this->Direccion, $this->Correo, $this->Telefono, $this->clave, $this->estado_cliente,$this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una cliente
    public function eliminarClientes()
    {
        $sql = 'DELETE FROM tb_Cliente
                WHERE Id_cliente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}
?>
