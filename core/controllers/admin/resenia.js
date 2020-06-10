const API_RESENIA = '../../core/api/admin/resenia.php?action=';

$(document).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_RESENIA );
});

function fillTable( dataset )
{
    let content = '';
    dataset.forEach(function( row ) {
        content += `
            <tr>
                <td>${row.calificacion}</td>
                <td>${row.comentario}</td>
                <td>${row.estado}</td>
                <td>${row.id_detalle_pedido}</td>
                <td><a href="#" onclick="openUpdateModal(${row.id_resenia})" class="btn btn-warning" data-toggle="modal"><i class="fas fa-edit"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-resenia' ).html( content );
}

$( '#search-resenia' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault(); 
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_RESENIA, this );
});

function openUpdateModal( id )
{
    $( '#actualizarResenia' ).modal( 'show' );

    $.ajax({
        dataType: 'json',
        url: API_RESENIA + 'readOne',
        data: { id_resenia: id },
        type: 'post'
    })
    .done(function( response ) {
        if ( response.status ) {
            $( '#id_resenia' ).val(response.dataset.id_resenia);
            $( '#estadoResenia' ).val(response.dataset.estado);
            
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
    if ( $( '#id_resenia' ).val() ) {
        saveRow( API_RESENIA, 'update', this, 'actualizarResenia' );
    } 
});