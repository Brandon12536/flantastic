<?php
session_start(); // Inicializar la sesión

require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$mensajeExito = '';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $productoId = $_POST['producto'];
    $costo = $_POST['costo'];

    // Obtener el nombre y el precio del producto seleccionado
    $sql = "SELECT nombre, precio, stock FROM productos WHERE id = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $productoId, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $nombreProducto = $row['nombre'];
    $precioProducto = $row['precio'];
    $cantidadDisponible = $row['stock'];

    // Verificar si hay suficiente stock disponible
    if ($cantidadDisponible >= 1) {
        // Restar la cantidad comprada del stock
        $cantidadComprada = 1; // Puedes ajustar esto según tu lógica de compra
        $nuevoStock = $cantidadDisponible - $cantidadComprada;

        // Actualizar el stock en la base de datos
        $sqlUpdateStock = "UPDATE productos SET stock = :stock WHERE id = :id";
        $stmtUpdateStock = $con->prepare($sqlUpdateStock);
        $stmtUpdateStock->bindParam(':stock', $nuevoStock, PDO::PARAM_INT);
        $stmtUpdateStock->bindParam(':id', $productoId, PDO::PARAM_INT);
        $stmtUpdateStock->execute();

        // Generar el ticket en PDF
        require 'library/tcpdf.php';

        $pdf = new TCPDF('P', 'mm', array(80, 150), true, 'UTF-8');
        $pdf->SetCreator('FlanTastic');
        $pdf->SetAuthor('FlanTastic');
        $pdf->SetTitle('Ticket de Pago en Efectivo');
        $pdf->SetMargins(5, 5, 5);
        $pdf->SetAutoPageBreak(true, 5);
        $pdf->SetFont('helvetica', '', 10);

        $pdf->AddPage();

        // Establecer el estilo del ticket
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetLineWidth(0.2);

        // Encabezado del ticket
        $pdf->Cell(70, 5, 'FlanTastic', 0, 1, 'C', 1);
        $pdf->Ln(2);
        $pdf->Cell(70, 5, 'Ticket de Pago en Efectivo', 0, 1, 'C', 1);
        $pdf->Ln(2);

        // Información del producto
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(70, 5, $nombreProducto . ' - $' . number_format($precioProducto, 2, '.', ','), 0, 1, 'L', 1);
        $pdf->Ln(2);

        // Total
        $total = $precioProducto; // Puedes ajustar esto según tu lógica de cálculo del total
        $pdf->SetFont('helvetica', 'B', 10);
        $pdf->Cell(70, 5, 'Total: $' . number_format($total, 2, '.', ','), 0, 1, 'L', 1);
        $pdf->Ln(2);

        // Ruta absoluta a la carpeta "ticket"
        $ticketDir = $_SERVER['DOCUMENT_ROOT'] . '/flantastic/report/';

        // Generar un nombre único para el archivo PDF
        $filename = uniqid() . '.pdf';

        // Ruta absoluta al archivo PDF
        $pdfPath = $ticketDir . $filename;

        $pdf->Output($pdfPath, 'F'); // Guardar el ticket en la carpeta "ticket" con un nombre único

        // Limpiar el carrito
        unset($_SESSION['carrito']); // Suponiendo que 'carrito' es la variable de sesión que almacena los productos del carrito

        // Mostrar mensaje de éxito
        $mensajeExito = 'El ticket ha sido generado y guardado en la carpeta "ticket".';

        // Establecer las cabeceras para la descarga del archivo
        header("Content-Type: application/pdf");
        header("Content-Disposition: attachment; filename=\"" . basename($pdfPath) . "\"");
        header("Content-Length: " . filesize($pdfPath));

        // Leer el archivo y enviarlo al cliente
        readfile($pdfPath);
        exit();
    } else {
        // Manejar la situación cuando no hay suficiente stock disponible
        $mensajeExito = 'No hay suficiente stock disponible para realizar la compra.';
    }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--------------------------------Framework-Bootstrap------------------------------------------>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!--------------------------------Framework-Bootstrap------------------------------------------>
    <!---------------------------------Framework-Google-Icons-------------------------------------->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <!------------------------------Fin-Framework-Google-Icons------------------------------------>
    <!---------------------------------------Framework-MDB---------------------------------------->
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-------------------------------------Fin-Framework-MDB-------------------------------------->
    <!----------------------------------------FAVICON--------------------------------------------->
    <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <title>Pago en Efectivo</title>
</head>

<body>
    <?php require 'components/header.php' ?>
    <br>
    <br>
    <div class="container">

        <h1 class="text-center mt-5">Pago en Efectivo</h1>
        <?php if (!empty($mensajeExito)): ?>
        <div class="exito-message">
            <?php echo $mensajeExito; ?>
        </div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="producto" class="form-label">Selecciona el producto:</label>
                <select name="producto" class="form-select" required>
                    <?php
                    // Obtener los productos de la base de datos
                    $sql = "SELECT id, nombre, precio FROM productos";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Generar las opciones del select
                    foreach ($rows as $row) {
                        $productoId = $row['id'];
                        $nombre = $row['nombre'];
                        echo "<option value='$productoId'>$nombre</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="costo" class="form-label">Precio:</label>
                <input type="number" name="costo" value="<?php echo isset($_POST['costo']) ? $_POST['costo'] : '20'; ?>" class="form-control" required readonly>
            </div>
            <button type="submit" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                    <path
                        d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                    <path fill-rule="evenodd"
                        d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                </svg>&nbsp;&nbsp;Generar Ticket</button>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <?php require 'components/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
    <script>
        function logout() {
            Swal.fire({
                title: '¿Está seguro de cerrar sesión?',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                }
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>