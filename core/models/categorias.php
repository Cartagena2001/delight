<?php

class  categorias extends Validator{

    //Atributos
    private $id = null;
    private $nombre = null;
    private $descripcion = null;
    private $imagen = null;
    private $ruta = '../../../resources/img/categorias/';
    private $archivo = null;


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

    public function setNombre($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion($value)
    {
        if ($value) {
            if ($this->validateString($value, 1, 250)) {
                $this->descripcion = $value;
                return true;
            } else {
                return false;
            }
        } else {
            $this->descripcion = null;
            return true;
        }
    }

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
            $this->archivo = $file;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    //Metodos para realizar las acciones del SCRUD
    public function buscarCategorias($value)
    {
        $sql = 'SELECT id_categoria, nombre, descripcion, imagen
                FROM tb_categoria
                WHERE nombre ILIKE ? 
                ORDER BY nombre';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar una nuevo categoria
    public function crearCategoria()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'INSERT INTO tb_categoria(nombre, descripcion, imagen)
                    VALUES(?, ?, ?)';
            $params = array($this->nombre, $this->descripcion, $this->imagen);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    //Metodo para leer todas las categorias
    public function leerTodasCategorias()
    {
        $sql = 'SELECT id_categoria, nombre, descripcion, imagen
                FROM tb_categoria
                ORDER BY nombre';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para leer solo una categoria
    public function leerUnaCategoria()
    {
        $sql = 'SELECT id_categoria, nombre, descripcion, imagen
                FROM tb_categoria
                WHERE id_categoria = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar una categoria
    public function actualizarCategoria()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE tb_categoria
                    SET nombre = ?, descripcion = ?, imagen = ?
                    WHERE id_categoria = ?';
            $params = array($this->nombre, $this->descripcion, $this->imagen, $this->id);
        } else {
            $sql = 'UPDATE tb_categoria
                    SET nombre = ?, descripcion = ?
                    WHERE id_categoria = ?';
            $params = array($this->nombre, $this->descripcion, $this->id);
        }
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una categoria
    public function eliminarCategoria()
    {
        $sql = 'DELETE FROM tb_categoria
                WHERE id_categoria = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>