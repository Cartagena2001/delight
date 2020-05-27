const API_ADMINISTRADORES = '../../core/api/admin/administradores.php?action=';

$( document ).ready(function() {
    checkUsuarios();
});

// Evento para validar el usuario al momento de iniciar sesión.
$( '#login-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_ADMINISTRADORES + 'login',
        data: $( '#login-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // sweetAlert( 1, response.message, 'index.php' );
            alert("Credenciales aceptadas"); window.location='index.php'; 
            // window.location.href = "index.php"
                                
        } else {
            // sweetAlert( 2, response.exception, null );
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