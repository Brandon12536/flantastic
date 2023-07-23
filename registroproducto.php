<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = "SELECT * FROM productos";
$sentencia = $con->prepare($sql);
$sentencia->execute();

$resultado = $sentencia->fetchAll();

$articulos_x_pagina = 4;
/*
 * ? Contando productos de nuestra base de datos 
 */
$total_productos_bd = $sentencia->rowCount();
/*echo $total_productos_bd;*/
$paginas = $total_productos_bd / 4;
$paginas = ceil($paginas);
//echo $paginas;
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
    <title>FlanTastic | Inventario Productos</title>
</head>

<body>
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
            <a href="inicio.php" class="navbar-brand tuzo">
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
                        <a href="logout.php" class="btn btn-outline-secondary">
                            <span class="material-symbols-outlined">
                                logout
                            </span>Salir
                        </a>
                    </span>
                    <!------------------------------Salir------------------------------>
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>
    <br>
    <br>
    <div class="nuevoproducto">
        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="addproductos.php" class="btn btn-outline-primary" data-bs-toggle = "modal" data-bs-target="#nuevoModal"><span class="material-symbols-outlined">
                        add_circle
                    </span>&nbsp; Nuevo registro</a>
            </div>
        </div>
    </div>
    <br>
    <!------------------------------------------Paginación-------------------------------------------->
    <?php
    if (!$_GET) {
        header('Location:registroproducto.php?pagina=1');
    }

    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
        header('Location:registroproducto.php?pagina=1');
    }

    $iniciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;
    //echo $iniciar; 
    
    $sql_articulos = 'SELECT * FROM productos LIMIT :iniciar, :narticulos';
    $sentencia_articulos = $con->prepare($sql_articulos);
    $sentencia_articulos->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
    $sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
    $sentencia_articulos->execute();

    $resultado_articulos = $sentencia_articulos->fetchAll();
    ?>
    <div class="container table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="text-nowrap">Id</th>
                    <th class="text-nowrap">Nombre</th>
                    <th class="text-nowrap">Descripción</th>
                    <th class="text-nowrap">Precio</th>
                    <th class="text-nowrap">Descuento</th>
                    <th class="text-nowrap">Id Categoría</th>
                    <th class="text-nowrap">Estado</th>
                    <th class="text-nowrap">
                    <th class="text-nowrap">Acciones</th>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado_articulos as $articulo): ?>
                    <tr>
                        <td scope="row">
                            <?php echo $articulo['id']; ?>
                        </td>
                        <td>
                            <?php echo $articulo['nombre']; ?>
                        </td>
                        <td>
                            <?php echo $articulo['descripcion']; ?>
                        </td>
                        <td><b>
                                <?php echo MONEDA . number_format($articulo['precio'], 2, '.', ','); ?>
                            </b></td>
                        <td>
                            <?php echo $articulo['descuento']; ?>
                        </td>
                        <td>
                            <?php echo $articulo['id_categoria']; ?>
                        </td>
                        <td>
                            <?php echo ($articulo['activo'] == 1 ? "Activo" : "Inactivo"); ?>
                        </td>
                        <td>
                            <a type="button" class="btn btn-outline-success editbtn" href="update.php?id=<?php echo $articulo['id']; ?>"><span
                                    class="material-symbols-outlined">
                                    edit
                                </span>Modificar
                        </td>
                        <td>
                            <a href="Eliminar.php?id=<?php echo $articulo['id']; ?>" class="btn btn-outline-danger"
                                onclick="return confirmDelete()">
                                <span class="material-symbols-outlined">
                                    delete
                                </span> Eliminar
                        </td>
                    </tr>

                <?php endforeach ?>

            </tbody>
        </table>
        <!--include 'nuevoModal.php';-->
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="registroproducto.php?pagina=<?php echo $_GET['pagina'] - 1 ?>"
                    aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php for ($i = 0; $i < $paginas; $i++): ?>
                <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                    <a class="page-link" href="registroproducto.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a>
                </li>
            <?php endfor ?>

            <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>">
                <a class="page-link" href="registroproducto.php?pagina=<?php echo $_GET['pagina'] + 1 ?>"
                    aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <!--------------------------------------Fin Paginación-------------------------------------------->
    <br>
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

            .p1 {
                text-decoration: none;
                color: white;
            }

            .p1:hover {
                color: white;
                text-decoration: underline;
            }

            #imagenbg {
                margin-top 5px
            }

            .vendidos {
                margin-top: 10px
            }
            .nuevoproducto{
                margin-right: 9%;
            }
        </style>
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
            <a class="btn btn-outline-light btn-floating m-1 col-lg-3 col-md-6 mb-4 mb-md-0" href="tel:+527713661637" role="button"
                ><i class="fa-solid fa-phone"></i>&nbsp&nbsp7713661637</a>
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
                                <a href="terminos_condiciones.php" class="text-white p1">Términos y Condiciones</a>
                            </li>
                            <li>
                                <a href="contacto.php" class="text-white p1">¿Quiénes Somos?</a>
                            </li>
                            <li>
                                <a href="mision.php" class="text-white p1">Misión</a>
                            </li>
                            <li>
                                <a href="vision.php" class="text-white p1">Visión</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-start">
                        <h5 class="text-upper">Ayuda al cliente</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="aviso_privacidad.php" class="text-white p1">Aviso de Privacidad</a>
                            </li>
                            <li>
                                <a href="preguntas.php" class="text-white p1">Preguntas frecuentes</a>
                            </li>
                            <li>
                                <a href="politicas.php" class="text-white p1">Políticas de Privacidad</a>
                            </li>
                            <li>
                                <a href="politica_cookies.php" class="text-white p1">Políticas de  Cookies</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 text-start">
                        <h5 class="text-upper">Inventario</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="registroproducto.php" class="text-white p1">Registrar nuevo producto</a>
                            </li>
                            <li>
                            <a href="vendidos.php" class="text-white p1">Productos más vendidos</a>
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
                            <a href="version_sitio.php" class="text-white p1"><span>Versión: </span>1.17.0.0</a>
                        </li>
                        <li>
                            <a href="desarrollador.php" class="text-white p1">Desarrollador</a>
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
        function confirmDelete() {
            var respuesta = confirm("Está seguro que desea eliminar el producto")
            if (respuesta == true) {
                return true
            } else {
                return false
            }
        }
    </script>
</body>

</html>