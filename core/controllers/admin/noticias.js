const API_NOTICIAS = '../../core/api/admin/noticias.php?action=';

$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_NOTICIAS );
    graficaNoticias();
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    dataset.forEach(function( row ) {
        content += `
            <tr>
                <td>${row.titulo}</td>
                <td>${row.descripcion}</td>
                <td><img src="../../resources/img/noticias/${row.imagen}" style="Width: 80px; Height:80px;"></td>
                <td>${row.fecha_pub}</td>
                <td>
                    <a href="#" onclick="openUpdateModal(${row.id_noticia})" class="btn btn-warning" data-toggle="modal"><i class="fas fa-edit"></i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_noticia})" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-noticias' ).html( content );
    // $( '.materialboxed' ).materialbox();
    // $( '.tooltipped' ).tooltip();
}


 // Evento para mostrar los resultados de una búsqueda.
 $( '#search-noticia' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_NOTICIAS, this );
});


// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    $( '#save-form' )[0].reset();
    $( '#noticiaModal' ).modal( 'show' );
    $( '#archivoNoticia' ).prop( 'required', true );
}

function openUpdateModal( id )
{
    $( '#save-form' )[0].reset();
    $( '#noticiaModal' ).modal( 'show' );
    $( '#archivoNoticia' ).prop( 'required', false );

    $.ajax({
        dataType: 'json',
        url: API_NOTICIAS + 'readOne',
        data: { id_noticia: id },
        type: 'post'
    })
    .done(function( response ) {
        if ( response.status ) {
            $( '#id_noticia' ).val( response.dataset.id_noticia );
            $( '#titulo' ).val( response.dataset.titulo );
            $( '#descripcion' ).val( response.dataset.descripcion );
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
    if ( $( '#id_noticia' ).val() ) {
        saveRow( API_NOTICIAS, 'update', this, 'noticiaModal' );
    } else {
        saveRow( API_NOTICIAS, 'create', this, 'noticiaModal' );
    }
});

function openDeleteDialog( id )
{
    let identifier = { id_noticia: id };
    confirmDelete( API_NOTICIAS, identifier );
}

function graficaNoticias()
{
    $.ajax({
        dataType: 'json',
        url: API_NOTICIAS + 'graficaNoticia',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let titulo = [];
            let fecha = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                titulo.push( row.titulo );
                fecha.push( row.fecha_pub );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            // barGraph( 'chartP', nombre, precio, 'Precio del producto', 'Productos mas baratos' );
            barGraph( 'charNoticias', fecha, titulo, 'Cantidad de noticias', 'Cantidad de noticias por mes');
        } else {
            $( '#charNoticias' ).remove();
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