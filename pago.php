<?php
require 'config/config.php';
require 'config/database.php';
require 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken(TOKEN_MP);

$preference = new MercadoPago\Preference();
$productos_mp = array();

$db = new Database();
$con = $db->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

//print_r($_SESSION);

$lista_carrito = array();

if ($productos != null) {
    foreach ($productos as $clave => $cantidad) {

        $sql = $con->prepare("SELECT id, nombre, precio, descuento,  $cantidad AS cantidad FROM productos WHERE 
            id=? AND activo=1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("Location: inicio.php");
    exit;
}
//elimina manualmente productos del carrito
//session_destroy();

//print_r($_SESSION);
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
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
    <title>FlanTastic | Pago</title>

    <script
        src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"></script>
    <!--Configuración de moneda MXN-->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body>
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="inicio.php" class="navbar-brand tuzo">
                    <img src="img/flantastic.png" alt="FlanTastic" width="70" height="60"><br>
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

                    <a href="#" class="btn btn-primary">
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span><span id="num_cart" class="badge bg-secondary">
                            <?php echo $num_cart; ?>
                        </span>
                    </a>
                    &nbsp&nbsp&nbsp
                    <!------------------------------Salir------------------------------>
                    <span class=" cerrar nav-item">
                        <button class="btn btn-outline-secondary" onclick="logout()">
                            <span class="material-symbols-outlined">
                                logout
                            </span>Salir
                        </button>
                    </span>
                    <!------------------------------Salir------------------------------>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h4>Detalles de pago</h4>
                    <div class="row">
                        <div class="col-12">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="checkout_btn"></div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-12">
                            <a href="ticket.php" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="59" height="16" fill="currentColor" class="bi bi-currency-dollar"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                                </svg>Pagar en Efectivo</a>
                        </div>
                    </div>
                </div>




                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($lista_carrito == null) {
                                    echo '<tr><td colspan="5" class="text-center"><b>El carrito esta vacío</b></td></tr>';
                                } else {
                                    $total = 0;
                                    foreach ($lista_carrito as $producto) {
                                        $_id = $producto['id'];
                                        $nombre = $producto['nombre'];
                                        $precio = $producto['precio'];
                                        $descuento = $producto['descuento'];
                                        $cantidad = $producto['cantidad'];
                                        $precio_desc = $precio - (($precio * $descuento) / 100);
                                        $subtotal = $cantidad * $precio_desc;
                                        $total += $subtotal;



                                        $item = new MercadoPago\Item();
                                        $item->id = $_id;
                                        $item->title = $nombre;
                                        $item->quantity = $cantidad;
                                        $item->unit_price = $precio_desc;
                                        $item->currency_id = "MXN";


                                        array_push($productos_mp, $item);
                                        unset($item);
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $nombre; ?>
                                            </td>
                                            <td>
                                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                                                    <?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="2">
                                            <p class="h3 text-end" id="total">
                                                <?php echo MONEDA . number_format($total, 2, '.', ','); ?>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </main>

    <?php
    $preference->items = $productos_mp;
    $preference->back_urls = array(
        "success" => "http://localhost/flantastic/captura.php",
        "failure" => "http://localhost/flantastic/fallo.php"
    );
    $preference->auto_return = "approved";
    $preference->binary_mode = true;

    $preference->save();
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY; ?>"
        data-sdk-integration-source="button-factory"></script>
    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total; ?>
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                let URL = 'clases/captura.php'
                actions.order.capture().then(function (detalles) {

                    console.log(detalles)

                    let url = 'clases/captura.php'

                    return fetch(url, {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            detalles: detalles
                        })
                    }).then(function (response) {
                        window.location.href = "completado.php?key=" + detalles['id'];
                    })
                });
            },
            onCancel: function (data) {
                alert("Pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');

        //boton MP
        const mp = new MercadoPago('TEST-3f5e74b2-e9bc-4513-9c44-4c70f4f7e133', {
            locale: 'es-MX'
        });

        mp.checkout({
            preference: {
                id: '<?php echo $preference->id; ?>'
            },
            render: {
                container: '.checkout_btn',
                label: 'Pagar con Mercado Pago'
            }
        })
    </script>
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