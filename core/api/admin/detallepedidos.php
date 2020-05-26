<?php

require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/detalle_pedido.php');

if (isset($_GET['action'])) {
    // Se instancia la clase correspondiente.
    $detalleP = new detalle_pedido;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
   
    if (isset($_SESSION['id_usuario'])) {
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
                    if ($detalleP->setId_producto($_POST['id_producto'])) { 
                         if($detalleP-> setPrecio($_POST['precio_compra'])){
                             if($detalleP-> setCantidad($_POST['cantidad'])){
  
                            }else{
                                $result['exception'] = 'Estado incorrecto';
                            }
                         }else{
                            $result['exception'] = 'Estado incorrecto';
                         } 
                     }else{
                        $result['exception'] = 'Estado incorrecto';
                     }
                    break;
                    case 'readOne':
                        if ($clientes->setId($_POST['id_cliente'])) {
                            if ($result['dataset'] = $detalleP->leerTodosDetalle()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'cliente inexistente';
                            }
                        } else {
                            $result['exception'] = 'Categoría incorrecta';
                        }
                    break;
                    case 'update':
                        $_POST = $detalleP->validateForm($_POST);
                        if ($detalleP->setId($_POST['id_detalle_pedidos'])) {
                            if ($data = $detalleP->leerUnaDetalle()) {
                               if ($detalleP->setId_producto($_POST['id_producto'])) { 
                                 if($detalleP-> setPrecio($_POST['precio_compra'])){
                                    if($detalleP-> setCantidad($_POST['cantidad'])){
      
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
                            if ($_POST['id_cliente'] != $_SESSION['id_cliente']) {
                                if ($data = $detalleP->leerUnaDetalle()) {
                                if ($detalleP->setId($_POST['id_detalle_pedido'])) {
                                    if ($detalleP->leerUnaDetalle()) {
                                        if ($detalleP->eliminarDetalle()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Usuario eliminado correctamente';
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