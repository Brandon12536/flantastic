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
    <link rel="shortcut icon" href="img/tuzotec.png" type="image/x-icon">
    <title>TuzoTec | Aviso de Privacidad</title>
</head>

<body>
    <?php require 'components/header.php' ?>
    <br>
    <div class="container">
        <div style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); padding: 20px; border-radius: 5px;">
            <h2 style="text-align: center;">Aviso de privacidad</h2>
            <p style="text-align: justify;">El presente Aviso de Privacidad establece los términos en que FlanTastic usa
                y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web.</p>
            <p style="text-align: justify;">Esta empresa está comprometida con la seguridad de los datos de sus
                usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser
                identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento.
            </p>
            <p style="text-align: justify;">Sin embargo, este Aviso de Privacidad puede cambiar con el tiempo o ser
                actualizado, por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse
                de que está de acuerdo con dichos cambios.</p>
            <h3 style="text-align: center;">Información recopilada</h3>
            <p style="text-align: justify;">Nuestro sitio web podrá recopilar información personal, por ejemplo, Nombre,
                información de contacto como su dirección de correo electrónico e información demográfica. Asimismo,
                cuando sea necesario, podrá ser requerida información específica para procesar algún pedido o realizar
                una entrega o facturación.</p>
            <h3 style="text-align: center;">Uso de la información recopilada</h3>
            <p style="text-align: justify;">FlanTastic emplea la información con el fin de proporcionar el mejor
                servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique,
                y mejorar nuestros productos y servicios.</p>
            <p style="text-align: justify;">Esta información es confidencial y no será compartida con terceros, salvo
                que sea requerido por un juez con una orden judicial.</p>
        </div>

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