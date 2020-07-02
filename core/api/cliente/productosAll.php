<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/productos.php');
require_once('../../models/categorias.php');    

if(isset($_GET['action'])){
    $productos = new productos;
    $categorias = new categorias;
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    switch ($_GET['action']){
        case'leerTodosProductosPorCat':
            if($productos->setCategoria($_POST['id_categoria'])){
                if($result['dataset'] = $productos->leerTodosProductosPorCat()){
                    $result['status'] = 1;
                }else{
                    $result['exception'] = 'Contenido no disponible';
                }
            }else{
                $result['exception'] = 'Categoría incorrecta';
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
        case'LeerCategorias':
            if($result['dataset']=$categorias->leerTodasCategorias()){
                $result['status'] = 1;
            }else{
                $result['exception'] = 'Contenido no disponible';
            }
        break;
        case 'Leeruno':
            if($productos->setId($_POST['id_producto'])){
                if($result['dataset'] = $productos->leerUnaProductos()){
                    $result['status'] = 1;
                }else{
                    $result['exception'] = 'Contenido no disponible';
                }
            }else{
                $result['exception'] = 'Producto incorrecto';
            }
        break;
        case 'search':
            $_POST = $productos->validateForm($_POST);
            if ($_POST['search'] != '') {
                if ($result['dataset'] = $productos->buscarProductos($_POST['search'])) {
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
        default:
            exit('Acción no disponible');
    }
    header('content-type: application/json; charset=utf-8');
    print(json_encode($result));
}else{
    exit('Recurso denegado');
}
?>