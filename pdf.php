<?php
require_once('library/tcpdf.php');
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id_transaccion = isset($_GET['key']) ? $_GET['key'] : '0';

$error = '';
if ($id_transaccion == '') {
  $error = 'Error al procesar la petición';
} else {
  $sql = $con->prepare("SELECT count(id) FROM compra WHERE id_transaccion=? AND status=?");
  $sql->execute([$id_transaccion, 'COMPLETED']);
  if ($sql->fetchColumn() > 0) {
    $sql = $con->prepare("SELECT id, fecha, email, total FROM compra WHERE id_transaccion=? AND status=?
          LIMIT 1");
    $sql->execute([$id_transaccion, 'COMPLETED']);
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    $idCompra = $row['id'];
    $total = $row['total'];
    $fecha = $row['fecha'];

    $sqlDet = $con->prepare("SELECT nombre, precio, cantidad FROM detalle_compra WHERE id_compra = ?");
    $sqlDet->execute([$idCompra]);

    // Crea una nueva instancia de TCPDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

    // Establece los datos del documento
    $pdf->SetCreator('FlanTastic');
    $pdf->SetAuthor('FlanTastic');
    $pdf->SetTitle('Ticket de Compra');
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetAutoPageBreak(true, 10);

    // Agrega una nueva página
    $pdf->AddPage();

    // Establece la fuente y el tamaño para el encabezado
    $pdf->SetFont('helvetica', 'B', 14);

    // Agrega el logo
    //$pdf->Image('img/Biwwwen Apple.png', 10, 10, 30, 30);

    // Agrega el título
    $pdf->Cell(0, 10, 'Ticket de Compra', 0, 1, 'C');

    // Establece la fuente y el tamaño para los datos
    $pdf->SetFont('helvetica', '', 12);

    // Agrega los datos del ticket
    $pdf->Cell(0, 10, 'Folio de la compra: ' . $id_transaccion, 0, 1);
    $pdf->Cell(0, 10, 'Fecha de compra: ' . $fecha, 0, 1);
    $pdf->Cell(0, 10, 'Total: $' . $total, 0, 1);

    // Agrega una tabla para mostrar los productos comprados
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(40, 10, 'Cantidad', 1, 0, 'C');
    $pdf->Cell(60, 10, 'Producto', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Importe', 1, 1, 'C');

    $pdf->SetFont('helvetica', '', 12);
    while ($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)) {
      $importe = $row_det['precio'] * $row_det['cantidad'];
      $pdf->Cell(40, 10, $row_det['cantidad'], 1, 0, 'C');
      $pdf->Cell(60, 10, $row_det['nombre'], 1, 0, 'C');
      $pdf->Cell(40, 10, '$' . $importe, 1, 1, 'C');
    }

    // Cierra el PDF y lo muestra al usuario
    $pdf->Output('ticket_compra.pdf', 'D');
    exit;

  } else {
    $error = 'Error al comprobar la compra';
  }
}
?>
