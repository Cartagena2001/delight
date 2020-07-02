const ACCOUNT = '../../core/api/cliente/clientes.php?action=';

$( document ).ready(function() {
    leerPerfil();
    leerPedidosPorcliente();
});

function leerPerfil()
{
    $.ajax({
        dataType: 'json',
        url: ACCOUNT + 'leerPerfil'
    })
    .done(function( response ){
        if(response.status){
            $( '#id_cliente' ).val( response.dataset.id_cliente );
            $( '#nombreUser' ).val( response.dataset.usuario );
            $( '#nombreCompleto' ).val( response.dataset.nombre );
            $( '#direccion' ).val( response.dataset.direccion );
            $( '#correo' ).val( response.dataset.correo );
            $( '#telefono' ).val( response.dataset.telefono );

            $( '#nombrePerfil' ).text( response.dataset.nombre );
            

        }else{
            ( '#cliente' ).html( '' );
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


$( '#editarPerfil' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: ACCOUNT + 'ActualizarPerfil',
        data: $( '#editarPerfil' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se cierra la caja de dialogo (modal) que contiene el formulario para editar perfil, ubicado en el archivo de las plantillas.
            sweetAlert( 1, response.message, 'cuenta.php' );
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

function leerPedidosPorcliente(){
    $.ajax({
        dataType: 'json',
        url: ACCOUNT + 'leerPedidos',
        
    })
    .done(function(response){
        if( response.status){
            
            let content = '';

            response.dataset.forEach(function( row ){

                content +=`
                    <div class="card mt-4 ml-4 ml-2 mb-2" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title" id="id_pedido">Pedido Numero: ${row.id_pedido}</h5>
                        <p class="card-text"><b>Propietario del envio: </b>${row.nombre}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Costo de envio: </b>${row.costo_envio}</li>
                        <li class="list-group-item"><b>Fecha del pedido Realizado:</b> ${row.fecha_pedido}</li>
                        <li class="list-group-item"><b>Fecha de entrega:</b> ${row.fecha_entrega}</li>
                        <li class="list-group-item"><b>Estado del pedido:</b> ${row.estadopedido}</li>
                        <button type="button" class="btn btn-secondary" onclick="leerDellateProducto(${row.id_pedido})">Ver detalles</button>
                        </ul>
                    </div>
                `;
            });
            $( '#pedidosCliente' ).html( content );
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

function leerDellateProducto( id ){

    $( '#verdetalle' ).modal( 'show' );
    $.ajax({
        dataType: 'json',
        url: ACCOUNT + 'leerDetallePedido',
        data: { id_pedido: id },
        type: 'post'
    })
    .done(function( response ) {
        if(response.status){

            let content = '';

            response.dataset.forEach(function (row){
                content +=`
                <tr>
                    <td>${row.nombre_p}</td>
                    <td>${row.precio}</td>
                    <td>${row.cantidad}</td>
                </tr>
                `;
            });
            $( '#tbodyDetalle' ).html( content );
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

