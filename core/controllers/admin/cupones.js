const API_CUPONES = '../../core/api/admin/cupones.php?action=';

$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_CUPONES );
});

function fillTable( dataset )
{
    let content = '';
    dataset.forEach(function( row ) {
        content += `
            <tr>
                <td>${row.puntos}</td>
                <td>${row.opcion}</td>
                <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal (${row.id_cupon})"><i class="fas fa-plus-square"></i></a>    
                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal (${row.id_cupon})"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal (${row.id_cupon}) "><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-cupones' ).html( content );
    // $( '.materialboxed' ).materialbox();
    // $( '.tooltipped' ).tooltip();
}

// Función que prepara formulario para insertar un registro.
// function openCreateModal()
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Crear cupon' );
//     $( '#archivo_cupon' ).prop( 'required', true );
// }

// function openUpdateModal( id )
// {

//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Modificar categoría' );
//     $( '#archivo_categoria' ).prop( 'required', false );

//     $.ajax({
//         dataType: 'json',
//         url: API_CUPONES + 'readOne',
//         data: { id_categoria: id },
//         type: 'post'
//     })
//     .done(function( response ) {
//         if ( response.status ) {
//             $( '#id_cupon' ).val( response.dataset.id_cupon );
//             $( '#puntos' ).val( response.dataset.puntos );
//             $( '#opcion' ).val( response.dataset.opcion );
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
//     if ( $( '#id_cupon' ).val() ) {
//         saveRow( API_CUPONES, 'update', this, 'save-modal' );
//     } else {
//         saveRow( API_CUPONES, 'create', this, 'save-modal' );
//     }
// });

// function openDeleteDialog( id )
// {
//     let identifier = { id_cupon: id };
//     confirmDelete( API_CUPONES, identifier );
// }