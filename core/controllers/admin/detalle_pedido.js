const API_DETALLE_PEDIDO= '../../core/api/admin/detallepedidos.php?action=';

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
                <td>${row.id_producto}</td>
                <td>${row.precio}</td>
                <td>${row.cantidad}</td>
                <td>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal (${row.id_detalle_pedido})"><i class="fas fa-plus-square"></i></a>    
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal (${row.id_detalle_pedido})"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal (${row.id_detalle_pedido})"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-detallepedidos' ).html( content );
}


// Función que prepara formulario para insertar un registro.
// function openCreateModal()
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Crear detalle pedido' );
//     $( '#archivo_detale_pedido' ).prop( 'required', true );
// }

// function openUpdateModal( id )
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Modificar detalle pedido' );
//     $( '#archivo_categoria' ).prop( 'required', false );

//     $.ajax({
//         dataType: 'json',
//         url: API_DETALLE_PEDIDO + 'readOne',
//         data: { id_detalle_pedido: id },
//         type: 'post'
//     })
//     .done(function( response ) {

//         if ( response.status ) {
//             $( '#id_detalle_pedido' ).val( response.dataset.id_detalle_pedido);
//             $( '#id_producto' ).val( response.dataset.id_producto );
//             $( '#precio' ).val( response.dataset.Precio );
//             $( '#cantidad' ).val( response.dataset.cantidad );
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
//     if ( $( '#id_detalle_pedido' ).val() ) {
//         saveRow( API_DETALLE_PEDIDO, 'update', this, 'save-modal' );
//     } else {
//         saveRow( API_DETALLE_PEDIDO, 'create', this, 'save-modal' );
//     }
// });

// function openDeleteDialog( id )
// {
//     let identifier = { id_detalle_pedido: id };
//     confirmDelete( API_DETALLE_PEDIDO, identifier );
// }