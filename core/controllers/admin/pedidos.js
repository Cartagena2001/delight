const API_PEDIDOS = '../../core/api/admin/pedidos.php?action=';
const API_CLIENTES = '../../core/api/admin/clientes.php?action=readAll';
const API_CUPONES = '../../core/api/admin/cupones.php?action=readAll';
const API_DETALLE_PEDIDO = '../../core/api/admin/detallepedidos.php?action=readAll';

$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_PEDIDOS );
});

function fillTable( dataset )
{
    let content = '';
    dataset.forEach(function( row ) {
        content += `
            <tr>
                <td>${row.id_cliente}</td>
                <td>${row.id_cupon}</td>
                <td>${row.costo_envio}</td>
                <td>${row.fecha_pedido}</td>
                <td>${row.fecha_entrega}</td>
                <td>
                        
                    <a href="#" class="btn btn-warning" data-toggle="modal" onclick="openUpdateModal (${row.id_pedido})"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" onclick="openDeleteDialog (${row.id_pedido})"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-pedidos' ).html( content );
    // $( '.materialboxed' ).materialbox();
    // $( '.tooltipped' ).tooltip();
}

// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    $( '#save-form' )[0].reset();
    $( '#pedidomodal' ).modal( 'show' );
    fillSelect( API_CLIENTES, 'id_cliente', null );
    fillSelect( API_CUPONES, 'id_cupon', null );
    fillSelect( API_DETALLE_PEDIDO, 'id_detalle_pedido', null );
}


function openUpdateModal( id )
{
    $( '#save-form' )[0].reset();
    $( '#pedidomodal' ).modal( 'show' );

    $.ajax({
        dataType: 'json',
        url: API_PEDIDOS + 'readOne',
        data: { id_pedido: id },
        type: 'post'
    })
    .done(function( response ) {
       
        if ( response.status ) {
            $( '#id_pedido' ).val( response.dataset.id_pedido );
            $( '#id_cliente' ).val( response.dataset.id_cliente );
            $( '#id_cupon' ).val( response.dataset.id_cupon );
            $( '#id_detalle_pedido' ).val( response.dataset.id_detalle_pedido );
            $( '#costo_envio' ).val( response.dataset.costo_envio );
            $( '#fecha_pedido' ).val( response.dataset.fecha_pedido );
            $( '#fecha_entrega' ).val( response.dataset.fecha_entrega ); 
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
    if ( $( '#id_pedido' ).val() ) {
        saveRow( API_PEDIDOS, 'update', this, 'pedidomodal' );
    } else {
        saveRow( API_PEDIDOS, 'create', this, 'pedidomodal' );
    }
});

function openDeleteDialog( id )
{
    let identifier = { id_cupon: id };
    confirmDelete( API_PEDIDOS, identifier );
}