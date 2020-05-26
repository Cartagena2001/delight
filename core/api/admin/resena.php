<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/productos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $resena = new resena;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $resena->leerTodasResenia()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'search':
                $_POST = $resena->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $resena->buscarResenia($_POST['search'])) {
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
                $_POST = $producto->validateForm($_POST);
                if ($resena->setCalificacion($_POST['calificacion'])) {
                    if ($resena->setComentario($_POST['comentario'])) {
                        if ($resena->setId_detalle_pedido($_POST['id_detalle_pedido'])) {
                           if ($resena->crearResenia()) {
                               $result['status'] = 1;
                               $result['message'] = 'Producto creado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();;
                                                }
                                            } else {
                                                $result['exception'] = 'detalle del pedido erroneo';
                                            }
                                        } else {
                                            $result['exception'] = 'comentario erroneo';
                                        }
                                    } else {
                                        $result['exception'] = 'calificacion buena';
                                    }
                break;
            case 'readOne':
                if ($resena->setId($_POST['id_resena'])) {
                    if ($result['dataset'] = $resena->leerUnaResenia()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                case 'update':
                    $_POST = $pedidos->validateForm($_POST);
                    if ($resena->setId($_POST['id_resenia'])) { 
                        if ($data = $resena->leerUnaResenia()) {
                            if($resena-> setCalificacion($_POST['calificacion'])){
                                if($resena-> setComentario($_POST['comentario'])){
                                   if($resena-> setId_detalle_pedido ($_POST['id_detalle_pedido'])){
                                                if ($resena->actualizarResenia()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'reseña actualizado correctamente';
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
                    $result['exception'] = ' incorrecto';
            }
         }else{
            $result['exception'] = 'Estado incorrecto';
              }
                    break;
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $resena->leerUnaResenia()) {
                        if ($resena->eliminarResenia()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $data['imagen_producto'])) {
                                $result['message'] = 'Reseña eliminada correctamente';
                            } else {
                                $result['message'] = 'Preliminadon';
                            }
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }

        
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        exit('Acceso no disponible');
    }
} else {
	exit('Recurso denegado');
}
?>