<?php

class  resena extends Validator{

    //Atributos
    private $id = null;
    private $calificacion = null;
    private $comentario = null;
    private $id_detalle_pedido  = null;


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

    public function setCalificacion($value)
    {
        if($this->validateNaturalNumber($value)){
            $this->calificacion = $value;
            return true;    
        }
        else{
            return false;
        }
    }

    public function setComentario($value)
    {
        if ($value) {
            if ($this->validateString($value, 1, 250)) {
                $this->comentario = $value;
                return true;
            } else {
                return false;
            }
        } else {
            $this->comentario = null;
            return true;
        }
    }

    public function setId_detalle_pedido($value)
    {
        if($this->validateNaturalNumber($value)){
            $this->id_detalle_pedido = $value;
            return true;    
        }
        else{
            return false;
        }
    }

    //Metodos para obtener los valores de los artibutos
    public function getId()
    {
        return $this->id;
    }

    public function getCalificacion()
    {
        return $this->calificacion;
    }

    public function setComentario()
    {
        return $this->comentario;
    }

    public function setId_detalle_pedido()
    {
        return $this->id_detalle_pedido;
    }

    //Metodos para realizar las acciones del SCRUD
    public function buscarResenia($value)
    {
        $sql = 'SELECT Id_resena, Calificacion, Comentario, Id_detalle_pedido
                FROM tb_resenia
                WHERE Calificacion ILIKE ? OR Comentario ILIKE ?
                ORDER BY Calificacion';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar una nuevo categoria
    public function crearResenia()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'INSERT INTO tb_resenia(Calificacion, Comentario, Id_detalle_pedido)
                    VALUES(?, ?, ?)';
            $params = array($this->calificacion, $this->comentario, $this->id_detalle_pedido, $this->id);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    //Metodo para leer todas las categorias
    public function leerTodasResenia()
    {
        $sql = 'SELECT Id_resena, Calificacion, Comentario, Id_detalle_pedido
                FROM tb_resenia
                ORDER BY Calificacion';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para leer solo una categoria
    public function leerUnaResenia()
    {
        $sql = 'SELECT Id_resena, Calificacion, Comentario, Id_detalle_pedido
                FROM tb_resenia
                WHERE Calificacion = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar una categoria
    public function actualizarResenia()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE tb_resenia
                    SET Calificacion = ?, Comentario = ?, Id_detalle_pedido = ?
                    WHERE Calificacion = ?';
            $params = array($this->calificacion, $this->comentario, $this->id_detalle_pedido, $this->Id);
        } else {
            $sql = 'UPDATE tb_resenia
                    SET Calificacion = ?, Comentario = ?, Id_detalle_pedido = ?
                    WHERE Calificacion = ?';
            $params = array($this->calificacion, $this->comentario, $this->id_detalle_pedido, $this->Id);
        }
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una categoria
    public function eliminarResenia()
    {
        $sql = 'DELETE FROM tb_resenia
                WHERE Calificacion = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>