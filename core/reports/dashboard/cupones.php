<?php
require('../../helpers/report.php');
require('../../models/cupones.php');


$pdf = new Report;

$pdf->startReport('Cupones');


$cupones = new cupones;

if ($dataCupones = $cupones->leerTodasCupones()) {

    $pdf->SetFillColor(175);
    $pdf->SetFont('Times', 'B', 12);

    $pdf->Cell(46, 10, utf8_decode('Puntos del cupon'), 1, 0, 'C', 1);
    $pdf->Cell(146, 10, utf8_decode('opcion'), 1, 1, 'C', 1);

    foreach ($dataCupones as $rowCupones) {

        if ($cupones->setId($rowCupones['id_cupon'])) {

            if ($dataCupones = $cupones->leerTodasCupones()) {

                $pdf->SetFillColor(225);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->SetFont('Times', '', 11);

                $pdf->Cell(46, 10, utf8_decode($rowCupones['puntos']), 1, 0);
                $pdf->Cell(146, 10, ($rowCupones['opcion']), 1, 1);
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
