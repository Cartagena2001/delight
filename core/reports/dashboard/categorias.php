<?php
require('../../helpers/report.php');
require('../../models/categorias.php');


$pdf = new Report;

$pdf->startReport('Categorias');


$categorias = new categorias;

if ($dataCategorias = $categorias->leerTodasCategorias()) {

    $pdf->SetFillColor(175);
    $pdf->SetFont('Times', 'B', 12);

    $pdf->Cell(46, 10, utf8_decode('Nombre la categoria'), 1, 0, 'C', 1);
    $pdf->Cell(146, 10, utf8_decode('Descripcion'), 1, 1, 'C', 1);

    foreach ($dataCategorias as $rowCategorias) {

        if ($categorias->setId($rowCategorias['id_categoria'])) {

            if ($dataCategorias = $categorias->leerTodasCategorias()) {

                $pdf->SetFillColor(225);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->SetFont('Times', '', 11);

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
