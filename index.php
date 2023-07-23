<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


//elimina manualmente productos del carrito
//session_destroy();

//print_r($_SESSION);

/************************Barra búsqueda*****************************/
if (isset($_GET['enviar'])) {
    $busqueda = $_GET['busqueda'];
    $sql = $con->query(" SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'");
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="css/testimonios.css">
    <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
    <title>Flantastic | Bienvenidos</title>
</head>

<body>
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand tuzo">
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
                            <a href="vender1.php" class="nav-link active">|&nbsp&nbsp&nbspVender</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link active">|&nbsp&nbsp&nbspIniciar Sesión</a>
                        </li>
                    </ul>
                    <!--------------------------------------Barra-de-Búsqueda------------------------------------->
                    <form method="get" class="formbuscar">
                        <input class="search form-control" type="text" name="busqueda" placeholder="Buscar..."
                            size="50">
                        <button type="submit" name="enviar" class="btn btn-outline-primary"><span
                                class="material-symbols-outlined">
                                search
                            </span></button>
                    </form>
                    <!--------------------------------------Fin-Barra-Búsqueda------------------------------------>
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


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCenteredExample" data-mdb-target="#navbarCenteredExample"
                aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
                <!-- Left links -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="ayuda1.php">Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="envios1.php">Envíos</a>
                    </li>
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-mdb-toggle="dropdown" aria-expanded="true" data-bs-toggle="dropdown">
                            Categorías
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                            <li class="dropdown-header text-center">
                                <h6>Opciones</h6>
                            </li>
                            <li>
                                <form action="index.php" method="get">
                                    <button class="dropdown-item todo" type="submit" name="submittodo">Todo</button>
                                </form>
                                <?php
                                if (isset($_GET['submittodo'])) {
                                    $todo = $_GET['submittodo'];
                                    $sql = $con->query("SELECT id, nombre, precio FROM productos WHERE activo=1");
                                    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                                }
                                ?>
                            </li>
                            <li>
                                <form action="index.php" method="get">
                                    <button class="dropdown-item flanes" type="submit" name="submit">Flanes</button>
                                </form>
                                <?php
                                if (isset($_GET['submit'])) {
                                    $flan = $_GET['submit'];
                                    $sql = $con->query("SELECT * FROM productos WHERE nombre LIKE '%flan%'");
                                    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                                }
                                ?>
                            </li>

                        </ul>
                    </div>
                    <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>


    <!--------------------------------------Carrousel--------------------------------------------->
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/anuncio-flan-1-1.png" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="img/anuncio-flan-2-1.png" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="img/anuncio-flan-3-1.png" class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!------------------------------------FinCarrousel-------------------------------------------->
    <br>
    <!------------------------------------Temporizador-------------------------------------------->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <!--<h4>Temporizador</h4>-->
                <div id="timer" class="d-inline-block bg-light p-3"></div>
            </div>
        </div>
    </div>
    <?php

    // Define la fecha y hora final
    $end_time = strtotime("2023-07-20 12:00:00");

    ?>
    <!----------------------------------Fin deTemporizador---------------------------------------->
    <!--<br>-->
    <!------------------------------------Inicio Aviso-------------------------------------------->
    <!--<div class="alert text-center animate__animated animate__fadeIn">
        <i class="fas fa-exclamation-triangle fa-3x alert-icon"></i>
        <p>La <b>Aplicación Web</b> está desarrollada con fin educativo y demostrativo, por favor no ingreses ningún
            tipo de dato bancario.</p>
    </div>
    </div>-->

    <!------------------------------------Fin Aviso-------------------------------------------->
    <br>
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php
                            $id = $row['id'];
                            $imagen = "images/productos/" . $id . "/principal.jpg";
                            if (!file_exists($imagen)) {
                                $imagen = "images/no.png";
                            }
                            ?>
                            <img src="<?php echo $imagen; ?>" height="300px">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $row['nombre']; ?>
                                </h5>
                                <b class="card-text">$
                                    <?php echo number_format($row['precio'], 2, '.', ','); ?>
                                </b>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="details1.php?id=<?php echo $row['id']; ?>&token=<?php echo
                                               hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>"
                                            class="btn btn-primary">Detalles</a>
                                    </div>

                                    <button class="btn btn-outline-dark" type="button"
                                        onclick="addProducto(<?php echo $row['id']; ?>,
                                                                                                                                             '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-bag-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
                                        </svg> Agregar
                                        al
                                        carrito</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
    </main>


    <!-----------------------------------------Script-Bootstrap--------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <!--------------------------------------Fin-Script-Bootstrap------------------------------------->
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
        /**********************************Inicio del Temporizador*******************************
                                            * ! Temporizador 
         ****************************************************************************************/
        // Convierte la fecha y hora final a formato JavaScript
        var end_time = new Date(<?php echo json_encode(date("M d, Y H:i:s", $end_time)) ?>).getTime();

        // Actualiza el temporizador cada 1 segundo
        var timer = setInterval(function () {

            // Obtiene la diferencia de tiempo entre el tiempo actual y el tiempo final
            var time_left = end_time - new Date().getTime();

            // Convierte la diferencia de tiempo en días, horas, minutos y segundos
            var days = Math.floor(time_left / (1000 * 60 * 60 * 24));
            var hours = Math.floor((time_left % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((time_left % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((time_left % (1000 * 60)) / 1000);

            // Muestra el temporizador en la página
            document.getElementById("timer").innerHTML = "Quedan: " + days + " días, " + hours + " horas, "
                + minutes + " minutos, " + seconds + " segundos ";

            // Detiene el temporizador si llega a 0
            if (time_left < 0) {
                clearInterval(timer);
                document.getElementById("timer").innerHTML = "La Promoción ha finalizado";
            }

        }, 1000);
    </script>
    <!----------------------------------------Estilos-CSS---------------------------------------------->
    <style>
        .button {
            position: fixed;
            width: 65px;
            height: 65px;
            line-height: 55px;
            bottom: 30px;
            right: 30px;
            background: #212529;
            color: #fff;
            border-radius: 50px;
            text-align: center;
        }

        .button:hover {
            background: linear-gradient(to right, #005C98, #505BDA);
        }

        .imgd {
            margin-top: 10px;
            width: 45px;
            height: 45px;
        }

        .formbuscar {
            margin-right: 45px;
            display: flex;
            align-items: center;
        }

        .search {
            border: none;
            margin-right: 5px;
            height: 33px;
            font-size: 16px;
            border-radius: 25px;
        }

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
            color: white;
            text-decoration: underline;
        }

        .cerrar {
            margin-right: 15px;
        }

        .todo {
            border: none;
            background: none;
            color: white;
        }

        .flanes {
            border: none;
            background: none;
            color: white;
        }

        .temporizador {
            text-align: center;
            font-size: xx-large;
        }

        #timer {
            transition: all 0.3s ease-in-out;
        }

        #timer:hover {
            transform: scale(1.1);
            cursor: pointer;
        }

        /*#timer {
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }*/
        /*****************************************************************************
                                    *? Inicio Cookie
        *****************************************************************************/
        #mensaje_cookies {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            animation: aparecer 0.5s ease-in-out;
        }

        @keyframes aparecer {
            from {
                bottom: -50px;
            }

            to {
                bottom: 0;
            }
        }

        #mensaje_cookies img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        #mensaje_cookies button {
            background-color: #212529;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin: 0 10px;
            border-radius: 4px;
        }

        #mensaje_cookies button:hover {
            background-color: #0D6EFD;
            cursor: pointer;
        }

        /*****************************************************************************
                                    *! Fin Cookie
        *****************************************************************************/
        .alert {
            position: relative;
            padding: 20px;
            border-radius: 5px;
            font-size: 18px;
            color: #fff;
            background-color: #f44336;
            border-color: #f44336;
            /*max-width: 500px;*/
            margin: 0 auto;
            text-align: center;
        }

        .alert-icon {
            position: relative;
            top: 0;
            left: 0;
            transform-style: preserve-3d;
            animation: moveAlert 2s ease-in-out infinite;
        }

        .alert-text {
            display: block;
            margin-top: 20px;
        }

        @keyframes moveAlert {
            0% {
                transform: rotate(0deg) scale(1);
            }

            25% {
                transform: rotate(45deg) scale(1.2);
            }

            50% {
                transform: rotate(0deg) scale(1);
            }

            75% {
                transform: rotate(-45deg) scale(1.2);
            }

            100% {
                transform: rotate(0deg) scale(1);
            }
        }
    </style>
    <!----------------------------------Fin-Estilos-CSS---------------------------------------------->
    <!------------------------------Implementacion-burbuja-del-bot---------------------------------->
    <div class="responsive-container">
        <a href="bot1.php" class="button">
            <img src="img/bot-conversacional.png" class="imgd">
        </a>
    </div>
    <br>
    <!-------------------------------------Fin-Burbuja-Bot------------------------------------------>


    <!-------------------------------------Inicio Coockie------------------------------------------->
    <?php

    if (!isset($_COOKIE["acepto_cookies"])) {
        ?>

    <div id="mensaje_cookies">
        <img src="img/cookie.png" alt="Cookie">&nbsp;
        Este sitio utiliza cookies para mejorar su experiencia de navegación. Por favor, acepte nuestras cookies para
        continuar.
        <br><br>
        <button id="aceptar_cookies">Aceptar</button>
        <button id="rechazar_cookies">Rechazar</button>
    </div>
    <!--------------------------------------Fin Coockie-------------------------------------------->
        <?php
    }

    ?>




    <h1 class="text-center">Testimonios</h1>
    <h5 class="text-center">Nuestros clientes dicen de nosotros</h5>
    <div class="testimonials"></div>



    <!---------------------------------------------Pie-De-Página--------------------------------------->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <div>Redes sociales</div>
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://es-la.facebook.com/" role="button"
                    target="_blank"><i class="fab fa-facebook-f"></i></a>
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/?lang=es" role="button"
                    target="_blank"><i class="fab fa-twitter"></i></a>
                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://mail.google.com/mail/u/5/#inbox"
                    role="button" target="_blank"><i class="fab fa-google"></i></a>
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/" role="button"
                    target="_blank"><i class="fab fa-instagram"></i></a>
                <!-- GitHub -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/" role="button"
                    target="_blank"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
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
        </style>
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="p" href="#">FlanTastic</a>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <h3>Ubicación</h3>
            <br>
            <div class="embed-responsive-container">
                <iframe class="embed-responsive-item"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3747.1749394391463!2d-98.77389526054579!3d20.08497270349567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1a1d7c0f1cfa3%3A0x122870c3429e18a8!2sInstituto%20Tecnol%C3%B3gico%20de%20Pachuca%20(ITP)!5e0!3m2!1ses-419!2smx!4v1669167102410!5m2!1ses-419!2smx"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="col-lg-3 col-md-6 mb-4 mb-md-0">
                </iframe>
            </div>
            <div>
                <a class="p" href="#">Carretera México - Pachuca Km. 87.5,
                    C.P. 42080, Colonia Venta Prieta,
                    Pachuca de Soto, Hidalgo, México.</a>
            </div>
            <script src="geo.js"></script>
            <div id="ubicacion">
                Tus coordenadas aparecerán aquí
            </div>
            <script>
                window.onload = miUbicacion;
                function miUbicacion() {
                    //Si los servicios de geolocalización están disponibles
                    if (navigator.geolocation) {
                        // Para obtener la ubicación actual llama getCurrentPosition.
                        navigator.geolocation.getCurrentPosition(muestraMiUbicacion);
                    } else { //de lo contrario
                        alert("Los servicios de geolocalizaci\363n  no est\341n disponibles");
                    }
                }
                function muestraMiUbicacion(posicion) {
                    var latitud = posicion.coords.latitude
                    var longitud = posicion.coords.longitude
                    var output = document.getElementById("ubicacion");
                    output.innerHTML = "Latitud: " + latitud + "  Longitud: " + longitud;
                }
                /****************************************************************************
                                             * ? Inicio Script Cookie
               ****************************************************************************/
                document.getElementById("aceptar_cookies").addEventListener("click", function () {
                    document.cookie = "acepto_cookies=true; expires=Fri, 31 Dec 9999 23:59:59 GMT;";
                    document.getElementById("mensaje_cookies").style.display = "none";
                });

                document.getElementById("rechazar_cookies").addEventListener("click", function () {
                    document.getElementById("mensaje_cookies").style.display = "none";
                });
                /****************************************************************************
                                              * ! Fin Script Cookie
                ****************************************************************************/
            </script>
            <br>
            <h4>Teléfono</h4>
            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1 col-lg-3 col-md-6 mb-4 mb-md-0" href="tel:+527713661637"
                role="button"><i class="fa-solid fa-phone"></i>&nbsp&nbsp7713661637</a>
            <a class="btn btn-outline-light btn-floating m-1 col-lg-3 col-md-6 mb-4 mb-md-0" href="tel:+527713661637"
                role="button"><i class="fa-solid fa-phone"></i>&nbsp&nbsp7711989135</a>
            <a class="btn btn-outline-light btn-floating m-1 col-lg-3 col-md-6 mb-4 mb-md-0" href="tel:+527713661637"
            role="button"><i class="fa-solid fa-phone"></i>&nbsp&nbsp7711063978</a>
            <br>
            <br>
            <!-----------------------------------------Section: Links----------------------------------------->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-start">
                        <h5 class="text-upper">Información de la empresa</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="terminos_condiciones1.php" class="text-white p1">Términos y Condiciones</a>
                            </li>
                            <li>
                                <a href="contacto1.php" class="text-white p1">¿Quiénes Somos?</a>
                            </li>
                            <li>
                                <a href="mision1.php" class="text-white p1">Misión</a>
                            </li>
                            <li>
                                <a href="vision1.php" class="text-white p1">Visión</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-start">
                        <h5 class="text-upper">Ayuda al cliente</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="aviso_privacidad1.php" class="text-white p1">Aviso de Privacidad</a>
                            </li>
                            <li>
                                <a href="preguntas1.php" class="text-white p1">Preguntas frecuentes</a>
                            </li>
                            <li>
                                <a href="politicas1.php" class="text-white p1">Políticas de Privacidad</a>
                            </li>
                            <li>
                                <a href="politica_cookies1.php" class="text-white p1">Políticas de cookies</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-start">
                        <h5 class="text-upper">Inventario</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-white p1" onclick="mostrarAlerta()">Registrar nuevo producto</a>
                            </li>
                            <li>
                                <a href="vendidos1.php" class="text-white p1">Productos más vendidos</a>
                            </li>
                            <!--<li>
                                <a href="#!" class="text-white p1">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white p1">Link 4</a>
                            </li>-->
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-start">
                        <h5 class="text-upper">Acerca de la Aplicación Web</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="version_sitio1.php" class="text-white p1"><span>Versión: </span>1.17.0.0</a>
                            </li>
                            <li>
                                <a href="desarrollador1.php" class="text-white p1">Desarrollador</a>
                            </li>
                            <!--<li>
                                <a href="#!" class="text-white p1">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white p1">Link 4</a>
                            </li>-->
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->
        </div>
        </div>
        <!--Copyright -->
    </footer>
    <script>
        function mostrarAlerta() {
            Swal.fire({
                title: 'Atención',
                text: 'Para registrar un nuevo producto, inicia sesión',
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            });
        }
    </script>
    <script src="js/testimonios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
</body>

</html>