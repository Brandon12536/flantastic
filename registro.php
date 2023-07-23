<?php
require 'config/config.php';
require 'config/database.php';
require 'clases/clienteFunciones.php';

$db = new Database();
$con = $db->conectar();


$errors = [];

if (!empty($_POST)) {

    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $dni = trim($_POST['dni']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    /*********************Llamando funciones de validación*************************************/
    if (esNulo([$nombres, $apellidos, $email, $telefono, $dni, $usuario, $password, $repassword])) {
        $errors[] = "Debe llenar todos los campos.";
    }

    if (!esEmail($email)) {
        $errors[] = "La dirección de correo no es válida.";
    }


    if (!validaPassword($password, $repassword)) {
        $errors[] = "Las contraseñas no coinciden.";
    }

    if (usuarioExiste($usuario, $con)) {
        $errors[] = "El nombre de usuaruio $usuario ya existe.";
    }

    if (emailExiste($email, $con)) {
        $errors[] = "El correo electrónico $email ya existe.";
    }

    /*****************************Fin de llamado de las funciones de validación****************/
    if (count($errors) == 0) {

        $id = registraCliente([$nombres, $apellidos, $email, $telefono, $dni], $con);

        if ($id > 0) {
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);
            $token = generarToken();
            if (!registraUsuario([$usuario, $pass_hash, $token, $id], $con)) {
                $errors[] = "Error al registrar usuario";
            }
        } else {
            $errors[] = "Error al registrar cliente";
        }
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
    <link rel="shortcut icon" href="img/papeleria.png" type="image/x-icon">
    <title>Papelería 2B | Registro Cliente</title>
</head>

<body>
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="inicio.php" class="navbar-brand">
                    <strong>Papelería 2B</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="contacto.php" class="nav-link active">|&nbsp&nbsp&nbspAcerca de Nosotros</a>
                        </li>
                    </ul>
                    <a href="checkout.php" class="btn btn-primary" ml-3>
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span>
                        <span id="num_cart" class="badge bg-secondary">
                            <?php echo $num_cart; ?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Datos del cliente</h2>

            <?php mostrarMensajes($errors); ?>

            <form class="row g-3" action="registro.php" method="post" autocomplete="off">
                <div class="col-md-6">
                    <label for="nombres"><span class="text-danger">*</span>Nombres</label>
                    <input type="text" name="nombres" id="nombres" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="apellidos"><span class="text-danger">*</span>Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="email"><span class="text-danger">*</span>Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <span id="validaEmail" class="text-danger"></span>
                </div>
                <div class="col-md-6">
                    <label for="telefono"><span class="text-danger">*</span>Teléfono</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="dni"><span class="text-danger">*</span>DNI</label>
                    <input type="text" name="dni" id="dni" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="usuario"><span class="text-danger">*</span>Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control">
                    <span id="validaUsuario" class="text-danger"></span>
                </div>
                <div class="col-md-6">
                    <label for="password"><span class="text-danger">*</span>Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="repassword"><span class="text-danger">*</span>Repetir Contraseña</label>
                    <input type="password" name="repassword" id="repassword" class="form-control">
                </div>

                <i><b>Nota:</b>Los campos con asterisco son obligatorios.</i>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </main>
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

        .cerrar {
            margin-right: 15px;
        }
    </style>
    <!----------------------------------Fin-Estilos-CSS---------------------------------------------->
    <!------------------------------Implementacion-burbuja-del-bot---------------------------------->
    <div>
        <a href="bot.php" class="button">
            <img src="img/bot-conversacional.png" class="imgd">
        </a>
    </div>
    <br>
    <!-------------------------------------Fin-Burbuja-Bot------------------------------------------>
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
                margin-top 5px
            }

            .vendidos {
                margin-top: 10px
            }
        </style>
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="p" href="#">Papelería 2B</a>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <h3>Ubicación</h3>
            <br>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3747.1749394391463!2d-98.77389526054579!3d20.08497270349567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1a1d7c0f1cfa3%3A0x122870c3429e18a8!2sInstituto%20Tecnol%C3%B3gico%20de%20Pachuca%20(ITP)!5e0!3m2!1ses-419!2smx!4v1669167102410!5m2!1ses-419!2smx"
                width="700" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            </script>
            <br>
            <div>Teléfonos</div>
            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#" role="button" target="_blank"><i
                    class="fa-solid fa-phone"></i>&nbsp&nbsp7713661637</a>
            <a class="btn btn-outline-light btn-floating m-1" href="#" role="button" target="_blank"><i
                    class="fa-solid fa-phone"></i>&nbsp&nbsp7711063978</a>
        </div>
        </div>
        <!-- Copyright -->
    </footer>

    <!-----------------------------------------Script-Bootstrap--------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <script>
        let txtUsuario = document.getElementById('usuario')
            txtUsuario.addEventListener("blur", function(){
                existeUsuario(txtUsuario.value)
            }, false)

            function existeUsuario(usuario){
                let url = "clases/clienteAjax.php"
                let formData = new FormData()
                formData.append("action", "existeUsuario")
                formData.append("usuario", usuario)


                fetch(url, {
                    method: 'POST',
                    body: formData
                }).then(response => response.json())
                .then(data => {
                    if(data.ok){
                        document.getElementById('usuario').value = ''
                        document.getElementById('validaUsuario').innerHTML = 'Usuario no disponible'
                    }else{
                        document.getElementById('validaUsuario').innerHTML = ''
                    }
                })
            }


            

            let txtEmail = document.getElementById('email')
            txtEmail.addEventListener("blur", function(){
                existeEmail(txtEmail.value)
            }, false)

            function existeEmail(email){
                let url = "clases/clienteAjax.php"
                let formData = new FormData()
                formData.append("action", "existeEmail")
                formData.append("email", email)


                fetch(url, {
                    method: 'POST',
                    body: formData
                }).then(response => response.json())
                .then(data => {
                    if(data.ok){
                        document.getElementById('email').value = ''
                        document.getElementById('validaEmail').innerHTML = 'Email no disponible'
                    }else{
                        document.getElementById('validaEmail').innerHTML = ''
                    }
                })
            }
    </script>
    <!--------------------------------------Fin-Script-Bootstrap------------------------------------->

</body>

</html>