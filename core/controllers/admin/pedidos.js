const API_PEDIDOS = '../../core/api/admin/pedidos.php?action=';

$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_PEDIDOS );
});

// Función para llenar la tabla con los datos enviados por readRows().
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
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal (${row.id_pedido})"><i class="fas fa-plus-square"></i></a>    
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal (${row.id_pedido})"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal (${row.id_pedido})"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-pedidos' ).html( content );
}



// function openCreateModal()
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Crear pedido' );
//     $( '#archivo_pedido' ).prop( 'required', true );
// }

// function openUpdateModal( id )
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Modificar pedido' );
//     $( '#archivo_pedido' ).prop( 'required', false );

//     $.ajax({
//         dataType: 'json',
//         url: API_PEDIDOS + 'readOne',
//         data: { id_pedido: id },
//         type: 'post'
//     })
//     .done(function( response ) {
        
//         if ( response.status ) {

//             $( '#id_pedido' ).val( response.dataset.id_pedido );
//             $( '#id_cliente' ).val( response.dataset.id_cliente );
//             $( '#id_cupon' ).val( response.dataset.id_cupon );
//             $( '#id_detalle_pedido' ).val( response.dataset.id_detalle_pedido );
//             $( '#costo_envio' ).val( response.dataset.costo_envio );
//             $( '#fecha_pedido' ).val( response.dataset.fecha_pedido );
//             $( '#fecha_entrega' ).val( response.dataset.fecha_entrega );

//             M.updateTextFields();
//         } else {
//             sweetAlert( 2, response.exception, null );
//         }
//     })
//     .fail(function( jqXHR ) {
       
//         if ( jqXHR.status == 200 ) {
//             console.log( jqXHR.responseText );
//         } else {
//             console.log( jqXHR.status + ' ' + jqXHR.statusText );
//         }
//     });
// }

// $( '#save-form' ).submit(function( event ) {
    
//     event.preventDefault();

//     if ( $( '#id_pedido' ).val() ) {
//         saveRow( API_PEDIDOS, 'update', this, 'save-modal' );
//     } else {
//         saveRow( API_PEDIDOS, 'create', this, 'save-modal' );
//     }
// });

// function openDeleteDialog( id )
// {
//     let identifier = { id_pedido: id };

//     confirmDelete( API_PEDIDOS, identifier );
// }