<?php
    require 'vendor/autoload.php';

    MercadoPago\SDK::setAccessToken('TEST-1348670563831910-091720-3ad5c28a7299da25783e93f1d1104eaf-681340044');
    $preference = new  MercadoPago\Preference();

    $item = new MercadoPago\Item();
    $item->id = '0001';
    $item->title = 'Producto CDP';
    $item->quantity = 1;
    $item->unit_price = 150.00;
    $item->currency_id = "MXN";


    $preference->items = array($item);

    $preference->back_urls = array(
        "success" => "http://localhost/flantastic/captura.php", 
        "failure" => "http://localhost/flantastic/fallo.php" 
    ); 

    $preference->auto_return = "approved";
    $preference->binary_mode = true;
    echo "<h3>Pago exitoso</h3>";

    $preference->save();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlanTastic | Mercado Pago</title>

<script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
    <h3>Mercado Pago</h3>
    <div class="checkout_btn"></div>



    <script>
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

</body>
</html>