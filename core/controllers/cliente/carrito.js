const API_PEDIDOS = '../../core/api/cliente/pedidos.php?action=';

$( document ).ready(function() {
    LeerCarrito();
});

function LeerCarrito(){
    $.ajax({
        dataType: 'json',
        url: API_PEDIDOS + 'LeerCarrito'
    })
    .done(function( response ) {
        if(response.status){
            // Se declara e inicializa una variable para concatenar las filas de la tabla en la vista.
            let content = '';
            // Se declara e inicializa una variable para calcular el importe por cada producto.
            let subtotal = 0;
            // Se declara e inicializa una variable para ir sumando cada subtotal y obtener el monto final a pagar.
            let total = 0;

            response.dataset.forEach(function (row){
                subtotal = row.precio * row.cantidad;
                total += subtotal;

                content +=`
                <tr>
                    <td>${row.nombre_p}</td>
                    <td>${row.precio}</td>
                    <td>${row.cantidad}</td>
                    <td>${subtotal.toFixed(2)}</td>
                    <td>
                        <a href="#" onclick="openUpdateDialog(${row.id_detalle_pedido}, ${row.cantidad})" class="btn btn-warning" data-tooltip="Cambiar"><i class="fas fa-edit"></i></a>
                        <a href="#" onclick="openDeleteDialog(${row.id_detalle_pedido})" class="btn btn-danger" data-tooltip="Remover"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                `;
            });
            $( '#tbodyCarrito' ).html( content );
            $( '#pago' ).text( total.toFixed(2) );
        }else{
            sweetAlert( 4, response.exception, 'bienvenido.php' );
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

function openUpdateDialog( id, quantity )
{
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    $( '#modalCantidad' ).modal( 'show' );
    // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
    $( '#id_detalle' ).val( id );
    $( '#cantidad_producto' ).val( quantity );
}

$( '#ActuCantidad' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_PEDIDOS + 'ActuCarrito',
        data: $( '#ActuCantidad' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se actualiza la tabla en la vista para mostrar la modificación de la cantidad de producto.
            LeerCarrito();
            // Se cierra la caja de dialogo (modal).
            $( '#modalCantidad' ).modal( 'hide' );
            
            sweetAlert( 1, response.message, null );
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
});

function openDeleteDialog( id )
{
    swal({
        title: 'Advertencia',
        text: '¿Está seguro de remover el producto?',
        icon: 'warning',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Sí para realizar la petición respectiva, de lo contrario no se hace nada.
        if ( value ) {
            $.ajax({
                type: 'post',
                url: API_PEDIDOS + 'eliminarCarrito',
                data: { id_detalle: id },
                dataType: 'json'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    // Se cargan nuevamente las filas en la tabla de la vista después de borrar un producto del pedido.
                    LeerCarrito();
                    sweetAlert( 1, response.message, null );
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
    });
}

function finishOrder()
{
    swal({
        title: 'Aviso',
        text: '¿Está seguro de finalizar el pedido?',
        icon: 'info',
        buttons: ['No', 'Sí'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Sí para realizar la petición respectiva, de lo contrario no se hace nada.
        if ( value ) {
            $.ajax({
                type: 'post',
                url: API_PEDIDOS + 'finalizarPago',
                dataType: 'json'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    sweetAlert( 1, response.message, 'bienvenido.php' );
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
    });
}