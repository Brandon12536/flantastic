<?php
require_once('library/tcpdf.php');
require 'config/database.php';

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Establecer el título del documento
$pdf->SetTitle('Informe de post venta');

// Habilitar el salto automático de página
$pdf->SetAutoPageBreak(true, 10);

// Agregar una página
$pdf->AddPage();

// Configurar estilos de fuente y tamaño
$pdf->SetFont('helvetica', 'B', 10);

// Título del informe
$pdf->Cell(0, 10, 'Informe de post venta', 0, 1, 'C');

// Configurar estilos de fuente y tamaño para los encabezados de columna
$pdf->SetFont('helvetica', 'B', 10);

// Encabezados de columna
$pdf->Cell(50, 10, 'ID Transacción', 1, 0, 'C');
$pdf->Cell(40, 10, 'Fecha', 1, 0, 'C');
$pdf->Cell(40, 10, 'Status', 1, 0, 'C');
$pdf->Cell(40, 10, 'ID Cliente', 1, 0, 'C');
$pdf->Cell(40, 10, 'Total', 1, 1, 'C');

// Configurar estilos de fuente y tamaño para el contenido de las celdas
$pdf->SetFont('helvetica', '', 10);

// Obtener los datos de la base de datos y agregar cada fila al informe
$db = new Database();
$con = $db->conectar();
$query = "SELECT id, id_transaccion, fecha, status, email, id_cliente, total FROM compra";
$stmt = $con->prepare($query);
$stmt->execute();

$total_ventas = 0; // Variable para el total de ventas

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(50, 10, $row['id_transaccion'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['fecha'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['status'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['id_cliente'], 1, 0, 'C');
    $pdf->Cell(40, 10, '$' . number_format($row['total'], 2), 1, 1, 'C');
    
    // Calcular el total de ventas
    $total_ventas += $row['total']; // Agregar el total de la venta actual al total general
}

// Agregar fila para mostrar el total de ventas
$pdf->Cell(170, 10, '', 'T', 1, 'C'); // Agregar una línea para separar la última fila
$pdf->SetFont('helvetica', 'B', 12); // Estilo para el total
$pdf->Cell(130, 10, 'Total de ventas:', 1, 0, 'R');
$pdf->Cell(40, 10, '$' . number_format($total_ventas, 2), 1, 1, 'C');

// Salida del PDF
$pdf->Output('informe_post_venta.pdf', 'D');
?>
