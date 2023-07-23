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
    <!----------------------------------------FAVICON--------------------------------------------->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
    <title>FlanTastic | Modificar Producto</title>
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

    <div class="container">
        <h2>Modificar Producto</h2>
        <form action="actualizar_producto.php" method="post">
            <?php
            // Incluir archivo de configuración de la base de datos
            require 'config/database.php';
            $db = new Database();
            $con = $db->conectar();
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];
                // Consultar la información del producto en la base de datos
                $sql = "SELECT * FROM productos WHERE id = $id";
                $resultado = $con->query($sql);
                $campo = $resultado->fetch(PDO::FETCH_ASSOC);
            } else {
                echo "Error";
            }
            ?>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="<?php echo isset($campo['nombre']) ? $campo['nombre'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion"
                    name="descripcion"><?php echo isset($campo['descripcion']) ? $campo['descripcion'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio"
                    value="<?php echo isset($campo['precio']) ? $campo['precio'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="descuento">Descuento:</label>
                <select class="form-control" id="descuento" name="descuento">
                    <option value="0" <?php if (isset($campo['descuento']) && $campo['descuento'] == 0)
                        echo 'selected'; ?>>0%</option>
                    <option value="5" <?php if (isset($campo['descuento']) && $campo['descuento'] == 5)
                        echo 'selected'; ?>>5%</option>
                    <option value="10" <?php if (isset($campo['descuento']) && $campo['descuento'] == 10)
                        echo 'selected'; ?>>10%</option>
                    <option value="15" <?php if (isset($campo['descuento']) && $campo['descuento'] == 15)
                        echo 'selected'; ?>>15%</option>
                    <option value="20" <?php if (isset($campo['descuento']) && $campo['descuento'] == 10)
                        echo 'selected'; ?>>20%</option>
                    <option value="25" <?php if (isset($campo['descuento']) && $campo['descuento'] == 10)
                        echo 'selected'; ?>>25%</option>
                </select>
            </div>
            <div class="form-group">
                <label for="id_categoria">Categoría:</label>
                <select class="form-control" id="id_categoria" name="id_categoria">
                    <option value="1" <?php if (isset($campo['id_categoria']) && $campo['id_categoria'] == 1)
                        echo 'selected'; ?>>Categoría 1</option>
                </select>
            </div>
            <div class="form-group">
                <label for="activo">Activo:</label>
                <select class="form-control" id="activo" name="activo">
                    <option value="1" <?php if (isset($campo['activo']) && $campo['activo'] == 1)
                        echo 'selected'; ?>>Sí
                    </option>
                    <option value="0" <?php if (isset($campo['activo']) && $campo['activo'] == 0)
                        echo 'selected'; ?>>No
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" min="1" max="13"
                    value="<?php echo isset($campo['stock']) ? $campo['stock'] : ''; ?>">
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <br>
            <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path
                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd"
                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>&nbsp;Actualizar</button>&nbsp;&nbsp;
            <a href="inicio.php" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                </svg> &nbsp;Cancelar</a>
        </form>
    </div>

    <br>
    <?php require 'components/footer.php' ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>