<?php
//Cifra información para que no pueda ser alterada por terceros
    define("CLIENT_ID", "AZ_yg7Rk-UsPbMDG1CQG9ArqJka5U8kTnOxonDFL8ZrJwBg3-GZEmYe9rcFVeH5wkkOVZTPcnLmhozMq");
    define("TOKEN_MP", "TEST-1348670563831910-091720-3ad5c28a7299da25783e93f1d1104eaf-681340044");
    define("CURRENCY", "MXN");
    define("KEY_TOKEN", "FlanTastic.");
    //Tipo de moneda MXN
    define("MONEDA", "$");

    session_start();

    $num_cart = 0;

    if(isset($_SESSION['carrito']['productos'])){
        $num_cart = count($_SESSION['carrito']['productos']);
    }
?>