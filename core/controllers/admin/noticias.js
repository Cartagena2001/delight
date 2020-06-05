const API_NOTICIAS = '../../core/api/admin/noticias.php?action=';

$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_NOTICIAS );
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    dataset.forEach(function( row ) {
        content += `
            <tr>
                <td>${row.titulo}</td>
                <td>${row.descripcion}</td>
                <td>../../resources/img/noticias/${row.imagen}</td>
                <td>${row.fecha_pub}</td>
                <td>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal (${row.id_noticias})"><i class="fas fa-plus-square"></i></a>    
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal (${row.id_noticias})"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal (${row.id_noticias})"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-noticias' ).html( content );
    // $( '.materialboxed' ).materialbox();
    // $( '.tooltipped' ).tooltip();
}


// Función que prepara formulario para insertar un registro.
// function openCreateModal()
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Crear noticia' );
//     $( '#archivo_noticia' ).prop( 'required', true );
// }

// function openUpdateModal( id )
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Modificar noticia' );
//     $( '#archivo_noticia' ).prop( 'required', false );

//     $.ajax({
//         dataType: 'json',
//         url: API_NOTICIAS + 'readOne',
//         data: { id_noticia: id },
//         type: 'post'
//     })
//     .done(function( response ) {
//         if ( response.status ) {
//             $( '#id_noticia' ).val( response.dataset.id_noticia );
//             $( '#titulo' ).val( response.dataset.titulo );
//             $( '#descripcion' ).val( response.dataset.descripcion );
//             $( '#imagen' ).val( response.dataset.imagen );
//             $( '#fecha_pub' ).val( response.dataset.fecha_pub );
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
//     if ( $( '#id_noticia' ).val() ) {
//         saveRow( API_NOTICIAS, 'update', this, 'save-modal' );
//     } else {
//         saveRow( API_NOTICIAS, 'create', this, 'save-modal' );
//     }
// });

// function openDeleteDialog( id )
// {
//     let identifier = { id_noticia: id };
//     confirmDelete( API_NOTICIAS, identifier );
// }