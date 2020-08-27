<?php
require('../../helpers/comprobante.php');
require('../../models/pedidos.php');


$pdf = new Report;

$pdf->startReport('Pedido');


$pedidos = new pedidos;



if ($dataPedidos = $pedidos->leerDetallePedido()) {

    $pdf->SetFillColor(175);
    $pdf->SetFont('Times', 'B', 12);

    $pdf->Cell(46, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
    $pdf->Cell(146, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
    $pdf->Cell(146, 10, utf8_decode('Cantidad'), 1, 1, 'C', 1);

    foreach ($dataPedidos as $rowPedido) {

        if ($resenia->setId($rowPedido['id_detalle_pedido'])) {

            if ($dataPedidos = $pedidos->leerDetallePedido($id)) {

                $pdf->SetFillColor(225);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->SetFont('Times', '', 11);

                $pdf->Cell(46, 10, utf8_decode($rowPedido['nombre_p']), 1, 0);
                $pdf->Cell(146, 10, ($rowPedido['precio']), 1, 0);
                $pdf->Cell(146, 10, ($rowPedido['cantidad']), 1, 1);
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos para esta reseñas'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en un detalle'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay detalle para mostrar'), 1, 1);
}

$pdf->Output();
?>
