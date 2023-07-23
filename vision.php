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
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles1.css">
    <title>FlanTastic | Visión</title>
</head>

<body>
    <?php require 'components/header.php' ?>
    <br>
    <div class="container">
        <div class="card-vision animacion">
            <h3 class="text-center">Visión</h3>
            <p class="vision">Ser la tienda de referencia en la venta de productos TuzoTec, ofreciendo una amplia
                variedad de artículos de alta calidad y diseño innovador que destaquen por su creatividad y
                originalidad. Queremos consolidarnos como una empresa líder en el mercado, reconocida por nuestra
                excelencia en el servicio al cliente y la calidad de nuestros productos, y ser una fuente de orgullo
                para la comunidad TuzoTec. Además, aspiramos a expandir nuestro alcance y ofrecer nuestros productos en
                línea a nivel nacional e internacional.
            </p>
        </div>
        <!--<div class="logo-mision" >
            <img src="img/flantastic.png" alt="">
        </div>-->
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
            margin-top 5px
        }

        .vendidos {
            margin-top: 10px
        }

        .vision {
            text-align: justify;
            font-size: 19px;
            opacity: 0;
            position: relative;
            animation: aparecer 1s ease-out forwards;
        }

        @keyframes aparecer {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-vision {
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
            border-radius: 4px;
            padding: 24px;
            max-width: 800px;
            margin: 0 auto;
            /* border: 4px solid;
                border-radius: 4px;
                animation: animacion-borde 3s ease-in-out infinite;*/
        }

        /* @keyframes animacion-borde {
                0% {
                    border-color: #f00;
                }

                25% {
                    border-color: #0f0;
                }

                50% {
                    border-color: #00f;
                }

                75% {
                    border-color: #ff0;
                }

                100% {
                    border-color: #f00;
                }
            }*/

        .logo-mision {
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
    <?php require 'components/footer.php' ?>
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