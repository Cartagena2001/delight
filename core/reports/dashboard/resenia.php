<?php
require('../../helpers/report.php');
require('../../models/resenia.php');


$pdf = new Report;

$pdf->startReport('Reseñas');


$resenia = new resenia;

if ($dataResenia = $resenia->leerTodosResenias()) {

    $pdf->SetFillColor(78,175,221);
    $pdf->SetFont('Times', 'B', 12);

    $pdf->Cell(46, 10, utf8_decode('Calificacion'), 1, 0, 'C', 1);
    $pdf->Cell(146, 10, utf8_decode('Comentario'), 1, 1, 'C', 1);

    foreach ($dataResenia as $rowResenia) {

        if ($resenia->setId($rowResenia['id_resenia'])) {

            if ($dataResenia = $resenia->leerTodosResenias()) {

                $pdf->SetFillColor(133,184,229);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->SetFont('Times', '', 11);

                $pdf->Cell(46, 10, utf8_decode($rowResenia['calificacion']), 1, 0);
                $pdf->Cell(146, 10, ($rowResenia['comentario']), 1, 1);
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos para esta reseñas'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en una reseñas'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay reseñas para mostrar'), 1, 1);
}

$pdf->Output();
?>
