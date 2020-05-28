const API = '../../core/api/admin/administradores.php?action=';

function checkUsuarios()
{
    $.ajax({
        dataType: 'json',
        url: API + 'readAll'
    })
    .done(function( response ) {
        // Se obtiene la ruta del documento en el servidor web.
        let current = window.location.pathname;
        
        if ( current == '/delight/views/admin/register.php' ) {
            // Si ya existe un usuario registrado se envía a iniciar sesión, de lo contrario se pide crear el primero.
            if ( response.status ) {
                window.location='login.php'; 
                
            } else {
                alert ("Debe crear un usuario para comenzar");
            }
        } else {
            // Si ya existe al menos un usuario registrado se pide iniciar sesión, de lo contrario se envía a crear el primero.
            if ( response.status ) {
                alert ("Debe autenticarse para ingresar");
            }
            else {
                alert ("Debe registrarse primero"); 
                window.location='register.php'; 
            }
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