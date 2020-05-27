const API_DETALLE_PEDIDO= '../../api/admin/detalle_pedido.php?action=';

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
                <td>${row.Precio}</td>
                <td>${row.cantidad}</td>
                <td>../../resources/img/detalle_pedido/${row.imagen}</td>
                <td>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal (${row.id_detalle_pedido})"><i class="fas fa-plus-square"></i></a>    
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal (${row.id_detalle_pedido})"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal (${row.id_detalle_pedido})"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
    $( '.materialboxed' ).materialbox();
    $( '.tooltipped' ).tooltip();
}


// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Crear detalle pedido' );
    // Se establece el campo de tipo archivo como obligatorio.
    $( '#archivo_detale_pedido' ).prop( 'required', true );
}

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#save-form' )[0].reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#save-modal' ).modal( 'open' );
    // Se asigna el título para la caja de dialogo (modal).
    $( '#modal-title' ).text( 'Modificar detalle pedido' );
    // Se establece el campo de tipo archivo como opcional.
    $( '#archivo_categoria' ).prop( 'required', false );

    $.ajax({
        dataType: 'json',
        url: API_DETALLE_PEDIDO + 'readOne',
        data: { id_detalle_pedido: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_detalle_pedido' ).val( response.dataset.id_categoria );
            $( '#id_producto' ).val( response.dataset.id_producto );
            $( '#precio' ).val( response.dataset.Precio );
            $( '#cantidad' ).val( response.dataset.cantidad );
            // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
            M.updateTextFields();
        } else {
            sweetAlert( 2, response.exception, null );
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

// Evento para crear o modificar un registro.
$( '#save-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_detalle_pedido' ).val() ) {
        saveRow( API_DETALLE_PEDIDO, 'update', this, 'save-modal' );
    } else {
        saveRow( API_DETALLE_PEDIDO, 'create', this, 'save-modal' );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_detalle_pedido: id };
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete( API_DETALLE_PEDIDO, identifier );
}