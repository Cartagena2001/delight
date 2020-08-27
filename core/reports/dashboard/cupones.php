<?php
require('../../helpers/report.php');
require('../../models/cupones.php');

//clase para crear reporte
$pdf = new Report;

//encabezado
$pdf->startReport('Cupones');

//Obtiene los datos del modelo
$cupones = new cupones;

//verifica los registros
if ($dataCupones = $cupones->leerTodasCupones()) {
    //se establece el color de fondo para los encabezados 
    $pdf->SetFillColor(78,175,221);
    //fuente
    $pdf->SetFont('Times', 'B', 12);
    //celdas
    $pdf->Cell(46, 10, utf8_decode('Puntos del cupon'), 1, 0, 'C', 1);
    $pdf->Cell(146, 10, utf8_decode('opcion'), 1, 1, 'C', 1);

    foreach ($dataCupones as $rowCupones) {

        if ($cupones->setId($rowCupones['id_cupon'])) {

            if ($dataCupones = $cupones->leerTodasCupones()) {
                //color
                $pdf->SetFillColor(133,184,229);
                //fuente
                $pdf->SetFont('Times', 'B', 11);
                $pdf->SetFont('Times', '', 11);
                //celdas
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
