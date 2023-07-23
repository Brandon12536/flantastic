<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- FAVICON -->
  <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
  <title>FlanTastic | Ayuda</title>
</head>

<body>
  <?php require 'components/header1.php' ?>
  <br>
  <br>
    <div class="container">
    <h1 class="text-center">Métodos de pago que aceptamos</h1><br>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">PayPal</h5>
                        <p class="card-text">Aceptamos pagos a través de PayPal. Puedes pagar con tu cuenta de PayPal o
                            con tarjeta de crédito.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Mercado Pago</h5>
                        <p class="card-text">También aceptamos pagos a través de Mercado Pago. Puedes pagar con tu
                            cuenta de Mercado Pago o con tarjeta de crédito.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <h1 class="text-center">Pasos para poder realizar una compra</h1>
        <div class="row flex-column flex-md-row">
            <div class="col-md-6 mt-4 mt-md-0">
                <b><i>Paso 1:</i></b>
                <span>Elige el producto que deseas adquirir y da click en agregar al carrito.</span>
                <img src="img/Paso1.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <b><i>Paso 2:</i></b>
                <span>Dirigete al carrito de compras.</span>
                <img src="img/Paso2.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <b><i>Paso 3:</i></b>
                <span>Si deseas eliminar un producto, da click en eliminar o en caso contrario da click en realizar
                    pago.</span>
                <img src="img/Paso3.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <b><i>Paso 4:</i></b>
                <span>Selecciona el método de pago, PayPal o Mercado Pago e ingresa tus datos bancarios.</span>
                <img src="img/Paso4.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <b><i>Paso 5:</i></b>
                <span>Selecciona el método de pago, PayPal o Mercado Pago e ingresa tus datos bancarios, si seleccionaste PayPal debes rellenar los campos y posteriormente dar click en pagar, lo mismo debes hacer si seleccionas Mercado Pago.</span>
                <img src="img/Paso5.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <b><i>Paso 6:</i></b>
                <span>Una vez realizado el pago con PayPal podrás visualizar los detalles de tu pedido, así como la cantidad y total que pagaste.</span>
                <img src="img/Paso6.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    <br>
  <?php require 'components/footer1.php' ?>
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
</body>

</html>