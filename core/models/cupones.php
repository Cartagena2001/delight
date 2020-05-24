<?php

class  cupones extends Validator{

    //Atributos
    private $id = null;
    private $puntos = null;
    private $opcion = null;

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

    public function setPuntos($value)
    {
        if($this->validateAlphanumeric($value, 1, 6)) {
            $this->puntos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setOpcion($value)
    {
        if($this->validateString($value, 1, 6)) {
            $this->opcion = $value;
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

    public function getPuntos()
    {
        return $this->puntos;
    }

    public function getOpcion()
    {
        return $this->opcion;
    }

    //Metodos para realizar las acciones del SCRUD
    public function buscarCupones($value)
    {
        $sql = 'SELECT Id_cupon, puntos, opcion
                FROM tb_cupones
                WHERE puntos ILIKE ? OR opcion ILIKE ?
                ORDER BY puntos';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar una nuevo cupon
    public function crearCupones()
    {
        $sql = 'INSERT INTO tb_cupones(puntos, opcion)
                    VALUES(?, ?)';
        $params = array($this->puntos, $this->opcion);
        return Database::executeRow($sql, $params);
    }

    //Metodo para leer todas las cupones
    public function leerTodasCupones()
    {
        $sql = 'SELECT Id_cupon, puntos, opcion
                FROM tb_cupones
                ORDER BY puntos';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para leer solo una cupon
    public function leerUnaCupones()
    {
        $sql = 'SELECT Id_cupon, puntos, opcion
                FROM tb_cupones
                WHERE Id_cupon = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar una cupon
    public function actualizarCupones()
    {
        $sql = 'UPDATE tb_cupones
                SET puntos = ?, opcion = ?
                WHERE Id_cupon = ?';
        $params = array($this->puntos, $this->opcion, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una cupon
    public function eliminarCupones()
    {
        $sql = 'DELETE FROM tb_cupones
                WHERE Id_cupon = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>