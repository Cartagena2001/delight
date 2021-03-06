<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/productos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $producto = new Productos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
	if (isset($_SESSION['id_administrador'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $producto->leerTodosProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
                case 'search':
                    $_POST = $producto->validateForm($_POST);
                    if ($_POST['search'] != '') {
                        if ($result['dataset'] = $producto->buscarProductos($_POST['search'])) {
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
                if($producto->setNombre($_POST['nombre'])){
                    if($producto->setPrecio($_POST['precio'])){
                        if($producto->setDescripcion($_POST['descripcion'])){
                            if(is_uploaded_file($_FILES['archivoProducto']['tmp_name'])){
                                if($producto->setImagen($_FILES['archivoProducto'])){
                                    if(isset($_POST['categoriaProducto'])){
                                        if($producto->setCategoria($_POST['categoriaProducto'])){
                                            if($producto->setEstado($_POST['estadoProducto'])){
                                                if($producto->crearProductos()){
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Producto creado correctamente';
                                                }else{
                                                    $result['exception'] = Database::getException();
                                                }
                                            }else{
                                                $result['exception'] = 'Estadp incorrecta';
                                            }
                                        }else{
                                            $result['exception'] = 'Categoria incorrecta';
                                        }
                                    }else{
                                        $result['exception'] = 'Seleccione una categoría';
                                    }
                                }else{
                                    $result['exception'] = $producto->getImageError();
                                }
                            }else{
                                $result['exception'] = 'Seleccione una imagen';
                            }
                        }else{
                            $result['exception'] = 'Descripcion incorrecta'; 
                        }
                    }else{
                        $result['exception'] = 'Precio incorrecto'; 
                    }
                }else{
                    $result['exception'] = 'Nombre incorrecto';
                }
            break; 
            case 'readOne':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->leerUnaProductos()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if($producto->setId($_POST['id_producto'])){
                    if($data = $producto->leerUnaProductos()){
                        if($producto->setNombre($_POST['nombre'])){
                            if($producto->setPrecio($_POST['precio'])){
                                if($producto->setDescripcion($_POST['descripcion'])){
                                    if($producto->setCategoria($_POST['categoriaProducto'])){
                                        if($producto->setEstado($_POST['estadoProducto'])){
                                    if(is_uploaded_file($_FILES['archivoProducto']['tmp_name'])){
                                        if($producto->setImagen($_FILES['archivoProducto'])){                                           
                                                    if($producto->actualizarProductos()){
                                                        $result['status'] = 1;
                                                        if($producto->deleteFile($producto->getRuta(), $data['imagen'])){
                                                            $result['message'] = 'Producto modificado correctamente';
                                                        }else{
                                                            $result['message'] = 'Producto modificado pero no se borro la imagen anteriro';
                                                        }
                                                     }else{
                                                        $result['exception'] = Database::getException();
                                                    }
                                                }else{
                                                    $result['exception'] = $producto->getImageError();
                                                }
                                            }else{
                                                if($producto->actualizarProductos()){
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Producto modificado correctamente';
                                                }else{
                                                    $result['exception'] = Database::getException();
                                                }
                                            }
                                        } else {
                                            $result['message'] = 'Estado puto';
                                        }
                                    }else{
                                        $result['message'] = 'Categoria zorra';
                                    }
                                }else{
                                    $result['exception'] = 'descripcion incorrecto';
                                }
                            }else{
                                $result['exception'] = 'precio incorrecto';
                            }
                        }else{
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Producto inexistente';
                    }
                }else{
                    $result['exception'] = 'Producto incorrecto';
                }  
            break;  
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->leerUnaProductos()) {
                        if ($producto->eliminarProductos()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $data['imagen'])) {
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
                //Manda los datos del modelo de producto a el controlador para verificar
                case 'grafica1':
                    //va a verificar en models
                    if($result['dataset'] = $producto->graficaProductos()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'No hay datos disponibles';
                    }
                break;
                //verifica los datos para devolverlos a el controlador
                case 'grafica2':
                    //verificar en models la funcion
                    if($result['dataset'] = $producto->graficaProductoBarato()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'No hay datos disponibles';
                    }
                break;
                //verifica los datos para devolverlos a el controlador
                case 'grafica3':
                    //verificar en models la funcion
                    if($result['dataset'] = $producto->graficaProductoAltocoste()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'No hay datos disponibles';
                    }
                break;
                default: 
                exit('Accion no disponible .-.');
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