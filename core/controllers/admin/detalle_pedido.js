const API_DETALLE_PEDIDO= '../../core/api/admin/detallepedidos.php?action=';
const API_PRODUCTOS = '../../core/api/admin/productos.php?action=readAll';

$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_DETALLE_PEDIDO );
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
                <td>${row.cantidad}</td>
                <td>
                    <a href="#" class="btn btn-warning" data-toggle="modal" onclick="openUpdateModal (${row.id_detalle_pedido})"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" onclick="openDeleteDialog (${row.id_detalle_pedido})"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-detallepedidos' ).html( content );
}
 // Evento para mostrar los resultados de una búsqueda.
 $( '#search-detalle' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_DETALLE_PEDIDO, this );
});


// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    $( '#save-form' )[0].reset();
    $( '#detallepedidomodal' ).modal( 'show' );
    fillSelect( API_PRODUCTOS, 'id_producto', null );
}

function openUpdateModal( id )
{  
    $( '#save-form' )[0].reset();
    $( '#detallepedidomodal' ).modal( 'show' );
    fillSelect( API_PRODUCTOS, 'id_producto', null ); 
    $.ajax({
        dataType: 'json',
        url: API_DETALLE_PEDIDO + 'readOne',
        data: { id_detalle_pedido: id },
        type: 'post'
    })
    .done(function( response ) {

        if ( response.status ) {
            $( '#id_detalle_pedido' ).val( response.dataset.id_detalle_pedido);
            fillSelect( API_PRODUCTOS, 'id_producto', response.dataset.id_producto );
            $( '#precio_compra' ).val( response.dataset.precio );
            $( '#cantidad' ).val( response.dataset.cantidad );
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
    if ( $( '#id_detalle_pedido' ).val() ) {
        saveRow( API_DETALLE_PEDIDO, 'update', this, 'detallepedidomodal' );
    } else {
        saveRow( API_DETALLE_PEDIDO, 'create', this, 'detallepedidomodal' );
    }
});

function openDeleteDialog( id )
{
    let identifier = { id_detalle_pedido: id };
    confirmDelete( API_DETALLE_PEDIDO, identifier );
}