<?php
 require_once('../../helpers/database.php');
 require_once('../../helpers/validator.php');
 require_once('../../models/clientes.php');

    if (isset($_GET['action'])) {
        session_start();
    // nueva sesion
    $clientes = new clientes;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    if (isset($_SESSION['id_administrador'])) {

    switch ($_GET['action']) {
        case 'logout':
            if (session_destroy()) {
                $result['status'] = 1;
                $result['message'] = 'Sesión eliminada correctamente';
            } else {
                $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
            }
            break;
        case 'readAll':
            if ($result['dataset'] = $clientes->leerTodosClientes()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay clientes';
            }
            break;
            case 'search':
                $_POST = $clientes->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $clientes->buscarClientes($_POST['search'])) {
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
                $_POST = $clientes->validateForm($_POST);
                if ($clientes->setUsuario($_POST['usuario'])) { 
                     if($clientes-> setNombre($_POST['nombre'])){
                         if($clientes-> setDireccion($_POST['direccion'])){
                            if($clientes-> setCorreo ($_POST['correo'])){
                                if($clientes-> setTelefono ($_POST['telefono'])){
                                    if($clientes-> setClave ($_POST['clave'])){
                                        if($clientes-> setEstadoCliente (isset($_POST['estado']) ? 1 : 0)){
                                            if ($clientes->crearClientes()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'cliente registrado correctamente';
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
                        $result['exception'] = 'Estado incorrecto';
                     } 
                 }else{
                    $result['exception'] = 'Estado incorrecto';
                 }
                break;
                ////Manda los datos del modelo de producto a el controlador para verificar
                case 'graficaCliente':
                    if($result['dataset'] = $clientes->graficaClientes()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'No hay datos disponibles';
                    }
                break;
                case 'readOne':
                    if ($clientes->setId($_POST['id_cliente'])) {
                        if ($result['dataset'] = $clientes->leerUnCliente()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'cliente inexistente';
                        }
                    } else {
                        $result['exception'] = 'Categoría incorrecta';
                    }
                break;
                case 'update':
                    $_POST = $clientes->validateForm($_POST);
                    if($clientes->setId($_POST['id_cliente'])){
                        if($clientes->setEstadoCliente($_POST['comboEstadoCliente'])){
                            if($clientes->actualizarClientes()){
                                $result['status'] = 1;
                                $result['message'] = 'Cliente actualizado correctamente';
                            }else{
                                $result['exception'] = Database::getException();
                            }
                        }else{
                            $result['exception'] = 'Estado incorrecto';
                        }
                    }else{
                        $result['exception'] = 'Cliente incorrecto';
                    }
                break;
                    case 'delete':
                        if ($_POST['id_cliente'] != $_SESSION['id_cliente']) {
                            if ($clientes->setId($_POST['id_usuario'])) {
                                if ($clientes->leerUnCliente()) {
                                    if ($clientes->eliminarClientes()) {
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
                        break;
                    default:
                        exit('Acción no disponible log');
                }
                // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
            header('content-type: application/json; charset=utf-8');
 // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
         }else {
        exit('Acceso no disponible -.-');
        }
        } else {
        exit('Recurso denegado');
        }   


?>
