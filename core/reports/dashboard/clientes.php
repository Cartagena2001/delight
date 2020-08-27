<?php
require('../../helpers/report.php');
require('../../models/clientes.php');

//clase para crear reporte
$pdf = new Report;

//encabezado
$pdf->startReport('Clientes');

//Obtiene los datos del modelo
$clientes = new clientes;

//verifica los registros
if ($dataClientes = $clientes->leerTodosClientes()) {
    //se establece el color de fondo para los encabezados   
    $pdf->SetFillColor(133,184,229);
    //fuente
    $pdf->SetFont('Times', 'B', 12);
    $pdf->SetFont('Times', 'B', 11);
    //celdas
    $pdf->Cell(46, 10, utf8_decode('Usuario'), 1, 0, 'C', 1);
    $pdf->Cell(46, 10, utf8_decode('Nombre del cliente'), 1, 0, 'C', 1);
    $pdf->Cell(46, 10, utf8_decode('Correo'), 1, 0, 'C', 1);
    $pdf->Cell(46, 10, utf8_decode('Telefono'), 1, 1, 'C', 1);

    foreach ($dataClientes as $rowClientes) {
        //color de fondo
        $pdf->SetFillColor(78,175,221);
        //fuente
        $pdf->SetFont('Times', 'B', 12);

        if ($clientes->setId($rowClientes['id_cliente'])) {

            if ($dataClientes = $clientes->leerTodosClientes()) {

                $pdf->SetFillColor(133,184,229);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->SetFont('Times', '', 11);
                //celdas que se mostraran
                $pdf->Cell(46, 10, utf8_decode($rowClientes['usuario']), 1, 0);
                $pdf->Cell(46, 10, ($rowClientes['nombre']), 1, 0);
                $pdf->Cell(46, 10, $rowClientes['correo'], 1, 0);
                $pdf->Cell(46, 10, $rowClientes['telefono'], 1, 1);
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
