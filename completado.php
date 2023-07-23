<?php
require 'config/config.php';
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

    $sqlDet = $con->prepare("SELECT nombre, precio, cantidad, id_producto FROM detalle_compra WHERE id_compra = ?");
    $sqlDet->execute([$idCompra]);

    $row_dets = $sqlDet->fetchAll(PDO::FETCH_ASSOC); // Almacena los resultados en un arreglo

    // Actualizar el stock de los productos
    foreach ($row_dets as $row_det) {
      $importe = $row_det['precio'] * $row_det['cantidad'];

      // Restar la cantidad comprada al stock del producto
      $producto_id = $row_det['id_producto'];
      $cantidad_comprada = $row_det['cantidad'];

      // Consultar el valor actual del stock del producto
      $query_stock = "SELECT stock FROM productos WHERE id = ?";
      $stmt_stock = $con->prepare($query_stock);
      $stmt_stock->execute([$producto_id]);

      if ($stmt_stock->rowCount() > 0) {
        $fila_stock = $stmt_stock->fetch(PDO::FETCH_ASSOC);
        $stock_actual = $fila_stock['stock'];

        // Calcular el nuevo valor del stock
        $nuevo_stock = $stock_actual - $cantidad_comprada;

        // Actualizar el stock en la base de datos
        $query_actualizar_stock = "UPDATE productos SET stock = ? WHERE id = ?";
        $stmt_actualizar_stock = $con->prepare($query_actualizar_stock);
        $stmt_actualizar_stock->execute([$nuevo_stock, $producto_id]);

        // Verificar si se actualizó correctamente el stock
        if ($stmt_actualizar_stock->rowCount() > 0) {
          // El stock se actualizó correctamente
          // Puedes agregar aquí cualquier otra lógica que necesites
        } else {
          // Ocurrió un error al actualizar el stock
          $error = 'Error al actualizar el stock del producto';
          break;
        }
      } else {
        // No se encontró el producto en la base de datos
        $error = 'El producto no existe';
        break;
      }
    }
  } else {
    $error = 'Error al comprobar la compra';
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
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
  <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
  <link rel="stylesheet" href="css/styles.css">
  <title>FlanTastic | Detalle de compra</title>
</head>

<body>

  <header>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a href="inicio.php" class="navbar-brand tuzo">
          <img src="img/flantastic.png" alt="FlanTastic" width="70" height="60"><br>
          <strong>FlanTastic</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
          aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarHeader">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="vender.php" class="nav-link active">|&nbsp&nbsp&nbspVender</a>
            </li>
            <li class="nav-item">
              <a href="suscripcion.php" class="nav-link active">|&nbsp&nbsp&nbspSuscripción</a>
            </li>
          </ul>

          <a href="carrito.php" class="btn btn-primary">
            <span class="material-symbols-outlined">
              shopping_cart
            </span><span id="num_cart" class="badge bg-secondary">
              <?php echo $num_cart; ?>
            </span>
          </a>
          &nbsp&nbsp&nbsp
          <!------------------------------Salir------------------------------>
          <span class=" cerrar nav-item">
            <button class="btn btn-outline-secondary" onclick="logout()">
              <span class="material-symbols-outlined">
                logout
              </span>Salir
            </button>
          </span>
          <!------------------------------Salir------------------------------>
        </div>
      </div>
    </div>
  </header>

  <br><br>

  <main>
    <div class="container">
      <?php if (strlen($error) > 0) { ?>
        <div class="row">
          <div class="col">
            <h3>
              <?php echo $error; ?>
            </h3>
          </div>
        </div>
      <?php } else { ?>
        <div class="row">
          <div class="col">
            <b>Folio de la compra: </b>
            <?php echo $id_transaccion; ?><br>
            <b>Fecha de compra: </b>
            <?php echo $fecha; ?><br>
            <b>Total: </b>
            <?php echo MONEDA . number_format($total, 2, '.', ','); ?><br>
          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col">
            <table class="table table-hover table-sm">
              <thead class="table-dark">
                <tr>
                  <th>Cantidad</th>
                  <th>Producto</th>
                  <th>Importe</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($row_dets as $row_det) {
                  $importe = $row_det['precio'] * $row_det['cantidad'];
                  ?>
                  <tr>
                    <td>
                      <?php echo $row_det['cantidad']; ?>
                    </td>
                    <td>
                      <?php echo $row_det['nombre']; ?>
                    </td>
                    <td>
                      <?php echo MONEDA . number_format($importe, 2, '.', ','); ?>
                    </td>
                  </tr>
                <?php } ?>

                <tr>
                  <td></td>
                  <td style="text-align: right;"><b>Total:</b></td>
                  <td style="text-align: right;">
                    <?php echo MONEDA . number_format($total, 2, '.', ','); ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      <?php } ?>
    </div>
  </main>



  <div class="button-container">
    <a href="pdf.php?key=<?php echo $id_transaccion; ?>" class="download-button">Descargar comprobante de pago</a>
  </div>


  <!-- Incluye SweetAlert JS -->
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
  <style>
    .download-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4a6cf9;
      color: black;
      text-decoration: none;
      border-radius: 4px;
      font-weight: bold;
      text-align: center;
    }

    .download-button:hover {
      background-color: #4a6cf9;
      color: white;
    }

    .button-container {
      display: flex;
      justify-content: center;
    }

    /* Estilos para pantallas más pequeñas */
    @media screen and (max-width: 600px) {
      .download-button {
        padding: 8px 16px;
        font-size: 14px;
      }
    }
  </style>
</body>

</html>