<?php
require('../../helpers/report.php');
require('../../models/noticias.php');


$pdf = new Report;

$pdf->startReport('Noticias');


$noticias = new noticias;

if ($dataNoticias = $noticias->leerTodasNoticias()) {

    $pdf->SetFillColor(175);
    $pdf->SetFont('Times', 'B', 12);

    $pdf->Cell(46, 10, utf8_decode('Titulo'), 1, 0, 'C', 1);
    $pdf->Cell(100, 10, utf8_decode('Descripcion'), 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode('Fecha de publicacion'), 1, 1, 'C', 1);

    foreach ($dataNoticias as $rowNoticias) {

        if ($noticias->setId($rowNoticias['id_noticia'])) {

            if ($dataNoticias = $noticias->leerTodasNoticias()) {

                $pdf->SetFillColor(225);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->SetFont('Times', '', 11);

                $pdf->Cell(46, 10, utf8_decode($rowNoticias['titulo']), 1, 0);
                $pdf->Cell(100, 10, ($rowNoticias['descripcion']), 1, 0);
                $pdf->Cell(40, 10, ($rowNoticias['fecha_pub']), 1, 1);
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
