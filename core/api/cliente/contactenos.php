<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/contactenos.php');

if(isset($_GET['action'])){
    session_start();

    $contactenos = new contactenos;
    $result = array('status' => 0, 'session' => 0, 'message' => null, 'exception' => null);

    if(isset($_SESSION['id_cliente'])){
        $result['session'] = 1;

        switch($_GET['action']){
            case 'crearContactenos':
                if($co->setId_cliente($_SESSION['id_cliente'])){
                    if($contactenos->leerOrden()){
                        $_POST =$contactenos->validateForm($_POST);
                        if($contactenos->setTitulo_asunto($_POST['titulo_asunto'])){
                            if($contactenos->setAsunto($_POST['asunto'])){
                                    if($contactenos->leerUnContactenos()){
                                        $result['status'] = 1;
                                        $result['message'] = 'Producto agregado correctamente';
                                    }else{
                                        $result['exception'] = 'Ocurrió un problema al agregar el producto';
                                    }
                                }else{
                                    $result['exception'] = 'Cantidad incorrecta';
                                }
                            }else{
                                $result['exception'] = 'Precio incorrecto';
                            }
                        }else{
                            $result['exception'] = 'Producto incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Ocurrió un problema al obtener el pedido';
                    }
                }else{
                    $result['exception'] = 'Cliente incorrecto';
                }
            break;
?>