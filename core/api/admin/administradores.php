<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/administradores.php');

if (isset($_GET['action'])) {
    session_start();
    $usuario = new administradores;
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
            case 'readProfile':
                if ($usuario->setId($_SESSION['id_administrador'])) {
                    if ($result['dataset'] = $usuario->leerUnAdmin()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'editProfile':
                if ($usuario->setId($_SESSION['id_administrador'])) {
                    if ($usuario->leerUnAdmin()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->getNombre($_POST['nombres_perfil'])) {
                                if ($usuario->setCorreo($_POST['correo_perfil'])) {
                                    if ($usuario->setUsuario($_POST['alias_perfil'])) {
                                        if ($usuario->editProfile()) {
                                            $_SESSION['usuario'] = $usuario->getUsuario();
                                            $result['status'] = 1;
                                            $result['message'] = 'Perfil modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'password':
                if ($usuario->setId($_SESSION['id_administrador'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkClave($_POST['clave_actual_1'])) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->cambiarClave()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Contraseña cambiada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'readAll':
                if ($result['dataset'] = $usuario->leerTodosLosAdmin()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->buscarClientes($_POST['search'])) {
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
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['nombre'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setUsuario($_POST['usuario'])) {
                                if ($_POST['clave'] == $_POST['confirmar_clave']) {
                                    if ($usuario->setClave($_POST['clave'])) {
                                        if ($usuario->crearAdmin()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Usuario creado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Alias incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'readOne':
                if ($usuario->setId($_POST['id_administrador'])) {
                    if ($result['dataset'] = $usuario->leerUnAdmin()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_administrador'])) {
                    if ($usuario->leerUnAdmin()) {
                        if ($usuario->setNombre($_POST['nombre'])) {
                                if ($usuario->setCorreo($_POST['correo'])) {
                                    if ($usuario->actualizarAdmin()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Usuario modificado correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'delete':
                if ($_POST['id_administrador'] != $_SESSION['id_administrador']) {
                    if ($usuario->setId($_POST['id_administrador'])) {
                        if ($usuario->leerUnAdmin()) {
                            if ($usuario->eliminarAdmin()) {
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
    } else {
        // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($usuario->leerTodosLosAdmin()) {
                    $result['status'] = 1;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['exception'] = 'No existen usuarios registrados';
                }
                break;
            case 'register':
                $_POST = $usuario->validateForm($_POST);
                if($usuario -> setUsuario($_POST['usuario'])){
                    if($usuario -> setNombre($_POST['nombre'])){
                        if($usuario -> setCorreo($_POST['correo'])){
                            if($usuario ->setTelefono($_POST['telefono'])){
                                if($_POST['clave1'] == $_POST['clave2']){
                                    if($usuario -> setClave($_POST['clave1'])){
                                        if($usuario->crearAdmin()){
                                            $result['status'] =1;
                                            $result['message'] = 'Usuario registrado correctamente';
                                        }else{
                                            $result['exception'] = Database::getException();
                                        }
                                    }else{
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                }else{
                                    $result['exception'] = 'clave diferentes'; 
                                }    
                            }else{
                                $result['exception'] = 'telefono incorrecto';
                            }
                        }else{
                            $result['exception'] = 'correo incorrecto'; 
                        }
                    }else{
                        $result['exception'] = 'nombre incorrecto'; 
                    }
                }else{
                    $result['exception'] = 'Usuario incorrecto';
                }
            break;
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                    if ($usuario->checkUsuario($_POST['username'])) {
                        if ($usuario->checkClave($_POST['password'])) {
                            $_SESSION['id_administrador'] = $usuario->getId();
                            $_SESSION['usuario'] = $usuario->getUsuario();
                            $result['status'] = 1;
                            $result['message'] = 'Autenticación correcta';
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                break;
            default:
                exit('Acción no disponible .-.');
        }
    }
    header('content-type: application/json; charset=utf-8');
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}

?>