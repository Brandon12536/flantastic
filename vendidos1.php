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
/*if (isset($_GET['enviar'])) {
$busqueda = $_GET['busqueda'];
$sql = $con->query(" SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'");
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
}*/
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
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
    <title>FlanTastic | Productos más vendidos</title>
</head>

<body>

    <?php require 'components/header1.php' ?>
    <article>
        <br>
        <h2 class="text-center">Productos más vendidos</h2>
        <br>
        <?php
        try {
            $query = "SELECT nombre, cantidad
        FROM detalle_compra
        ORDER BY cantidad DESC
        LIMIT 10";

            $sql = $con->prepare($query);
            $sql->execute();
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>

        <div class="container">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Nombre del Producto</th>
                        <th class="text-center">Cantidad Vendida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $fila): ?>
                    <tr>
                        <td>
                            <?php echo $fila['nombre']; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $fila['cantidad']; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </article>
    <br>
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
    <?php require 'components/footer1.php' ?>
</body>

</html>