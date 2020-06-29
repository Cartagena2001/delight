<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/pedidos.php');
require_once('../../models/detalle_pedido.php');

if(isset($_GET['action'])){
    session_start();

    $pedidos = new pedidos;
    $result = array('status' => 0, 'session' => 0, 'message' => null, 'exception' => null);

    if(isset($_SESSION['id_cliente'])){
        $result['session'] = 1;

        switch($_GET['action']){
            case 'crearDetalle':
                if($pedidos->setCliente($_SESSION['id_cliente'])){
                    if($pedidos->leerOrden()){
                        $_POST =$pedidos->validateForm($_POST);
                        if($pedidos->setId_producto($_POST['id_producto'])){
                            if($pedidos->setPrecio($_POST['precio'])){
                                if($pedidos->setCantidad($_POST['cantidad'])){
                                    if($pedidos->crearPedidos()){
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
        }
    }

}else{
    exit('Recurso denegado');
}
?>