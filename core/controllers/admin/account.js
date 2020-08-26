const API = '../../core/api/admin/administradores.php?action=';
const API_PRO = '../../core/api/admin/productos.php?action=';

$(document).ready(function(){
    graficaCategorias();
    graficaProductos();
    leerClientes();
});

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
                sweetAlert( 3, response.message, 'login.php' );
            } else {
                sweetAlert( 4, 'Debe crear un usuario para comenzar', null );
            }
        } else {
            // Si ya existe al menos un usuario registrado se pide iniciar sesión, de lo contrario se envía a crear el primero.
            if ( response.status ) {
                sweetAlert( 4, 'Debe autenticarse para ingresar', null );
            }
            else {
                sweetAlert( 3, response.exception, 'register.php' );
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








// Función para cerrar la sesión del usuario. Requiere el archivo sweetalert.min.js para funcionar.
function signOff()
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere cerrar la sesión?',
        icon: 'warning',
        buttons: [ 'Cancelar', 'Aceptar' ],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Aceptar para hacer la petición de cerrar sesión, de lo contrario se continua con la sesión actual.
        if ( value ) {
            $.ajax({
                dataType: 'json',
                url: API + 'logout'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    // sweetAlert( 1, response.message, 'login.php' );
                    window.location = "login.php";
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
        } else {
            sweetAlert( 4, 'Puede continuar con la sesión', null );
        }
    });
}


// Función para mostrar el formulario de editar perfil con los datos del usuario que ha iniciado sesión.
function openModalProfile()
{
    // Se abre la caja de dialogo (modal) con el formulario para editar perfil, ubicado en el archivo de las plantillas.
    $( '#profile-modal' ).modal( 'show' );
    $.ajax({
        dataType: 'json',
        url: API + 'readProfile'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del usuario que ha iniciado sesión.
            $( '#nombres_perfil' ).val( response.dataset.nombres_usuario );
            $( '#apellidos_perfil' ).val( response.dataset.apellidos_usuario );
            $( '#correo_perfil' ).val( response.dataset.correo_usuario );
            $( '#alias_perfil' ).val( response.dataset.alias_usuario );
            // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
            //M.updateTextFields();
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

function graficaCategorias()
{
    $.ajax({
        dataType: 'json',
        url: API_PRO + 'grafica1',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let categorias = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                categorias.push( row.nombre );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            barGraph( 'chart', categorias, cantidad, 'Cantidad de productos', 'Cantidad de productos por categoría' );
        } else {
            $( '#chart' ).remove();
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

function graficaProductos()
{
    $.ajax({
        dataType: 'json',
        url: API_PRO + 'grafica2',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let nombre = [];
            let precio = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                nombre.push( row.nombre_p );
                precio.push( row.precio );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            // barGraph( 'chartP', nombre, precio, 'Precio del producto', 'Productos mas baratos' );
            DoughnutGraph( 'chartP', precio, nombre, 'Productos mas baratos');
        } else {
            $( '#chartP' ).remove();
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



function leerClientes(Cantidad)
{
    $.ajax({
        dataType: 'json',
        url: API + 'leerCliente',
        type: 'post'
        
    })
    .done(function(response){
        $( '#Ncliente' ).val( response.dataset.Cantidad );
    })
}