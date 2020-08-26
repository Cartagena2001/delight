<?php
require_once('../../core/helpers/templateAdmin.php');
$pagina = new page;
$pagina->headerTemplate('Principal');
?>

<div class="container">
    <div class="mb-4">
        <h1 class="display-4 col-lg-12">Inicio</h1>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 540px;" id="cards1">
                <div class="row no-gutters">

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user"></i> <p id="Ncliente"></p></h5>
                            <p class="card-text">Usuarios registrados en nuestra pagina web</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 540px;" id="cards2">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-truck"></i> 2,020</h5>
                            <p class="card-text">Entregas realizadas al rededor de todo el pais</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="display-4 col-lg-12">Analiticas</h1>
        
            <div class="col-lg-6">
                <canvas id="chart"></canvas>
            </div>

            <div class="col-lg-6">
                <canvas id="chartP"></canvas>
            </div>


        <div class="col-lg-6">
            <h4 id="Equipo">Equipo</h4>
            <p>• Gabriela Sofia Ramirez Martinez</p>
            <p>• Keveen Josue Reyes Meriano</p>
        </div>
    </div>
</div>

<?php
Page::footerTemplate('account.js');
?>