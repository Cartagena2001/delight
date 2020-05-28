const API_ADMINISTRADORES = '../../core/api/admin/administradores.php?action=';

$( document ).ready(function() {
    checkUsuarios();
});

// Evento para validar el usuario al momento de iniciar sesión.
$( '#register-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_ADMINISTRADORES + 'register',
        data: $( '#register-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // sweetAlert( 1, response.message, 'index.php' );
            alert("Credenciales aceptadas"); window.location='login.php'; 
            // window.location.href = "index.php"
                                
        } else {
            alert("Error"); 
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