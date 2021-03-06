<?php

require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/detalle_pedido.php');

if (isset($_GET['action'])) {
    session_start();
    // Se instancia la clase correspondiente.
    $detalleP = new detalle_pedido;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
   
    if (isset($_SESSION['id_administrador'])) {
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $detalleP->leerTodosDetalle()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay clientes';
                }
                break;
                case 'search':
                    $_POST = $detalleP->validateForm($_POST);
                    if ($_POST['search'] != '') {
                        if ($result['dataset'] = $detalleP->buscarDetalle($_POST['search'])) {
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
                    $_POST = $detalleP->validateForm($_POST);
                    if (isset($_POST['id_producto'])) {
                    if ($detalleP->setId_producto($_POST['id_producto'])) { 
                         if($detalleP-> setPrecio($_POST['precio_compra'])){
                             if($detalleP-> setCantidad($_POST['cantidad'])){
                                if($detalleP->crearDetalle()){
                                    $result['status'] = 1;
                                    $result['message'] = 'Detalle creado correctamente';
                                }else{
                                    $result['exception'] = Database::getException();
                                }
                            }else{
                                $result['exception'] = 'Cantidad incorrecta';
                            }
                         }else{
                            $result['exception'] = 'Precio incorrecto';
                         } 
                        } else {
                            $result['exception'] = 'Producto inexistente'; 
                        }
                     }else{
                        $result['exception'] = 'Producto incorrecto';
                     }
                    break;
                    case 'readOne':
                        if ($detalleP->setId($_POST['id_detalle_pedido'])) {
                            if ($result['dataset'] = $detalleP->leerUnaDetalle()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'detalle inexistente';
                            }
                        } else {
                            $result['exception'] = 'detalle incorrecta';
                        }
                    break;
                    case 'update':
                        $_POST = $detalleP->validateForm($_POST);
                        if ($detalleP->setId($_POST['id_detalle_pedido'])) {
                            if ($data = $detalleP->leerUnaDetalle()) {
                               if ($detalleP->setId_producto($_POST['id_producto'])) { 
                                 if($detalleP-> setPrecio($_POST['precio_compra'])){
                                    if($detalleP-> setCantidad($_POST['cantidad'])){
                                        if ($detalleP->actualizarDetalle()) {
                                            $result['status'] = 1; 
                                                $result['message'] = 'Detalle modificado correctamente';
                                            } else {
                                                $result['message'] = 'Detalle modificada pero no se borro la imagen anterior';
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
                            $result['exception'] = 'no encontrado';
                         }
                        }else{
                            $result['exception'] = 'no encontrado';
                         }
                        break;
    
                        case 'delete':
                            if ($detalleP->setId($_POST['id_detalle_pedido'])) {
                                if ($data = $detalleP->leerUnaDetalle()) {
                                    if ($detalleP->eliminarDetalle()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Producto eliminado correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = 'Producto inexistente';
                                }
                            } else {
                                $result['exception'] = 'Producto incorrecto';
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