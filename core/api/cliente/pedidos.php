<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/pedidos.php');
require_once('../../models/detalle_pedido.php');

if(isset($_GET['action'])){
    session_start();

    $pedidos = new pedidos;
    $result = array('status' => 0, 'session' => 0, 'message' => null, 'exception' => null);

//verifica la cuenta del cliente
    if(isset($_SESSION['id_cliente'])){
        $result['session'] = 1;

//Funcion que se encarga de recolectar los datos del modelo de pedidos
        switch($_GET['action']){
            case 'crearDetalle':
                if($pedidos->setId_cliente($_SESSION['id_cliente'])){
                    if($pedidos->leerOrden()){
                        $_POST =$pedidos->validateForm($_POST);
                        if($pedidos->setId_producto($_POST['id_producto'])){
                            if($pedidos->setPrecio($_POST['precio_producto'])){
                                if($pedidos->setCantidad($_POST['cantidad'])){
                                    if($pedidos->createDetalle()){
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

//Lee los productos que van a comprar
            case 'LeerCarrito':
                if($pedidos->setId_cliente($_SESSION['id_cliente'])){
                    if($pedidos->leerOrden()){
                        if($result['dataset'] = $pedidos->LeerCarrito()){
                            $result['status'] = 1;
                            $_SESSION['id_pedido'] = $pedidos->getId();  
                        }else{
                            $result['exception'] = 'No tiene productos en su pedido';
                        }
                    }else{  
                        $result['exception'] = 'Debe agregar un producto al pedido';
                    }
                }else{
                    $result['exception'] = 'Cliente incorrecto';     
                }
            break;

//visualiza la cantidad de los productos
            case 'ActuCarrito':
                if($pedidos->setId($_SESSION['id_pedido'])){
                    $_POST = $pedidos->validateForm($_POST);
                    if($pedidos->setId_detalle($_POST['id_detalle'])){
                        if($pedidos->setCantidad($_POST['cantidad_producto'])){
                            if($pedidos->actualizarCarrito()){
                                $result['status'] = 1;
                                $result['message'] = 'Cantidad modificada correctamente';
                            }else{
                                $result['exception'] = 'Ocurrió un problema al modificar la cantidad';
                            }
                        }else{
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                    }else{
                        $result['exception'] = 'Detalle incorrecto';    
                    }
                }else{
                    $result['exception'] = 'Pedido incorrecto';
                }
            break;
            
//Elimina la compra en el carrito
            case 'eliminarCarrito':
                if($pedidos->setId($_SESSION['id_pedido'])){
                    if($pedidos->setId_detalle($_POST['id_detalle'])){
                        if($pedidos->eliminarDetalle()){
                            $result['status'] = 1;
                            $result['message'] = 'Producto removido correctamente';
                        }else{
                            $result['exception'] = 'Ocurrió un problema al remover el producto';
                        }
                    }else{
                        $result['exception'] = 'Detalle incorrecto';
                    }
                }else{
                    $result['exception'] = 'Pedido incorrecto';
                }
            break;
            
//Se confirma la compra de producto y pasa a estado 1
            case 'finalizarPago':
                if($pedidos->setId($_SESSION['id_pedido'])){
                    if($pedidos->setEstado(1)){
                        if($pedidos->actualizarEstadoOrden()){
                            $result['status'] = 1;
                            $result['message'] = 'Pedido finalizado correctamente';
                        }else{
                            $result['exception'] = 'Ocurrió un problema al finalizar el pedido';
                        }       
                    }else{
                        $result['exception'] = 'Estado incorrecto';
                    }
                }else{  
                    $result['exception'] = 'Pedido incorrecto';
                }
            break;
            default:
                exit('Acción no disponible dentro de la sesión');
        }
    }else{
        switch ($_GET['action']) {
            case 'crearDetalle':
                $result['exception'] = 'Debe iniciar sesión para agregar el producto al carrito';
                break;
            default:
                exit('Acción no disponible fuera de la sesión');
        }
    }
    header('content-type: application/json; charset=utf-8');
    print(json_encode($result));

}else{
    exit('Recurso denegado');
}
?>