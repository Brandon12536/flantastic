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
  <title>FlanTastic | Versión de la Aplicación Web</title>
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
    </div>
    </div>
  </header>
  <br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-md-10">
        <ul class="list-group px-lg-5 px-md-4">
          <li class="list-group-item shadow">
            <h5 class="mb-1"><strong>1. </strong>Se corrigió un error que impedía a los usuarios completar el proceso de
              pago con PayPal. Ahora los usuarios pueden utilizar esta opción sin problemas.</h5>
          </li>
          <li class="list-group-item shadow">
            <h5 class="mb-1"><strong>2. </strong>Se agregaron filtros por dropdown en la sección categoría, lo que
              facilita la búsqueda de productos específicos.</h5>
          </li>
          <li class="list-group-item shadow">
            <h5 class="mb-1"><strong>3. </strong>Se implementó la funcionalidad de registro de nuevos productos y
              eliminación de productos existentes.</h5>
          </li>
          <li class="list-group-item shadow">
            <h5 class="mb-1"><strong>4. </strong>Se agregó el uso de cookies para recordar las preferencias de los
              usuarios, como la moneda y el idioma. Esto mejora la experiencia del usuario al personalizar la aplicación
              para sus necesidades.</h5>
          </li>
          <li class="list-group-item shadow">
            <h5 class="mb-1"><strong>5. </strong>Se incluyó un temporizador en la página principal para mostrar
              promociones especiales por un tiempo limitado. Los usuarios pueden ver cuánto tiempo queda para aprovechar
              estas ofertas.</h5>
          </li>
          <li class="list-group-item shadow">
            <h5 class="mb-1"><strong>6. </strong>Se agregó una política de cookies para cumplir con las regulaciones de
              privacidad y protección de datos.</h5>
          </li>
          <li class="list-group-item shadow">
            <h5 class="mb-1"><strong>7. </strong>La aplicación ahora es responsiva, lo que permite a los usuarios
              acceder a la aplicación desde cualquier dispositivo.</h5>
          </li>
          <li class="list-group-item shadow">
            <h5 class="mb-1"><strong>8. </strong>Se agregó un chat bot para ayudar a los usuarios con preguntas y
              consultas comunes.</h5>
          </li>
          <li class="list-group-item shadow">
            <h5 class="mb-1"><strong>9. </strong>El botón de teléfono ahora es funcional, lo que permite a los usuarios
              hacer llamadas directamente desde la aplicación.</h5>
          </li>
          <li class="list-group-item shadow">
            <h5 class="mb-1"><strong>10. </strong>Se agregó información acerca de los envíos que se ofrecen, incluyendo
              opciones de envío y tiempos de entrega estimados. Esto ayuda a los usuarios a tomar decisiones informadas
              al momento de realizar una compra.</h5>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <br>

  <style>
    .p {
      text-decoration: none;
      color: white;
    }

    .p:hover {
      color: white;
    }

    #imagenbg {
      margin-top: 5px;
    }

    .vendidos {
      margin-top: 10px;
    }

    .p1 {
      text-decoration: none;
      color: white;
    }

    .p1:hover {
      color: white;
      text-decoration: underline;
    }
  </style>

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
</body>

</html>