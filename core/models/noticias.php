<?php

class  noticias extends Validator{

    //Atributos
    private $id = null;
    private $titulo = null;
    private $descripcion = null;
    private $imagen = null;
    private $ruta = '../../../resources/img/noticias/';
    private $fecha = null;


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

    public function setTitulo($value)
    {
        if($this->validateAlphanumeric($value, 1, 50)) {
            $this->titulo = $value;
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

    public function setFecha($value)
    {
        if($this->validateAlphanumeric($value, 1, 10)) {
            $this->fecha = $value;
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

    public function getTitulo()
    {
        return $this->titulo;
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

    public function getFecha()
    {
        return $this->fecha;
    }

    //Metodos para realizar las acciones del SCRUD
    public function buscarNoticias($value)
    {
        $sql = 'SELECT Id_noticia, titulo, descripcion, imagen, fecha_pub
                FROM tb_noticia
                WHERE titulo ILIKE ? OR descripcion ILIKE ?
                ORDER BY titulo';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar una nuevo noticas
    public function crearNoticias()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'INSERT INTO tb_noticia(titulo, descripcion, imagen, fecha_pub)
                    VALUES(?, ?, ?, ?)';
            $params = array($this->titulo, $this->descripcion, $this->imagen, $this->fecha);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    //Metodo para leer todas las noticas
    public function leerTodasNoticias()
    {
        $sql = 'SELECT Id_noticia, titulo, descripcion, imagen, fecha_pub
                FROM tb_noticia
                ORDER BY titulo';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para leer solo una notica
    public function leerUnaNoticias()
    {
        $sql = 'SELECT Id_noticia, titulo, descripcion, imagen, fecha_pub
                FROM tb_noticia
                WHERE Id_noticia = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar una noticas
    public function actualizarNoticias()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE tb_noticia
                    SET titulo = ?, descripcion = ?, imagen = ?, fecha_pub = ?
                    WHERE Id_noticia = ?';
            $params = array($this->titulo, $this->descripcion, $this->imagen, $this->fecha, $this->id);
        } else {
            $sql = 'UPDATE tb_noticia
                    SET titulo = ?, descripcion = ?, fecha_pub = ?
                    WHERE Id_noticia = ?';
            $params = array($this->titulo, $this->descripcion, $this->fecha, $this->id);
        }
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una noticas
    public function eliminarNoticias()
    {
        $sql = 'DELETE FROM tb_noticia
                WHERE Id_noticia = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
?>