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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
    <title>FlanTastic | Envíos</title>
</head>

<body>
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="inicio.php" class="navbar-brand tuzo">
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
                            <a href="vender.php" class="nav-link active">|&nbsp&nbsp&nbspVender</a>
                        </li>
                        <li class="nav-item">
                            <a href="formulario.php" class="nav-link active">|&nbsp&nbsp&nbspSuscripción</a>
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

    <section id="envios" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Envíos</h2>
            <h5 class="text-center mb-5">Todos los envíos son gratis a partir de la compra de $350.00 MXN.</h5>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card shadow animate__animated animate__fadeIn">
                        <div class="card-body">
                            <h5 class="card-title">Envío Gratis</h5>
                            <p class="card-text">Envío gratuito en algunos productos a partir de $350.00 MXN dentro de
                                México. El tiempo estimado de entrega es de 5 días.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow animate__animated animate__fadeIn">
                        <div class="card-body">
                            <h5 class="card-title">Envío Express</h5>
                            <p class="card-text">Ofrecemos envío express para aquellos que necesitan recibir sus
                                productos rápidamente. El tiempo estimado de entrega es de 2 días.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow animate__animated animate__fadeIn">
                        <div class="card-body">
                            <h5 class="card-title">Envío Internacional</h5>
                            <p class="card-text">También ofrecemos envío internacional para nuestros clientes en todo el
                                mundo. El tiempo estimado de entrega es de 25 días.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="logo-envios">
                            <!--<img src="img/flantastic.png" alt="">-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!---------------------------------------------Pie-De-Página--------------------------------------->

    <style>
        .p {
            text-decoration: none;
            color: white;
        }

        .p:hover {
            color: white;
        }

        .p1 {
            text-decoration: none;
            color: white;
        }

        .p1:hover {
            text-decoration: underline;
            color: white;
        }

        #imagenbg {
            margin-top: 5px;
        }

        .vendidos {
            margin-top: 10px;
        }

        .logo-envios {
            animation: saltarin 2s ease-in-out infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        @keyframes saltarin {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
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
    <?php require 'components/footer.php' ?>

</body>

</html>