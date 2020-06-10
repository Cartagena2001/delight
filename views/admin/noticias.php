<?php
require_once('../../core/helpers/templateAdmin.php');
$pagina = new page;
$pagina->headerTemplate('Principal');
?>

<div class="container">
    <div class="row">
        <div class="container col-lg-12">
            <h1 class="display-4">Noticias</h1>
        <br>
        <form method="post" id="search-noticia">
            <div class="input-field col s6 m6"> 
                <label for="search">Buscar por titulo</label>
                <input id="search" type="text" name="search"/>
                <button type="submit" class="btn btn-info ml-3" data-tooltip="Buscar">Buscar</button>
            </div>
        </form>
        </div>
        <div class="container">
            <div class="row">
                <button type="button" class="btn btn-success mt-3" onclick="openCreateModal()">Agregar noticias</button>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Titulo de la noticia</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Fecha publicado</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>
                    <tbody id="table-noticias">
                    </tbody>
                </table>
            </div>
        </div>

        <!-- modal agregar -->
        <div class="modal fade" id="noticiaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <form method="post" id="save-form" name="save-form" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Agregar noticia</h5>
                            <input class="invisible" type="text" id="id_noticia" name="id_noticia" />
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container text-center">
                                <form>
                                    <div class="form-group">
                                        <input id="titulo" name="titulo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo de la noticia">
                                    </div>
                                    <div class="form-group">
                                        <textarea id="descripcion" name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion de la noticia"></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input id="archivoNoticia" name="archivoNoticia" type="file" class="custom-file-input" >
                                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Buscar imagen</label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar noticia</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- modal editar -->
        <div class="modal fade" id="editarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Editar noticia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container text-center">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo de la noticia">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion de la noticia"></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Buscar imagen</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="inputGroupFileAddon02">Subir</span>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal eliminar -->
        <div class="modal fade" id="eliminarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar noticia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container text-center">
                            <div class="form-group">
                                <h5>¿Desea eliminar esta noticia de su lista?</h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
$pagina->footerTemplate('noticias.js');
?>