<?php

Class contactenos extends Validator{
    private $id = null;
    private $titulo_asunto = null;
    private $asunto = null;
    private $idCliente = null;

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

public function setTitulo_asunto($value)
{
    if($this->validateAlphanumeric($value, 1, 50)) {
        $this->titulo_asunto = $value;
        return true;
    } else {
        return false;
    }
}

public function setAsunto($value)
{
    if($this->validateAlphanumeric($value, 1, 50)) {
        $this->asunto = $value;
        return true;
    } else {
        return false;
    }
}

public function setIdCliente($value)
{
    if($this->validateNaturalNumber($value)){
        $this->idCliente = $value;
        return true;    
    }
    else{
        return false;
    }
}

public function getId()
{
    return $this->id;
}

public function getTitulo_asunto()
{
    return $this->titulo_asunto;
}

public function getAsunto()
{
    return $this->asunto;
} 

public function getIdCliente()
{
    return $this->idCliente;
}

public function buscarrContactenos($value)
    {
        $sql = 'SELECT id_contacto, titulo_asunto, asunto, id_cliente
                FROM tb_contactenos
                WHERE titulo_asunto ILIKE ? OR asunto ILIKE ?
                ORDER BY asunto';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    
    //Metodos SCRUD
public function crearContactenos()
    {
        $sql = 'INSERT INTO tb_contactenos(titulo_asunto, asunto, id_cliente)
                    VALUES(?, ?, ?)';
        $params = array($this->titulo_asunto, $this->asunto, $this->id_clientes);
        return Database::executeRow($sql, $params);
    }

     //Metodo para leer todas las contactenos
     public function leerTodosContactos()
     {
         $sql = 'SELECT id_contactenos, titulo_asunto, asunto, id_cliente
                 FROM tb_contactenos
                 ORDER BY titulo_asunto';
         $params = null;
         return Database::getRows($sql, $params);
     }

     public function leerUnContactenos()
    {
        $sql = 'SELECT id_contactenos, titulo_asunto, asunto, id_cliente
                FROM tb_contactenos
                WHERE id_contactenos = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }


}
