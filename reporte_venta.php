<?php
require_once('library/tcpdf.php');
require 'config/database.php';

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Establecer el título del documento
$pdf->SetTitle('Informe de ventas');

// Agregar una página
$pdf->AddPage();

// Configurar estilos de fuente y tamaño
$pdf->SetFont('helvetica', 'B', 16);

// Título del informe
$pdf->Cell(0, 10, 'Informe de ventas', 0, 1, 'C');

// Configurar estilos de fuente y tamaño para los encabezados de columna
$pdf->SetFont('helvetica', 'B', 12);

// Encabezados de columna
/*$pdf->Cell(20, 10, 'ID', 1, 0, 'C');*/
/*$pdf->Cell(30, 10, 'ID Compra', 1, 0, 'C');*/
$pdf->Cell(30, 10, 'ID Producto', 1, 0, 'C');
$pdf->Cell(80, 10, 'Nombre', 1, 0, 'C');
$pdf->Cell(30, 10, 'Precio', 1, 0, 'C');
$pdf->Cell(30, 10, 'Cantidad', 1, 1, 'C');

// Configurar estilos de fuente y tamaño para el contenido de las celdas
$pdf->SetFont('helvetica', '', 12);

// Obtener los datos de la base de datos y agregar cada fila al informe
$db = new Database();
$con = $db->conectar();
$query = "SELECT id, id_compra, id_producto, nombre, precio, cantidad FROM detalle_compra";
$stmt = $con->prepare($query);
$stmt->execute();

$total = 0; // Variable para el total de compras

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    /*$pdf->Cell(20, 10, $row['id'], 1, 0, 'C');*/
    /*$pdf->Cell(30, 10, $row['id_compra'], 1, 0, 'C');*/
    $pdf->Cell(30, 10, $row['id_producto'], 1, 0, 'C');
    $pdf->Cell(80, 10, $row['nombre'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['precio'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['cantidad'], 1, 1, 'C');

    // Calcular el subtotal de la compra actual
    $subtotal = $row['precio'] * $row['cantidad'];
    $total += $subtotal; // Agregar el subtotal al total
    // Agregar el símbolo de pesos al subtotal
    $subtotal_con_pesos = '$' . number_format($subtotal, 2);
}

// Agregar fila para mostrar el total
$pdf->Cell(190, 10, '', 'T', 1, 'C'); // Agregar una línea para separar la última fila
$pdf->SetFont('helvetica', 'B', 12); // Estilo para el total
$pdf->Cell(160, 10, 'Total:', 1, 0, 'R');
$pdf->Cell(30, 10, '$ ' . number_format($total, 2), 1, 1, 'C');

// Salida del PDF
$pdf->Output('informe_compras.pdf', 'D');