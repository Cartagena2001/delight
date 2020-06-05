<?php

require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/categorias.php');



if (isset($_GET['action'])) {
    session_start();
 // Se instancia la clase correspondiente.
 $categoria = new Categorias;
 // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
 $result = array('status' => 0, 'message' => null, 'exception' => null);

 if (isset($_SESSION['id_administrador'])) {



switch ($_GET['action']) {
    case 'readAll':
        if ($result['dataset'] = $categoria->leerTodasCategorias()) {
            $result['status'] = 1;
        } else {
            $result['exception'] = 'No hay categorías registradas';
        }
        break;
        case 'search':
            $_POST = $categoria->validateForm($_POST);
            if ($_POST['search'] != '') {
                if ($result['dataset'] = $categoria->buscarCategorias($_POST['search'])) {
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
            $_POST = $categoria->validateForm($_POST);
                if ($categoria->setNombre($_POST['nombre_producto'])) {
                    if ($categoria->setDescripcion($_POST['descripcion_producto'])) {
                          if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                            if ($categoria->setImagen($_FILES['archivo_producto'])) {
                              if ($categoria->crearCategoria()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Producto creado correctamente';
                                       } else {
                                                    $result['exception'] = Database::getException();;
                                                }
                                            } else {
                                                $result['exception'] = $producto->getImageError();
                                            }
                                        } else {
                                            $result['exception'] = 'Seleccione una imagen';
                                        }
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
                                    }
                }
            break;
            case 'readOne':
                if ($categoria->setId($_POST['id_categoria'])) {
                    if ($result['dataset'] = $categoria->leerUnaCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
            case 'update':
                $_POST = $categoria->validateForm($_POST);
                if ($categoria->setId($_POST['id_categoria'])) {
                    if ($data = $categoria->leerTodasCategorias()) {
                        if ($categoria->setNombre($_POST['nombre_categoria'])) {
                            if ($categoria->setDescripcion($_POST['descripcion_categoria'])) {
                                if (is_uploaded_file($_FILES['archivo_categoria']['tmp_name'])) {
                                    if ($categoria->setImagen($_FILES['archivo_categoria'])) {
                                        if ($categoria->actualizarCategoria()) {
                                            $result['status'] = 1;
                                            if ($categoria->deleteFile($categoria->getRuta(), $data['imagen_categoria'])) {
                                                $result['message'] = 'Categoría modificada correctamente';
                                            } else {
                                                $result['message'] = 'Categoría modificada pero no se borro la imagen anterior';
                                            }
                                        } else {
                                            $result['exception'] = Database::getException();
                                        } 
                                    } else {
                                        $result['exception'] = $categoria->getImageError();
                                    }
                                } else {
                                    if ($categoria->actualizarCategoria()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Categoría modificada correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                }
                            } else {
                                $result['exception'] = 'Descripción incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
                case 'delete':
                    if ($categoria->setId($_POST['id_categoria'])) {
                        if ($data = $categoria->leerUnaCategoria()) {
                            if ($categoria->eliminarCategoria()) {
                                $result['status'] = 1;
                                if ($categoria->deleteFile($categoria->getRuta(), $data['imagen_categoria'])) {
                                    $result['message'] = 'Categoría eliminada correctamente';
                                } else {
                                    $result['message'] = 'Categoría eliminada pero no se borro la imagen';
                                }
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Categoría inexistente';
                        }
                    } else {
                        $result['exception'] = 'Categoría incorrecta';
                    }
                    break;
                default:
                    exit('Acción no disponible');
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