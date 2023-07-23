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
    <title>FlanTastic | Términos y Condiciones</title>
</head>

<body>
    <?php require 'components/header1.php' ?>
    <br>
    <h2 class="text-center">Términos y Condiciones</h2>
    <div class="container">
        <div class="card p-3 shadow-lg animate__animated animate__fadeIn">
            <div class="card-text">
                <p><strong>Uso permitido:</strong> Los flanes vendidos por nuestra empresa pueden ser consumidos sin
                    restricciones por parte del comprador, siempre y cuando se respeten los derechos de autor. Queda
                    estrictamente prohibida la modificación o reventa de los flanes.</p>
                <p><strong>Propiedad intelectual:</strong> El comprador reconoce que los flanes vendidos por nuestra
                    empresa pueden estar protegidos por derechos de autor, y garantizamos la originalidad de los mismos.
                    En caso de que un flan tenga derechos de autor, el comprador deberá obtener las licencias necesarias
                    para su comercialización.</p>
                <!--<p><strong>Garantía:</strong> Nuestra empresa garantiza la calidad y el sabor de los flanes vendidos por un período de 30 días a partir de la fecha de compra. Si un flan no cumple con las especificaciones de nuestra empresa, el comprador puede solicitar una reposición, un reemplazo o un reembolso.</p>-->
                <!--<p><strong>Devoluciones y reembolsos:</strong> Aceptamos devoluciones y ofrecemos reembolsos dentro de
                    los 30 días siguientes a la fecha de compra. Los flanes deben ser devueltos en su estado original y
                    en su empaque original, y el comprador debe presentar el comprobante de compra. Podemos establecer
                    restricciones adicionales según el tipo de flan.</p>-->
                <p><strong>Cambios y actualizaciones:</strong> Nos reservamos el derecho de modificar estos términos y
                    condiciones en cualquier momento sin previo aviso. También nos reservamos el derecho de modificar o
                    descontinuar cualquier tipo de flan en cualquier momento sin previo aviso.</p>
            </div>
        </div>
    </div>
    <br>
    <?php require 'components/footer1.php' ?>
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

        .cerrar {
            margin-right: 15px;
        }
    </style>

</body>

</html>