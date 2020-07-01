<?php

require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

if (isset($_GET['action']))  {
    session_start();
    $cliente = new clientes;
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