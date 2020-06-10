<?php

class resenia extends Validator{
    private $id = null;
    private $calificacion = null;
    private $comentario = null;
    private $estado = null;
    private $detalle_pedido = null;

    public function setId($value){
        if($this->validateNaturalNumber($value)){
            $this->id = $value;
            return true;    
        }
        else{
            return false;
        }
    }

    public function setCalificacion($value){
    if($this->validateAlphanumeric($value, 1, 50)) {
        $this->calificacion = $value;
        return true;
        } else {
            return false;
        }
    }

    public function setComentario($value)
    {
        if($this->validateAlphanumeric($value, 1, 250))
        {
            $this->comentario = $value;
            return true;
    
        }
        else{
            return false;
        }
    }

    public function setEstado($value){
    if($this->validateAlphanumeric($value, 1, 50)) {
        $this->estado = $value;
        return true;
        } else {
            return false;
        }
    }

    public function setDetallePedido($value){
        if($this->validateNaturalNumber($value)){
            $this->detalle_pedido = $value;
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

    public function getCalificacion()
    {
        return $this->calificacion;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getDetalle_pedido()
    {
        return $this->detalle_pedido;
    }

    //filtrar resenia
    public function buscarResenia($value)
    {
        $sql = 'SELECT id_resenia, calificacion, comentario, estado, id_detalle_pedido
                FROM tb_resenia
                WHERE comentario ILIKE ?
                ORDER BY comentario';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    //leer todas las resenias
    public function leerTodosResenias()
    {
        $sql = 'SELECT id_resenia, calificacion, comentario, estado, id_detalle_pedido
        FROM tb_resenia';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //leer una resenia
    public function leerUnaResenia()
    {
        $sql = 'SELECT id_resenia, calificacion, comentario, estado, id_detalle_pedido
                FROM tb_resenia
                WHERE id_resenia = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //actualizar resenia
    public function actualizarResenia()
    {
        $sql = 'UPDATE tb_resenia
                SET estado = ?
                WHERE id_resenia = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }


}
?>