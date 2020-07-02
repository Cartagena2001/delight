<?php

require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');
require_once('../../models/pedidos.php');
require_once('../../models/detalle_pedido.php');

if (isset($_GET['action']))  {
    session_start();
    $cliente = new clientes;
    $pedidos = new pedidos;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    if (isset($_SESSION['id_cliente'])) {
        switch ($_GET['action']) {
            case 'logout':
                if(session_destroy()){
                    $result['status'] = 1;
                    $result['message'] = 'Sesion eliminada correctamente';
                } else{
                    $result['exception'] = 'Ocurrio un problema al cerrar la sesion';
                }
            break;
            case 'leerPerfil':
                if($cliente->setId($_SESSION['id_cliente'])){
                   if($result['dataset'] = $cliente->leerUnClientePerfil()){
                    $result['status'] = 1;
                   }else{
                    $result['exception'] = 'Usuario inexistente';
                   }     
                }else{
                    $result['exception'] = 'Usuario incorrecto';
                }
            break;
            case 'ActualizarPerfil':
                if($cliente->setId($_SESSION['id_cliente'])){
                    if($cliente->leerUnClientePerfil()){
                        $_POST = $cliente->validateForm($_POST);
                            if($cliente->setUsuario($_POST['nombreUser'])){
                                if($cliente->setNombre($_POST['nombreCompleto'])){
                                    if($cliente->setDireccion($_POST['direccion'])){
                                        if($cliente->setCorreo($_POST['correo'])){
                                            if($cliente->setTelefono($_POST['telefono'])){
                                                if($cliente->editarPerfil()){
                                                    $_SESSION['usuario'] = $cliente->getUsuario();
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Perfil modificado correctamente';
                                                }else{
                                                    $result['exception'] = Database::getException();
                                                }
                                            }else{
                                                $result['exception'] = 'Telefono incorrecto'; 
                                            }
                                        }else{
                                            $result['exception'] = 'Correo incorrecto'; 
                                        }
                                    }else{
                                        $result['exception'] = 'Direccion incorrecto'; 
                                    }
                                }else{
                                    $result['exception'] = 'Nombre incorrecto'; 
                                }
                            }else{
                                $result['exception'] = 'Usuario incorrecto';    
                            }
                    }else{
                        $result['exception'] = 'Cliente inexistente';
                    }
                }else{
                    $result['exception'] = 'Cliente incorrecto';
                }
            break;
            case 'leerPedidos':
                if($pedidos->setId_cliente($_SESSION['id_cliente'])){
                    if($result['dataset'] = $pedidos->leerPedidoPorClint()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'Contenido no disponible';
                    }
                }else{  
                    $result['exception'] = 'Cliente Incorrecto';
                }
            break;
            case 'leerDetallePedido':
                if($pedidos->setId($_POST['id_pedido'])){
                    if($result['dataset'] = $pedidos->leerDetallePedido()){
                        $result['status'] = 1;
                    }else{
                        $result['exception'] = 'Contenido no disponible';
                    }
                }else{  
                    $result['exception'] = 'Detalle Incorrecto';
                }
            break;
            default:
            exit('Acción no disponible log');
       }
    } else {
    // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
    switch ($_GET['action']) {
        
        case 'readAll':
            if ($cliente->leerTodosClientes()) {
                $result['status'] = 1;
                $result['message'] = 'Existe al menos un usuario registrado';
            } else {
                $result['exception'] = 'No existen usuarios registrados';
            }
            break;
        case 'registrarse':
            $_POST = $cliente->validateForm($_POST);
            if($cliente -> setUsuario($_POST['usuario'])){
                if($cliente -> setNombre($_POST['nombre'])){
                    if($cliente -> setDireccion($_POST['direccion'])){
                        if($cliente ->setCorreo($_POST['correo'])){
                          if($cliente -> setTelefono($_POST['telefono'])){
                            if($_POST['clave1'] == $_POST['clave2']){
                                if($cliente -> setClave($_POST['clave1'])){
                                    if($cliente->crearClientes()){
                                        $result['status'] =1;
                                        $result['message'] = 'Se registro corecctamente';
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
                    $result['exception'] = 'Direccion incorrecto'; 
                }
            }else{
                $result['exception'] = 'Nombre incorrecto';
            }
        }else{
            $result['exception']= 'usuario incorrecto';
        }

        break;
        case 'InicioSesion':
            $_POST = $cliente->validateForm($_POST);
                if ($cliente->checkCliente($_POST['usuario'])) {
                    if ($cliente->checkPass($_POST['clave'])) {
                        $_SESSION['id_cliente'] = $cliente->getId();
                        $_SESSION['usuario'] = $cliente->getUsuario();
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