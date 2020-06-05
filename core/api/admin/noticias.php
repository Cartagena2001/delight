<?php

require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/noticias.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $noticia = new noticias;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['id_administrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $noticia->leerTodasNoticias()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'search':
                $_POST = $noticia->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $noticia->buscarNoticias($_POST['search'])) {
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
                $_POST = $noticia->validateForm($_POST);
                if ($noticia->setTitulo($_POST['titulo'])) {
                    if ($noticia->setDescripcion($_POST['descripcion'])) {
                            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                if ($noticia->setImagen($_FILES['imagen '])) {
                                             if ($noticia->setFecha($_POST['fecha_pub'])) {
                                                  if ($noticia->setFecha($_POST['fecha_pub'])) {
                                                if ($noticia->crearNoticias()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Producto creado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = 'Estado incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'seleciona imagen';
                                        }
                                    } else {
                                        $result['exception'] = $producto->getImageError();
                                    }
                                } else {
                                    $result['exception'] = 'Categoría incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Categoría incorrecta';
                            }
                        } else {
                            $result['exception'] = 'titulo incorrecto';
                        }
                break;
            case 'readOne':
                if ($noticia->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $noticia->leerUnaNoticias()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'noticia inexistente';
                    }
                } else {
                    $result['exception'] = 'noticia incorrecta';
                }
                break;
            case 'update':
                $_POST = $noticia->validateForm($_POST);
                if ($noticia->setTitulo($_POST['titulo'])) {
                    if ($noticia->setDescripcion($_POST['descripcion'])) {
                            if (is_uploaded_file($_FILES['iamgen']['tmp_name'])) {
                                if ($noticia->setImagen($_FILES['imagen'])) {
                                             if ($noticia->setFecha($_POST['fecha_pub'])) {
                                                if ($noticia->actualizarNoticias()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Producto creado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();;
                                                }
                                            } else {
                                                $result['exception'] = 'Estado incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'seleciona imagen';
                                        }
                                    } else {
                                        $result['exception'] = $producto->getImageError();
                                    }
                                } else {
                                    $result['exception'] = 'Categoría incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Categoría incorrecta';
                            }
                break;
            case 'delete':
                if ($noticia->setId($_POST['id_noticia'])) {
                    if ($data = $noticia->leerUnaNoticias()) {
                        if ($noticia->eliminarNoticias()) {
                            $result['status'] = 1;
                            if ($noticia->deleteFile($noticia->getRuta(), $data['imagen_noticia'])) {
                                $result['message'] = 'Producto eliminado correctamente';
                            } else {
                                $result['message'] = 'Producto eliminado pero no se borro la imagen';
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
                break;
            
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