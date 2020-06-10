<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/resenia.php');

if(isset($_GET['action'])){
    session_start();
    $resenia = new resenia;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    if(isset($_SESSION['id_administrador'])){
        switch($_GET['action']){
            case 'readAll':
                if ($result['dataset'] = $resenia->leerTodosResenias()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay clientes';
                }
            break;
            case 'search':
                $_POST = $resenia->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $resenia->buscarResenia($_POST['search'])) {
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
            case 'readOne':
                if ($resenia->setId($_POST['id_resenia'])) {
                    if ($result['dataset'] = $resenia->leerUnaResenia()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
            break;
            case 'update':
                $_POST = $resenia->validateForm($_POST);
                if($resenia->setId($_POST['id_resenia'])){
                    if($data = $resenia->leerUnaResenia()){
                        if($resenia->setEstado($_POST['estadoResenia'])){
                            if($resenia->actualizarResenia()){
                                $result['status'] = 1;
                                $result['message'] = 'Cliente actualizado correctamente';
                            }else{
                                $result['exception'] = Database::getException();
                            }
                        }else{
                            $result['exception'] = 'Estado incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Resenia inexistente';
                    }
                }else{
                    $result['exception'] = 'Resenia incorrecto';
                }
            break;
            
            default:
            exit('Acción no disponible log');
        }
        header('content-type: application/json; charset=utf-8');
 // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    }else{
        exit('Acceso no disponible -.-');
    }
}else{
    exit('Recurso denegado');
}

?>