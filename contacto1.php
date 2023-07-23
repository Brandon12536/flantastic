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

    <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles1.css">
    <title>FlanTastic | ¿Quiénes somos?</title>
</head>

<body>
    <?php require 'components/header1.php' ?>
    
    <header class="bg_animate">
        <div class="header_nav">
        </div>
        <section class="banner contenedor">
            <section class="banner_title">
                <p>Somos una empresa comprometida con la calidad, la satisfacción del cliente.</p>
            </section>
            <div class="banner_img">
                <img src="img/flantastico.png">
            </div>
        </section>
        <div class="burbujas">
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
            <div class="burbuja"></div>
        </div>
    </header>
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

            /* Para pantallas con un ancho menor o igual a 768px */
            @media (max-width: 768px) {
                .banner {
                    flex-direction: column;
                    /* Cambia la dirección de los elementos */
                    align-items: center;
                    /* Centra los elementos horizontalmente */
                }

                .banner_title {
                    text-align: center;
                    /* Centra el texto */
                    margin-top: 30px;
                    /* Agrega un margen superior */
                }

                .banner_img {
                    margin-top: 30px;
                    /* Agrega un margen superior */
                }
            }

            /* Para pantallas con un ancho mayor a 768px */
            @media (min-width: 769px) {
                .banner {
                    flex-direction: row;
                    /* Vuelve a la dirección original de los elementos */
                    justify-content: space-between;
                    /* Espacia los elementos horizontalmente */
                    align-items: center;
                    /* Centra los elementos verticalmente */
                }

                .banner_title {
                    text-align: left;
                    /* Alinea el texto a la izquierda */
                    margin-top: 0;
                    /* Quita el margen superior */
                    margin-right: 30px;
                    /* Agrega un margen derecho */
                }

                .banner_img {
                    margin-top: 0;
                    /* Quita el margen superior */
                }
            }
        </style>
       <?php require 'components/footer1.php' ?>
</body>

</html>