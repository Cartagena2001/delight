const API_CLIENTES = '../../core/api/admin/clientes.php?action=';

$(document).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_CLIENTES );
});

function fillTable( dataset )
{
    let content = '';
    dataset.forEach(function( row ) {
        content += `
            <tr>
                <td>${row.usuario}</td>
                <td>${row.nombre}</td>
                <td>${row.correo}</td>
                <td>${row.telefono}</td>
                <td>${row.estado_cliente}</td>
                <td><a href="#" onclick="openUpdateModal(${row.id_cliente})" class="btn btn-warning" data-toggle="modal"><i class="fas fa-edit"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-clientes' ).html( content );
}

 // Evento para mostrar los resultados de una búsqueda.
 $( '#search-clientes' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault(); 
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_CLIENTES, this );
});

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    $( '#actualizarClientes' ).modal( 'show' );

    $.ajax({
        dataType: 'json',
        url: API_CLIENTES + 'readOne',
        data: { id_cliente: id },
        type: 'post'
    })
    .done(function( response ) {
        if ( response.status ) {
            $( '#id_cliente' ).val(response.dataset.id_cliente);
            $( '#comboEstadoCliente' ).val(response.dataset.estado_cliente);
            
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
    if ( $( '#id_cliente' ).val() ) {
        saveRow( API_CLIENTES, 'update', this, 'actualizarClientes' );
    } 
});

