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

        .p1 {
            text-decoration: none;
            color: white;
        }

        .p1:hover {
            color: white;
            text-decoration: underline;
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
                            <a href="politica_cookies.php" class="text-white p1">Políticas de cookies</a>
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
<!-----------------------------------------Script-Bootstrap--------------------------------------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
<!--------------------------------------Fin-Script-Bootstrap------------------------------------->