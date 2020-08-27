<?php
require('../../helpers/report.php');
require('../../models/noticias.php');

//clase para crear reporte
$pdf = new Report;
//encabezado
$pdf->startReport('Noticias');

//Obtiene los datos del modelo
$noticias = new noticias;
//verifica los registros
if ($dataNoticias = $noticias->leerTodasNoticias()) {
    //se establece el color de fondo para los encabezados
    $pdf->SetFillColor(78,175,221);
    //fuente
    $pdf->SetFont('Times', 'B', 12);
    //celdas
    $pdf->Cell(46, 10, utf8_decode('Titulo'), 1, 0, 'C', 1);
    $pdf->Cell(100, 10, utf8_decode('Descripcion'), 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode('Fecha de publicacion'), 1, 1, 'C', 1);
    //recoren los datos
    foreach ($dataNoticias as $rowNoticias) {

        if ($noticias->setId($rowNoticias['id_noticia'])) {

            if ($dataNoticias = $noticias->leerTodasNoticias()) {
                //color de fondo en el encabezado
                $pdf->SetFillColor(133,184,229);
                //fuente de las palabras
                $pdf->SetFont('Times', 'B', 11);
                $pdf->SetFont('Times', '', 11);
                //celdas que se veran
                $pdf->Cell(46, 10, utf8_decode($rowNoticias['titulo']), 1, 0);
                $pdf->Cell(100, 10, utf8_decode($rowNoticias['descripcion']), 1, 0);
                $pdf->Cell(40, 10, utf8_decode($rowNoticias['fecha_pub']), 1, 1);
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
