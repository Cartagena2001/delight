const API_CUPONES = '../../core/api/admin/cupones.php?action=';

$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_CUPONES );
});

function fillTable( dataset )
{
    let content = '';
    dataset.forEach(function( row ) {
        content += `
            <tr>
                <td>${row.puntos}</td>
                <td>${row.opcion}</td>
                <td>
                <a href="#" class="btn btn-warning" data-toggle="modal" onclick="openUpdateModal (${row.id_cupon})"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-danger" data-toggle="modal" onclick="openDeleteDialog (${row.id_cupon}) "><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-cupones' ).html( content );
    // $( '.materialboxed' ).materialbox();
    // $( '.tooltipped' ).tooltip();
}

// Función que prepara formulario para insertar un registro.
function openCreateModal()
{
    $( '#save-form' )[0].reset();
    $( '#cuponesmodal' ).modal( 'show' );
}


function openUpdateModal( id )
{
    $( '#save-form' )[0].reset();
    $( '#cuponesmodal' ).modal( 'show' ); 

    $.ajax({
        dataType: 'json',
        url: API_CUPONES + 'readOne',
        data: { id_cupon: id },
        type: 'post'
    })
    .done(function( response ) {

        if ( response.status ) { 
            $('#id_cupon').val(response.dataset.id_cupon); 
            $('#puntos').val(response.dataset.puntos);
            $('#opcion').val(response.dataset.opcion); 
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
    if ( $( '#id_cupon' ).val() ) {
        saveRow( API_CUPONES, 'update', this, 'cuponesmodal' );
    } else {
        saveRow( API_CUPONES, 'create', this, 'cuponesmodal' );
    }
});

function openDeleteDialog( id )
{
    let identifier = { id_cupon: id };
    confirmDelete( API_CUPONES, identifier );
}