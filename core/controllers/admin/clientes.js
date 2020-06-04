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
                <td><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter (${row.id_cliente})"><i class="fas fa-edit"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-clientes' ).html( content );
    // $( '.materialboxed' ).materialbox();
    // $( '.tooltipped' ).tooltip();
}

// Función que prepara formulario para insertar un registro.
// function openCreateModal()
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Crear categoría' );
//     $( '#archivo_categoria' ).prop( 'required', true );
// }

// Función que prepara formulario para modificar un registro.
// function openUpdateModal( id )
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Modificar categoría' );
//     $( '#archivo_categoria' ).prop( 'required', false );

//     $.ajax({
//         dataType: 'json',
//         url: API_CLIENTES + 'readOne',
//         data: { id_categoria: id },
//         type: 'post'
//     })
//     .done(function( response ) {
//         if ( response.status ) {
//             $( '#id_categoria' ).val( response.dataset.id_categoria );
//             $( '#nombre_categoria' ).val( response.dataset.nombre_categoria );
//             $( '#descripcion_categoria' ).val( response.dataset.descripcion_categoria );
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

// Evento para crear o modificar un registro.
// $( '#save-form' ).submit(function( event ) {
//     // Se evita recargar la página web después de enviar el formulario.
//     event.preventDefault();
//     // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
//     // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
//     if ( $( '#id_cliente' ).val() ) {
//         saveRow( API_CLIENTES, 'update', this, 'save-modal' );
//     } else {
//         saveRow( API_CLIENTES, 'create', this, 'save-modal' );
//     }
// });

// Función para establecer el registro a eliminar mediante el id recibido.
// function openDeleteDialog( id )
// {
//     // Se declara e inicializa un objeto con el id del registro que será borrado.
//     let identifier = { id_cliente: id };
//     // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
//     confirmDelete( API_CLIENTES, identifier );
// }