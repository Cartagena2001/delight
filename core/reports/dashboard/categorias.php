<?php
require('../../helpers/report.php');
require('../../models/categorias.php');

//clase para crear reporte
$pdf = new Report;
//encabezado
$pdf->startReport('Categorias');

//Obtiene los datos del modelo
$categorias = new categorias;
//verifica los registros
if ($dataCategorias = $categorias->leerTodasCategorias()) {
    //se establece el color de fondo para los encabezados
    $pdf->SetFillColor(78,175,221);
    //fuente
    $pdf->SetFont('Times', 'B', 12);
    //celdas
    $pdf->Cell(46, 10, utf8_decode('Nombre la categoria'), 1, 0, 'C', 1);
    $pdf->Cell(146, 10, utf8_decode('Descripcion'), 1, 1, 'C', 1);
    //recoren los datos
    foreach ($dataCategorias as $rowCategorias) {

        if ($categorias->setId($rowCategorias['id_categoria'])) {

            if ($dataCategorias = $categorias->leerTodasCategorias()) {
                //color de fondo
                $pdf->SetFillColor(133,184,229);
                //fuentes
                $pdf->SetFont('Times', 'B', 11);
                $pdf->SetFont('Times', '', 11);
                //celdas
                $pdf->Cell(46, 10, utf8_decode($rowCategorias['nombre']), 1, 0);
                $pdf->Cell(146, 10, ($rowCategorias['descripcion']), 1, 1);
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos para esta categoría'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en una categoría'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay categorías para mostrar'), 1, 1);
}

$pdf->Output();
?>
