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
    <title>FlanTastic | Desarrollador</title>
</head>

<body>
    <?php require 'components/header1.php'?>
    <br>
    <div class="container imagen-des">
        <img src="img/20211126_071359.jpg" alt="Desarrollador" style="max-width: 100%; max-height: 200px; border-radius: 120px;">
    </div>

    <div class="card-horizontal shadow">
        <div class="card-content">
            <h2>Desarrollador de la aplicación web: </h2>
            <p>Brandon Pérez Reyes</p>
        </div>
    </div>
    <div class="container text-center">
        <a href="https://brandonperez.online/" target="_blank" class="rgb-button p2">Conoce más aquí.</a>
    </div>


    <style>
        .p2{
            text-decoration: none;
            color: black;
        }
        .imagen-des {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-horizontal {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            max-width: 500px;
            height: 100px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .card-content {
            margin: 0 20px;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
        }

        p {
            font-size: 18px;
        }

        @media only screen and (max-width: 600px) {
            .card-horizontal {
                height: auto;
                flex-direction: column;
            }
        }

        /* Estilos para el botón */
        .rgb-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #000000;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 50px;
            border: 5px solid white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: border-color 0.3s ease-in-out;
            position: relative;
            /* Agregar posición relativa para los elementos hijos */
        }

        /* Estilos para el borde con efecto RGB */
        .rgb-button::before {
            content: "";
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            z-index: -1;
            background: linear-gradient(to right, #f00, #ff0, #0f0, #0ff, #00f, #f0f, #f00);
            background-size: 1000% 1000%;
            animation: rgb-border 10s linear infinite;
            border-radius: 50px;
        }

        /* Animación para el borde con efecto RGB */
        @keyframes rgb-border {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
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
    </style>
    <br>
    <?php require 'components/footer1.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js"></script>
</body>

</html>