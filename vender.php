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
    <title>FlanTastic | Vende con nosotros</title>
</head>

<body>
    <?php require 'components/header.php' ?>
    <div class="container mt-5">
    <div class="card-deck">
        <div class="card mb-3 animated fadeInUp">
            <div class="card-body">
                <h2 class="card-title">Paso 1: Identifica el producto</h2>
                <p class="card-text">El primer paso es identificar el producto que deseas vender. Asegúrate de
                    que sea un producto original y nuevo. También asegúrate de tener suficientes existencias de
                    este producto para satisfacer la demanda.</p>
            </div>
        </div>
        <div class="card mb-3 animated fadeInUp">
            <div class="card-body">
                <h2 class="card-title">Paso 2: Crea una cuenta de Gmail</h2>
                <p class="card-text">Si aún no tienes una cuenta de Gmail, crea una. Esta será la dirección de
                    correo electrónico que utilizarás para tu negocio.</p>
            </div>
        </div>
        <div class="card mb-3 animated fadeInUp">
            <div class="card-body">
                <h2 class="card-title">Paso 3: Empaca tus productos de manera adecuada</h2>
                <p class="card-text">Asegúrate de empacar tus productos de manera adecuada para que lleguen a
                    tus clientes en buenas condiciones. Utiliza materiales de empaque de calidad y asegúrate de
                    incluir cualquier información adicional que sea necesaria.</p>
            </div>
        </div>
        <div class="card mb-3 animated fadeInUp">
            <div class="card-body">
                <h2 class="card-title">Paso 4: Cuenta con un número telefónico</h2>
                <p class="card-text">Es importante contar con un número telefónico para que tus clientes puedan
                    comunicarse contigo en caso de dudas o problemas con su pedido.</p>
            </div>
        </div>
        <div class="card mb-3 animated fadeInUp">
            <div class="card-body">
                <h2 class="card-title">Paso 5: Pagos</h2>
                <p class="card-text">Está estrictamente prohibido aceptar transferencias o pagos fuera de la
                    plataforma.</p>
            </div>
        </div>
    </div>
</div>


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