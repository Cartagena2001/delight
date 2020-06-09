<?php

    require_once('../../helpers/database.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/cupones.php');

    if (isset($_GET['action'])) {
        session_start();
        // Se instancia la clase correspondiente.
        $cupones = new cupones;
        // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
        $result = array('status' => 0, 'message' => null, 'exception' => null);
       
        if (isset($_SESSION['id_administrador'])) {

            switch ($_GET['action']) {
                case 'readAll':
                    if ($result['dataset'] = $cupones->leerTodasCupones()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay clientes';
                    }
                    break;
                    case 'search':
                        $_POST = $cupones->validateForm($_POST);
                        if ($_POST['search'] != '') {
                            if ($result['dataset'] = $cupones->buscarCupones($_POST['search'])) {
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
                        $_POST = $cupones->validateForm($_POST);
                        if ($cupones->setPuntos($_POST['puntos'])) { 
                             if($cupones->setOpcion($_POST['opcion'])){
                                    if ($cupones->crearCupones()){
                                        $result['status'] = 1;
                                                $result['message'] = 'cupon registrado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();;
                                            }
                             }else{
                                $result['exception'] = 'Cupon incorrecto';
                             } 
                         }else{
                            $result['exception'] = 'cupon incorrecto';
                         }
                        break;
                        case 'readOne':
                            if ($cupones->setId($_POST['id_cupon'])) {
                                if ($result['dataset'] = $cupones->leerUnaCupones()) {
                                    $result['status'] = 1;
                                } else {
                                    $result['exception'] = 'cupon inexistente';
                                }
                            } else {
                                $result['exception'] = 'cupon incorrecto';
                            }
                        break;
                        case 'update':
                            $_POST = $cupones->validateForm($_POST); 
                            if ($cupones->setId($_POST['id_cupon'])) {
                                if ($data = $cupones->leerUnaCupones()) {
                                 if ($cupones->setPuntos($_POST['puntos'])) { 
                                    if($cupones->setOpcion($_POST['opcion'])){
                                        if ($cupones->actualizarCupones()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'cupon actualizado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();;
                                        }
                             }else{
                                $result['exception'] = 'Opcion incorrecta';
                             } 
                         }else{
                            $result['exception'] = 'Puntos incorrectos';
                          } 
                        }else{
                            $result['exception'] = 'Cupon inexistente';
                         }
                        }else{
                            $result['exception'] = 'Cupon incorrecto';
                         }
                           
                         break;
        
                            case 'delete':
                                    if ($cupones->setId($_POST['id_cupon'])) {
                                        if ($cupones->leerTodasCupones()) {
                                            if ($cupones->eliminarCupones()) {
                                                $result['status'] = 1;
                                                $result['message'] ='Cupon eliminado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();
                                            }
                                        } else {
                                            $result['exception'] = 'cupon inexistente';
                                        }
                                    } else {
                                        $result['exception'] = 'cupon incorrecto';
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