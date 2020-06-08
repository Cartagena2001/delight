<?php

class productos extends Validator{
    private $id = null;
    private $nombre = null;
    private $precio = null;
    private $descripcion = null;
    private $imagen = null;
    private $ruta = '../../../resources/img/categorias/';
    private $archivo = null;
    private $categoria = null;
    private $estado = null;


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

public function setPrecio($value)
{
    if ($value) {
        if ($this->validateAlphanumeric($value, 1, 3)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }
}

// public function setDescripcion($value)
//     {
//         if ($value) {
//             if ($this->validateString($value, 1, 250)) {
//                 $this->descripcion = $value;
//                 return true;
//             } else {
//                 return false;
//             }
//         } else {
//             $this->descripcion = null;
//             return true;
//         }
//     }

    public function setDescripcion($value)
    {
        if($this->validateAlphanumeric($value, 1, 250))
        {
            $this->descripcion = $value;
            return true;
    
        }
        else{
            return false;
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

public function setCategoria($value)
{
    if($this->validateNaturalNumber($value)){
        $this->categoria = $value;
        return true;
    } else {
        return false;
    }
}

public function setEstado($value)
{
    if($this->validateAlphanumeric($value, 1, 50)) {
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

    public function getNombre()
    {
        return $this->nombre;
    } 

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
    
    public function getEstado()
    {
        return $this->estado;
    }
    
    public function getRuta()
    {
        return $this->ruta;
    }

    public function buscarProductos($value)
    {
        $sql = 'SELECT Id_producto, Nombre, Precio, Descripcion, Imagen, Id_categoria, estado
                FROM tb_producto
                WHERE Nombre ILIKE ? OR Precio ILIKE ?
                ORDER BY Nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo para insertar una nuevo productos
    public function crearProductos()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'INSERT INTO tb_productos(nombre, precio, descripcion, imagen, id_categoria, estado)
                    VALUES(?, ?, ?, ?, ?, ?)';
            $params = array($this->nombre, $this->precio, $this->descripcion, $this->imagen, $this->categoria, $this->estado);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    // public function crearProductos()
    // {
        
    //         $sql = 'INSERT INTO tb_productos(nombre, precio, descripcion, id_categoria, estado)
    //                 VALUES(?, ?, ?, ?, ?)';
    //         $params = array($this->nombre, $this->precio, $this->descripcion, $this->categoria, $this->estado);
    //         return Database::executeRow($sql, $params);
        
    // }

    //Metodo para leer todas las productos
    public function leerTodosProductos()
    {
        $sql = 'SELECT tb_productos.Id_producto, tb_productos.nombre_p, tb_productos.Precio, tb_productos.Descripcion, tb_productos.Imagen, tb_categoria.nombre, estado
        FROM tb_productos INNER JOIN tb_categoria ON tb_productos.id_categoria = tb_categoria.id_categoria
        GROUP BY tb_productos.Id_producto, tb_productos.nombre_p, tb_productos.Precio, tb_productos.Descripcion, tb_productos.Imagen, tb_categoria.nombre, estado
        ORDER BY tb_productos.nombre_p';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para leer solo una producto
    public function leerUnaProductos()
    {
        $sql = 'SELECT Id_producto, Nombre, Precio, Descripcion, Imagen, Id_categoria, estado
                FROM tb_productos
                WHERE Id_Producto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar una productos
    public function actualizarProductos()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE tb_productos
                    SET Nombre = ?, Precio = ?, Descripcion = ?, Imagen = ?, Id_categoria = ?, estado = ?
                    WHERE Id_producto = ?';
            $params = array($this->Nombre, $this->Precio, $this->Descripcion, $this->imagen, $this->categoria, $this->estado,$this->id);
        } else {
            $sql = 'UPDATE tb_productos
                    SET SET Nombre = ?, Precio = ?, Descripcion = ?, Id_categoria = ?, estado = ?
                    WHERE Id_producto = ?';
            $params = array($this->Nombre, $this->Precio, $this->Descripcion, $this->categoria, $this->estado,$this->id);
        }
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una productos
    public function eliminarProductos()
    {
        $sql = 'DELETE FROM tb_productos
                WHERE Id_producto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }









}
?>
