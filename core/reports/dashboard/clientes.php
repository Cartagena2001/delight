<?php
require('../../helpers/report.php');
require('../../models/clientes.php');


$pdf = new Report;

$pdf->startReport('Clientes');


$clientes = new clientes;

if ($dataClientes = $clientes->leerTodosClientes()) {

    $pdf->SetFillColor(175);
    $pdf->SetFont('Times', 'B', 12);

    $pdf->SetFont('Times', 'B', 11);
    $pdf->Cell(46, 10, utf8_decode('Usuario'), 1, 0, 'C', 1);
    $pdf->Cell(46, 10, utf8_decode('Nombre del cliente'), 1, 0, 'C', 1);
    $pdf->Cell(46, 10, utf8_decode('Correo'), 1, 0, 'C', 1);
    $pdf->Cell(46, 10, utf8_decode('Telefono'), 1, 1, 'C', 1);

    foreach ($dataClientes as $rowClientes) {

        $pdf->SetFillColor(175);

        $pdf->SetFont('Times', 'B', 12);

        if ($clientes->setId($rowClientes['id_cliente'])) {

            if ($dataClientes = $clientes->leerTodosClientes()) {

                $pdf->SetFillColor(225);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->SetFont('Times', '', 11);

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
