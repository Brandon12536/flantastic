<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
  echo 'Error al procesar la petición';
  exit;
} else {

  $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

  if ($token == $token_tmp) {
    $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
    $sql->execute([$id]);
    if ($sql->fetchColumn() > 0) {
      $sql = $con->prepare("SELECT nombre, descripcion, precio, descuento, stock FROM productos WHERE id=? AND activo=1 LIMIT 1");
      $sql->execute([$id]);
      $row = $sql->fetch(PDO::FETCH_ASSOC);
      $nombre = $row['nombre'];
      $descripcion = $row['descripcion'];
      $precio = $row['precio'];
      $descuento = $row['descuento'];
      $stock = $row['stock'];
      $precio_desc = $precio - (($precio * $descuento) / 100);
      $dir_images = 'images/productos/' . $id . '/';
      $rutaImg = $dir_images . 'principal.jpg';

      if (!file_exists($rutaImg)) {
        $rutaImg = 'images/no.png';
      }
      $images = array();
      if (file_exists($dir_images)) {
        $dir = dir($dir_images);

        while (($archivo = $dir->read()) != false) {
          if ($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'png'))) {
            $images = $dir_images . $archivo;
            $imagenes[] = $dir_images . $archivo;
          }
        }
        $dir->close();
      }

      // Consultar el valor de la columna 'stock' para el producto con el ID especificado
      $query = "SELECT stock FROM productos WHERE id = ?";
      $stmt = $con->prepare($query);
      $stmt->execute([$id]);

      // Obtener el valor de la columna 'stock' del resultado de la consulta
      if ($stmt->rowCount() > 0) {
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        $stock = $fila['stock'];
      } else {
        $stock = 0; // Manejar la situación donde el producto no existe en la base de datos
      }
    } else {
      echo 'Error al procesar la petición';
      exit;
    }
  } else {
    echo 'Error al procesar la petición';
    exit;
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
  <title>FlanTastic | Detalles de producto</title>
</head>

<body>

  <header>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a href="index.php" class="navbar-brand tuzo">
          <img src="img/flantastic.png" alt="" width="70" height="60"><br>
          <strong>FlanTastic</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
          aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarHeader">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="vender1.php" class="nav-link active">|&nbsp&nbsp&nbspVender</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link active">|&nbsp&nbsp&nbspIniciar Sesión</a>
            </li>
          </ul>
          <a href="#" class="btn btn-primary ml-3">
            <span class="material-symbols-outlined">
              shopping_cart
            </span>
            <span id="num_cart" class="badge bg-secondary">
              <?php echo $num_cart; ?>
            </span>
          </a>&nbsp&nbsp&nbsp
        </div>
      </div>
    </div>
    </div>
    </div>
  </header>


  <main>
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-1">

          <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?php echo $rutaImg; ?>" class="d-block w-100">
              </div>

              <?php foreach ($imagenes as $img) { ?>
              <div class="carousel-item">
                <img src="<?php echo $img; ?>" class="d-block w-100">
              </div>
              <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        </div>
        <div class="col-md-6 order-md-2">
          <h2>
            <?php echo $nombre; ?>
          </h2>

          <?php if ($descuento > 0) { ?>
          <p><del>
              <?php echo MONEDA . number_format($precio, 2, '.', ','); ?>
            </del></p>
          <h2>
            <?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?>
            <small class="text-success">
              <?php echo $descuento; ?>% descuento
            </small>
          </h2>

          <?php } else { ?>

          <h2>
            <?php echo MONEDA . number_format($precio, 2, '.', ','); ?>
          </h2>
          <?php } ?>
          <p class="lead">
            <?php echo $descripcion; ?>
          </p>

          <div class="col-3 my-3">
            Cantidad: <input class="form-control" id="cantidad" name="cantidad" type="number" min="1" max="10" value="1"
              oninput="validarCantidad(this)">
          </div>
          <div class="col-3 my-3">
            Disponibles:
            <input class="form-control" id="stock" name="stock" type="number" min="1" max="100"
              value="<?php echo $stock; ?>" oninput="validarStock(this)">
          </div>

          <div class="d-grid gap-3 col-10 mx-auto">
            <!--<button class = "btn btn-primary" type = "button">Comprar ahora</button>-->
            <button class="btn btn-outline-primary" type="button"
              onclick="addProducto(<?php echo $id; ?>, cantidad.value, '<?php echo $token_tmp; ?>')"><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill"
                viewBox="0 0 16 16">
                <path
                  d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
              </svg>&nbsp;&nbsp;&nbsp;&nbsp;Agregar al
              carrito</button>
          </div>
        </div>
      </div>
    </div>
  </main>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
  <script>
    function addProducto(id, cantidad, token) {
      // Si el usuario no ha iniciado sesión, mostramos una notificación de SweetAlert
      Swal.fire({
        icon: 'warning',
        title: 'Inicia sesión para agregar productos al carrito',
        showConfirmButton: false,
        timer: 2000
      });
    }



    function validarCantidad(input) {
      if (input.value > 10) input.value = 10;
      if (input.value < 1) input.value = 1;
    }
  </script>

</body>

</html>