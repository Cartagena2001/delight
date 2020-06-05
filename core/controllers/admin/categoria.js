const API_CATEGORIAS = '../../core/api/admin/categoria.php?action=';

$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_CATEGORIAS );
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    dataset.forEach(function( row ) {
        content += `
            <tr>
                <td>${row.nombre}</td>
                <td>${row.descripcion}</td>
                <td>../../resources/img/categorias/${row.imagen}</td>
                <td>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregarmodal (${row.id_categoria})"><i class="fas fa-plus-square"></i></a>    
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#editarmodal (${row.id_categoria})"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#eliminarmodal (${row.id_categoria})"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#table-categorias' ).html( content );
    // $( '.materialboxed' ).materialbox();
    // $( '.tooltipped' ).tooltip();
}


// Función que prepara formulario para insertar un registro.
// function openCreateModal()
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Crear categoría' );
//     $( '#archivo_categoria' ).prop( 'required', true );
// }

// function openUpdateModal( id )
// {
//     $( '#save-form' )[0].reset();
//     $( '#save-modal' ).modal( 'open' );
//     $( '#modal-title' ).text( 'Modificar categoría' );
//     $( '#archivo_categoria' ).prop( 'required', false );

//     $.ajax({
//         dataType: 'json',
//         url: API_CATEGORIAS + 'readOne',
//         data: { id_categoria: id },
//         type: 'post'
//     })
//     .done(function( response ) {
//         if ( response.status ) {
//             $( '#id_categoria' ).val( response.dataset.id_categoria );
//             $( '#nombre_categoria' ).val( response.dataset.nombre_categoria );
//             $( '#descripcion_categoria' ).val( response.dataset.descripcion_categoria );
//             M.updateTextFields();
//         } else {
//             sweetAlert( 2, response.exception, null );
//         }
//     })
//     .fail(function( jqXHR ) {
//         if ( jqXHR.status == 200 ) {
//             console.log( jqXHR.responseText );
//         } else {
//             console.log( jqXHR.status + ' ' + jqXHR.statusText );
//         }
//     });
// }

// $( '#save-form' ).submit(function( event ) {
//     event.preventDefault();
//     if ( $( '#id_categoria' ).val() ) {
//         saveRow( API_CATEGORIAS, 'update', this, 'save-modal' );
//     } else {
//         saveRow( API_CATEGORIAS, 'create', this, 'save-modal' );
//     }
// });

// function openDeleteDialog( id )
// {
//     let identifier = { id_categoria: id };
//     confirmDelete( API_CATEGORIAS, identifier );
// }