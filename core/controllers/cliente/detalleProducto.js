const API_DETALLEPRO = '../../core/api/cliente/productosAll.php?action=';

$( document ).ready(function() {

    let params = new URLSearchParams( location.search );

    const ID = params.get( 'id' );

    leerDetalle( ID );
});

function leerDetalle(id)
{
    $.ajax({
        dataType: 'json',
        url: API_DETALLEPRO + 'detalleProducto',
        data: { id_producto: id },
        type: 'post'
    })
    .done(function( response ){
        if(response.status){
            $( '#id_producto' ).val( response.dataset.id_producto );
            $( '#nombreProducto' ).text( response.dataset.nombre_p );
            $( '#precio' ).text( response.dataset.precio );
            $( '#descripcion' ).text( response.dataset.descripcion );
            $( '#imagen' ).prop( 'src', '../../resources/img/categorias/' + response.dataset.imagen );

        }else{
            ( '#detalle' ).html( '' );
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