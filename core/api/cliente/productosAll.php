<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/productos.php');

if(isset($_GET['action'])){
    $productos = new productos;
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    switch ($_GET['action']){
        case'LeerTodosProductos':
            if($result['dataset'] = $productos->leerTodosProductos()){
                $result['status'] = 1;
            }else{
                $result['exception'] = 'Contenido no disponible';
            }
        break;
        case'detalleProducto':
            if($productos->setId($_POST['id_producto'])){
                if($result['dataset']=$productos->leerUnaProductos()){
                    $result['status'] = 1;
                }else{
                    $result['exception'] = 'Contenido no disponible';
                }
            }else{
                $result['exception'] = 'Producto incorrecto';
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