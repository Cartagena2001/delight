<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/administradores.php');

if(isset($_GET['action'])){

    session_start();
    $usuario = new administradores;
    $reselt = array('status' => 0, 'message' => null, 'exception' => null);

    if(isset($_SESSION['id_administrador'])){
        switch($_GET['action']){
            case 'logout':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
            case 'readProfile':
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $usuario->leerUnAdmin()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
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
                        $result['exception'] = 'Alias incorrecto';
                    }
                break;
        }
    }
}

?>