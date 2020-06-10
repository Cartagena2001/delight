<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/pedidos.php');

if (isset($_GET['action'])) {
   
   session_start();
    // nueva sesion
    $pedidos = new pedidos;

    $result = array('status' => 0, 'message' => null, 'exception' => null);


    if (isset($_SESSION['id_administrador'])) {

    switch ($_GET['action']) {
        case 'readAll':
            if ($result['dataset'] = $pedidos->leerTodosPedidos()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay clientes';
            }
            break;
            case 'search':
                $_POST = $pedidos->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $pedidos->buscarPedidos($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron '.$rows.' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
            break;
            case 'create':
                $_POST = $pedidos->validateForm($_POST); 
                if (isset($_POST['id_cliente'])) {
                if ($pedidos->setId_cliente($_POST['id_cliente'])) { 
                     if($pedidos-> setId_cupon($_POST['id_cupon'])){
                         if($pedidos-> setId_detalle($_POST['id_detalle_pedido'])){
                            if($pedidos-> setCosto_envio ($_POST['costo_envio'])){
                                if($pedidos-> setFecha_pedido ($_POST['fecha_pedido'])){
                                    if($pedidos-> setFecha_entrega ($_POST['fecha_entrega'])){
                                            if ($pedidos->crearPedidos()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'pedido registrado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();;
                                            }
                                        }else{
                                            $result['exception'] = 'Fecha entrega';
                                    }  
                                }else{
                                    $result['exception'] = 'Fecha pedido';
                                }
                            }else{
                                $result['exception'] = 'Costo envio';
                            }
                        }else{
                            $result['exception'] = 'Detalle inexistente';
                        }
                     }else{
                        $result['exception'] = 'Cupon inexistente';
                     } 
                 }else{
                    $result['exception'] = 'Cliente inexistente';
                 }
                } else {
                    $result['exception'] =  $_POST['id_cliente']; 
                }
                break;
                case 'readOne':
                    $dato =  (int)$_POST['id_pedido'];
                    if ($pedidos->setId($dato)) {
                        if ($result['dataset'] = $pedidos->leerUnPedidos()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = $dato;
                        }
                    } else {
                        $result['exception'] = 'pedido incorrecto';
                    }
                break;
                case 'update':
                    $_POST = $pedidos->validateForm($_POST);
                    if ($pedidos->setId_cliente($_POST['id_cliente'])) { 
                        if ($data = $pedidos->leerUnPedidos()) {
                            if($pedidos-> setId_cupon($_POST['id_cupon'])){
                                if($pedidos-> setId_detalle($_POST['id_detalle_pedido'])){
                                   if($pedidos-> setCosto_envio ($_POST['costo_envio'])){
                                       if($pedidos-> setFecha_pedido ($_POST['fecha_pedido'])){
                                           if($pedidos-> setFecha_entrega ($_POST['fecha_entrega'])){
                                                if ($pedidos->actualizarPedidos()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'pedido actualizado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();;
                                                }
                                            }else{
                                                $result['exception'] = 'Estado incorrecto';
                                        }
                                        
                                    }else{
                                        $result['exception'] = 'Estado incorrecto';
                                    }
                                }else{
                                    $result['exception'] = 'Estado incorrecto';
                                }
                            }else{
                                $result['exception'] = 'Estado incorrecto';
                            }
                         }else{
                            $result['exception'] = 'Estado incorrecto';
                         } 
                     }else{
                        $result['exception'] = ' incorrecto';
                     }
                    }else{
                        $result['exception'] = 'Estado incorrecto';
                     }
                    break;

                    case 'delete':
                        if ($_POST['id_cliente'] != $_SESSION['id_cliente']) {
                            if ($pedidos->setId($_POST['id_pedido'])) {
                                if ($pedidos->leerUnPedidos()) {
                                    if ($pedidos->eliminarPedidos()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'pedido eliminado correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = 'Usuario inexistente';
                                }
                            } else {
                                $result['exception'] = 'Usuario incorrecto';
                            }
                        } else {
                            $result['exception'] = 'No se puede eliminar a sí mismo';
                        }
                        break;
                    default:
                        exit('Acción no disponible log');
                }
                // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
            header('content-type: application/json; charset=utf-8');
 // Se imprime el resultado en formato JSON y se retorna al controlador.
         print(json_encode($result));
         }else {
        exit('Acceso no disponible');
        }
        } else {
        exit('Recurso denegado');
        }   


?>
