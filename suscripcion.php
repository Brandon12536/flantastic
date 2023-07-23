<!DOCTYPE html>
<html lang="en">

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
    <title>FlanTastic | Método Suscripción</title>
</head>

<body>
    <?php require 'components/header.php' ?>

    <br>
    <h4 class="text-center">Elige la suscripción que más te convenga.</h4>
    <center>
        <div class="container row">
            <div class="card">
                <img src="img/plan.gif" class="card-img-top" height="240" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Plan Sencillo</h5>
                    <p class="card-text">
                        <img src="img/marca-de-verificacion.png" width="20px" height="20px"> Descuentos del 5% en varios productos.
                        <br>
                        <img src="img/cruz.png" width="17px" height="17px"> Atención al cliente en menos de 24 hrs. <br>
                        <img src="img/cruz.png" width="20px" height="20px"> Promociones exclusivas cada mes.
                    </p>
                    <a href="#!" class="btn btn-outline-success enlace">Comprar</a>
                    <a href="#!" class="btn btn-outline-danger enlace">Anular Suscripción</a>
                </div>
            </div>

            <div class="card">
                <img src="img/plan2.gif" class="card-img-top" height="240" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Plan Exclusivo</h5>
                    <p class="card-text">
                        <img src="img/marca-de-verificacion.png" width="20px" height="20px"> Descuentos del 10% en varios productos.
                        <br>
                        <img src="img/marca-de-verificacion.png" width="20px" height="20px"> Atención al cliente en menos de 24 hrs.
                        <br>
                        <img src="img/cruz.png" width="20px" height="20px"> Promociones exclusivas cada mes.
                    </p>
                    <a href="#!" class="btn btn-outline-primary enlace">Comprar</a>
                    <a href="#!" class="btn btn-outline-danger enlace">Anular Suscripción</a>
                </div>

            </div>
            <div class="card">
                <img src="img/plan3.gif" class="card-img-top" height="240" alt="" />
                <div class="card-body">
                    <h5 class="card-title">Plan Exótico</h5>
                    <p class="card-text">
                        <img src="img/marca-de-verificacion.png" width="20px" height="20px"> Descuentos del 15% en varios productos.
                        <br>
                        <img src="img/marca-de-verificacion.png" width="20px" height="20px"> Atención al cliente en menos de 24 hrs.
                        <br>
                        <img src="img/marca-de-verificacion.png" width="20px" height="20px"> Promociones exclusivas cada mes.
                    </p>
                    <a href="#!" class="btn btn-outline-dark enlace">Comprar</a>
                    <a href="#!" class="btn btn-outline-danger enlace">Anular Suscripción</a>
                </div>
            </div>
        </div>
    </center>
    <br>
    <!---------------------------------------------Pie-De-Página--------------------------------------->
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

        .card {
            max-width: 350px;
            margin-top: 40px;
            margin-left: 15px;
            text-align: left;
        }

        .enlace {
            margin-right: 8px;
            margin-left: 6px;
        }

        nav {
            /*margin-top: 0.4pt;*/
            border-color: grey;

        }

        hr {
            margin-top: 0pt;
            margin-bottom: 0pt;
            border-color: black;
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