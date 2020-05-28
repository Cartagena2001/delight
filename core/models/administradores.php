<?php

class administradores extends Validator{

    private $id = null;
    private $usuario = null;
    private $nombre = null;
    private $correo = null;
    private $telefono = null;
    private $clave = null;
    private $estado = null;

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

    //Gestionar cuenta nombre
    public function checkUsuario($usuario)
    {
        $sql = 'SELECT id_administrador FROM tb_administradores WHERE id_administrador = ?';
        $params = array($usuario);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_administrador'];
            $this->usuario = $usuario;
            return true;
        } else {
            return false;
        }
    }

    //Gestionar cuenta password
    public function checkClave($password)
    {
        $sql = 'SELECT clave FROM tb_administradores WHERE id_administrador = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave'])) {
            return true;
        } else {
            return false;
        }
    }

    public function cambiarClave()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE tb_administradores SET clave = ? WHERE id_administrador = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE tb_administradores
                SET usuario = ?, nombre = ?, correo = ?, telefono = ?
                WHERE id_administrador = ?';
        $params = array($this->usuario, $this->nombre, $this->correo, $this->telefono, $this->id);
        return Database::executeRow($sql, $params);
    }


    public function buscarClientes($value)
    {
        $sql = 'SELECT id_administrador, usuario, nombre, Correo, Telefono, clave, estado_admin
                FROM tb_administradores
                WHERE nombre ILIKE ? OR usuario ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    //SCURD
    public function crearAdmin()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO tb_administradores(usuario, nombre, correo, telefono, clave, estado_admin)
                VALUES(?, ?, ?, ?, ?, Activo)';
        $params = array($this->usuario, $this->nombre, $this->correo, $this->telefono, $hash);
        return Database::executeRow($sql, $params);
    }

     //Metodo para leer todas las clientes
     public function leerTodosLosAdmin()
     {
         $sql = 'SELECT id_administrador, usuario, nombre, correo, telefono, clave, estado_admin
                 FROM tb_administradores
                 ORDER BY nombre';
         $params = null;
         return Database::getRows($sql, $params);
     }

     //Metodo para leer solo una cliente
    public function leerUnAdmin()
    {
        $sql = 'SELECT id_administrador, usuario, nombre, Correo, Telefono, clave, estado_admin
                FROM tb_administradores
                WHERE id_administradores = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    
    //Metodo para actualizar una cliente
    public function actualizarAdmin()
    {
        $sql = 'UPDATE tb_administradores
                SET usuario = ?, nombre = ?, Correo = ? Telefono = ?, clave = ? estado_admin = ?
                WHERE id_administrador = ?';
        $params = array($this->usuario, $this->nombre, $this->Correo, $this->Telefono, $this->clave, $this->estado,$this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una cliente
    public function eliminarAdmin()
    {
        $sql = 'DELETE FROM tb_administradores
                WHERE id_administrador = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}

?>