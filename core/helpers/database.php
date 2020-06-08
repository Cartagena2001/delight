<?php

class Database{

    private static $connection = null;
    private static $statement = null;
    private static $error = null;
    private static $id = null;

    private function connect(){
        
        $server = 'localhost';
        $database = 'delight';
        $username = 'postgres';
        $password = '14217';
        
        try{
            self::$connection = new PDO('pgsql:host='.$server.';dbname='.$database.';port=5432', $username, $password);
        }
        catch(PDOException $error){

            self::setException($error->getCode(), $error->getMessage());
            exit(self::getException());
        }
    }

    private function desconnect(){
        self::$connection = null;
        $error = self::$statement->errorInfo();
        if($error[0] != '00000'){
            self::setException($error[0], $error[2]);
        }
    }

    //metodo que sierve para hacer las sentencias SQL o SCRUD.
    public static function executeRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        $state = self::$statement->execute($values);
        self::$id = self::$connection->lastInsertId();
        self::desconnect();
        return $state;
    }

    //Metodo para obtener UN SOLO resgistro de una tabla, o sentencia SQL de tipo SELECT.
    public static function getRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetch(PDO::FETCH_ASSOC);
    }

    //Metodo para obtener TODOS los registros de una tabla, o sentencia SQL de tipo SELECT.
    public static function getRows($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetchAll(PDO::FETCH_ASSOC);
    }

    //Metodo para obtener la llave primaria del ultimo registro ingresado.
    public static function getLastRowId()
    {
        return self::$id;
    }

    //Metodo para obtener el mensasje de error personalizado
    private static function setException($code, $message)
    {
        switch ($code) {
            case '7':
                self::$error = 'Existe un problema al conectar con el servidor';
                break;
            case '42703':
                self::$error = 'Nombre de campo desconocido';
                break;
            case '23505':
                self::$error = 'Dato duplicado, no se puede guardar';
                break;
            case '42P01':
                self::$error = 'Nombre de tabla desconocido';
                break;
            case '23503':
                self::$error = 'Registro ocupado, no se puede eliminar';
                break;
            default:
                self::$error = $message;
        }
    }

    //Metodo para obtener un error personalizado cuando ocurre una excepcion.
    public static function getException()
    {
        return self::$error;
    }
}
?>