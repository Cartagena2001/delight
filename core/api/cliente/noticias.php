<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/noticias.php');

if(isset($_GET['action'])){
    $noticias = new noticias;
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    switch ($_GET['action']){
        case 'leerNoticias':
            if($result['dataset']=$noticias->leerTodasNoticias()){
                $result['status'] = 1;
            }else{
                $result['exception'] = 'Contenido no disponible';
            }
        break;
        default:
            exit('Acción no disponible');
    }
    header('content-type: application/json; charset=utf-8');
    print(json_encode($result));
}else{
    exit('Recurso denegado');
}

?>