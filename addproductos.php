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
    <title>FlanTastic | Registro Producto</title>
</head>

<body>

    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="inicio.php" class="navbar-brand tuzo">
                    <!--<img src="img/tuzotec.png" alt="" width="70" height="60"><br>-->
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
    <h3 class="text-center embed-responsive-container">Formulario de registro de productos</h3>
    <div class="formularioproductos">
        <main>
            <div class="container row">
                <form action="submit_product.php" method="post" onsubmit="return validarFormulario()">
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto"
                        class="form-control"><br><br>
                    <label for="descripcion">Descripción:</label><br>
                    <textarea id="descripcion" name="descripcion" placeholder="Ingresa una descripción"
                        class="form-control"></textarea><br><br>
                    <label for="precio">Precio:</label><br>
                    <input type="number" id="precio" name="precio" min="1" placeholder="Precio"
                        class="form-control"><br><br>
                    <label for="descuento">Descuento:</label><br>
                    <input type="number" id="descuento" name="descuento" min="0" max="15" placeholder="Descuento"
                        class="form-control"><br><br>
                    <label for="id_categoria">Categoría:</label><br>
                    <input type="number" id="id_categoria" name="id_categoria" min="1" max="1" placeholder="Categoría"
                        class="form-control"><br><br>
                    <label for="activo">Activo:</label><br>
                    <input type="number" id="activo" name="activo" min="0" max="1" placeholder="Activo o Inactivo "
                        class="form-control"><br><br>
                    <label for="stock">Stock:</label><br>
                    <input type="number" id="stock" name="stock" min="1" max="13" placeholder="Stock"
                        class="form-control" oninput="validarStock(this)"><br><br>
                    <input type="submit" value="Agregar producto" class="form-control btn btn-outline-primary btn-md">
                </form>
            </div>
        </main>
    </div>


    <style>
        main {
            margin-top: 3%;
            border-radius: 9px;
            border: none;
            width: 600px;
            height: 900px;
            background-color: #212529;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input {
            width: 322px;
        }

        textarea {
            width: 322px;
        }

        .formularioproductos {
            display: flex;
            justify-content: center;
            align-items: center;

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

        #imagenbg {
            margin-top 5px
        }

        .vendidos {
            margin-top: 10px
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
    <br>
    <br>
    <?php require 'components/footer.php' ?>
    <script>
        function validarFormulario() {
            var nombre = document.getElementById("nombre").value;
            var descripcion = document.getElementById("descripcion").value;
            var precio = document.getElementById("precio").value;
            var descuento = document.getElementById("descuento").value;
            var id_categoria = document.getElementById("id_categoria").value;
            var activo = document.getElementById("activo").value;

            if (nombre == "" || descripcion == "" || precio == "" || descuento == "" || id_categoria == "" || activo == "") {
                alert("Debe llenar todos los campos");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>