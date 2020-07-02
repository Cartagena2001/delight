<?php

class clientes extends Validator{

    private $id = null;
    private $usuario = null;
    private $nombre = null;
    private $direccion = null;
    private $correo = null;
    private $telefono = null;
    private $clave = null;
    private $estado_cliente = null;


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
        if($this->validateEmail($value)) {
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

public function setEstadoCliente($value)
{
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->estado_cliente = $value;
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
        return $this->estado_cliente;
    }

    public function checkCliente($correo)
    {
        $sql = 'SELECT id_cliente, estado_cliente FROM tb_cliente WHERE usuario = ?';
        $params = array($correo);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_cliente'];
            $this->estado = $data['estado_cliente'];
            $this->correo = $correo;
            return true;
        } else {
            return false;
        }
    }

    public function checkPass($password)
    {
        $sql = 'SELECT clave FROM tb_cliente WHERE id_cliente = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave'])) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE tb_cliente  SET clave = ? WHERE id_cliente = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }
   
    public function editarPerfil()
    {
        $sql = 'UPDATE tb_cliente
                SET usuario=?, nombre=?, direccion=?, correo=?, telefono=?
                WHERE id_cliente = ?';
        $params = array($this->usuario, $this->nombre, $this->direccion, $this->correo, $this->telefono, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function buscarClientes($value)
    {
        $sql = 'SELECT id_cliente, usuario, nombre, direccion, correo, telefono, clave, estado_cliente
                FROM tb_cliente
                WHERE Nombre LIKE ?
                ORDER BY Nombre';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar una nuevo cliente
    public function crearClientes()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO tb_cliente(usuario,nombre, direccion, correo, telefono, clave, estado_cliente)
                VALUES(?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->usuario, $this->nombre, $this->direccion, $this->correo, $this->telefono, $hash, 'Activo');
        return Database::executeRow($sql, $params);
    }

    //Metodo para leer todas las clientes
    public function leerTodosClientes()
    {
        $sql = 'SELECT id_cliente ,usuario, nombre, correo, telefono, estado_cliente
                FROM tb_cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para leer solo una cliente
    public function leerUnCliente()
    {
        $sql = 'SELECT id_cliente, estado_cliente
                FROM tb_Cliente
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function leerUnClientePerfil()
    {
        $sql = 'SELECT id_cliente, usuario, nombre, direccion, correo, telefono
                FROM tb_cliente
                WHERE id_cliente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }


    //Metodo para actualizar una cliente
    public function actualizarClientes()
    {
        $sql = 'UPDATE tb_cliente
                SET estado_cliente = ?
                WHERE id_cliente = ?';
        $params = array($this->estado_cliente, $this->id);
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
