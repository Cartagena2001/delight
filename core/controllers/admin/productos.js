const API_PRODUCTOS = '../../core/api/admin/productos.php?action=';
const API_CATEGORIAS = '../../core/api/admin/categoria.php?action=readAll';

$( document ).ready(function() {
    graficaProductosAltoCoste();
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_PRODUCTOS );
    
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    dataset.forEach(function( row ) {
        content += `
            <tr>
                <td>${row.nombre_p}</td>
                <td>${row.precio}</td>
                <td>${row.descripcion}</td>                
                <td><img src="../../resources/img/categorias/${row.imagen}" style="Width: 80px; Height:80px;" ></td>
                <td>${row.nombre}</td>
                <td>${row.estado}</td>
                <td>  
                <a href="#" onclick="openUpdateModal(${row.id_producto})" class="btn btn-warning" data-toggle="modal""><i class="fas fa-edit"></i></a>
                <a href="#" onclick="openDeleteDialog(${row.id_producto})"  class="btn btn-danger" data-toggle="modal" "><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-productos' ).html( content );
}


 // Evento para mostrar los resultados de una búsqueda.
 $( '#search-productos' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_PRODUCTOS, this );
});

// Función que prepara formulario para insertar un registro.
function openCreateModal()
{

    $( '#save-form' )[0].reset();
    $( '#productoModal' ).modal( 'show' );
    $( '#archivoProducto' ).prop( 'required', true );
    fillSelect( API_CATEGORIAS, 'categoriaProducto', null );
}

function openUpdateModal( id )
{

    $( '#save-form' )[0].reset();

    $( '#productoModal' ).modal( 'show' );
    $( '#archivo_productos' ).prop( 'required', false );

    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'readOne',
        data: { id_producto: id },
        type: 'post'
    })
    .done(function( response ) {
    
        if ( response.status ) {
            
            $( '#id_producto' ).val( response.dataset.id_producto );
            $( '#nombre' ).val( response.dataset.nombre_p );
            $( '#precio' ).val( response.dataset.precio );
            $( '#descripcion' ).val( response.dataset.descripcion );
            fillSelect( API_CATEGORIAS, 'categoriaProducto', response.dataset.id_categoria );
            $( '#estadoProducto' ).val( response.dataset.estado );
            
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {

        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

$( '#save-form' ).submit(function( event ) {
    event.preventDefault();

    if ( $( '#id_producto' ).val() ) {
        saveRow( API_PRODUCTOS, 'update', this, 'productoModal' );
    } else {
        saveRow( API_PRODUCTOS, 'create', this, 'productoModal' );
    }
});

function openDeleteDialog( id )
{
    let identifier = { id_producto: id };
    confirmDelete( API_PRODUCTOS, identifier );
}
//Funcion que mostrara los productos con mayor precio//
function graficaProductosAltoCoste()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'grafica3',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let nombre_p = [];
            let precio = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                nombre_p.push( row.nombre_p );
                precio.push( row.precio );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            barGraph( 'chartALTOS', nombre_p, precio, 'El precio de productos', 'Productos con mayor precio' );
        } else {
            $( '#chartALTOS' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}
