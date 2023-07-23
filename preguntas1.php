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
  <title>FlanTastic | Preguntas Frecuentes</title>
</head>

<body>
  <?php require 'components/header1.php' ?>

  <br>
  <!--<div class="container">
    <h3 class="text-center">Métodos de pago aceptados</h3>
    <hr>
    <div class="imagenes-pago">
      <img src="img/dinero.png" width="200">
      <img src="img/paypal.png" width="200">
      <img src="img/mercado-pago.png" width="200">
    </div>-->



  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center mb-5">Preguntas frecuentes</h1>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-12 col-md-4 mb-3">
        <button type="button" class="btn btn-primary btn-block faq-btn" data-category="envios">
          <i class="fas fa-shipping-fast mr-2"></i>&nbsp;Envíos
        </button>
      </div>
      <div class="col-12 col-md-4 mb-3">
        <button type="button" class="btn btn-primary btn-block faq-btn" data-category="entregas">
          <i class="fas fa-box mr-2"></i>&nbsp;Entregas
        </button>
      </div>
      <div class="col-12 col-md-4 mb-3">
        <button type="button" class="btn btn-primary btn-block faq-btn" data-category="seguridad">
          <i class="fas fa-shield-alt mr-2"></i>&nbsp;Seguridad
        </button>
      </div>
      <!--<div class="col-12 col-md-3 mb-3">
        <button type="button" class="btn btn-primary btn-block faq-btn" data-category="cuenta">
          <i class="fas fa-user mr-2"></i>Cuenta
        </button>
      </div>-->
    </div>

    <div class="row">
      <div class="col-12 col-md-8 mx-auto">
        <div class="accordion" id="faq-accordion">
          <div class="faq-answer faq-envios">
            <div class="card">
              <div class="card-header" id="envios-heading">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#envios-collapse"
                    aria-expanded="true" aria-controls="envios-collapse">
                    ¿Cuánto tardará mi envío en llegar?
                  </button>
                </h2>
              </div>

              <div id="envios-collapse" class="collapse show" aria-labelledby="envios-heading"
                data-parent="#faq-accordion">
                <div class="card-body">
                  Su envío tardará entre 3 y 5 días hábiles en llegar a su destino.
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="envios2-heading">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#envios2-collapse"
                    aria-expanded="true" aria-controls="envios2-collapse">
                    ¿Cómo puedo hacer un seguimiento de mi envío?
                  </button>
                </h2>
              </div>

              <div id="envios2-collapse" class="collapse" aria-labelledby="envios2-heading"
                data-parent="#faq-accordion">
                <div class="card-body">
                  Puede hacer un seguimiento de su envío ingresando el número de seguimiento en nuestro sitio web.
                </div>
              </div>
            </div>
          </div>
          <div class="faq-answer faq-entregas">
            <div class="card">
              <div class="card-header" id="entregas-heading">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#entregas-collapse"
                    aria-expanded="true" aria-controls="entregas-collapse">
                    ¿Puedo recibir mi entrega en una dirección diferente a la de mi domicilio?
                  </button>
                </h2>
              </div>

              <div id="entregas-collapse" class="collapse show" aria-labelledby="entregas-heading"
                data-parent="#faq-accordion">
                <div class="card-body">
                  Sí, puede ingresar una dirección diferente para recibir su entrega durante el proceso de compra.
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="entregas2-heading">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#entregas2-collapse"
                    aria-expanded="true" aria-controls="entregas2-collapse">
                    ¿Qué debo hacer si mi entrega llega dañada o incompleta?
                  </button>
                </h2>
              </div>

              <div id="entregas2-collapse" class="collapse" aria-labelledby="entregas2-heading"
                data-parent="#faq-accordion">
                <div class="card-body">
                  Si su entrega llega dañada o incompleta, contáctenos de inmediato para que podamos solucionar el
                  problema.
                </div>
              </div>
            </div>
          </div>

          <div class="faq-answer faq-seguridad">
            <div class="card">
              <div class="card-header" id="entregas-heading">
                <h2 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#entregas-collapse"
                    aria-expanded="true" aria-controls="entregas-collapse">
                    ¿Cómo puedo saber si una tienda online es segura?
                  </button>
                </h2>
              </div>

              <div id="entregas-collapse" class="collapse show" aria-labelledby="entregas-heading"
                data-parent="#faq-accordion">
                <div class="card-body">
                  <ul>
                    <li>Busque un certificado SSL válido (el sitio web debe comenzar con https:// en lugar de http://)
                    </li>
                    <li>Verifique si la tienda tiene una política de privacidad clara y concisa</li>
                  </ul>
                </div>
              </div>


              <div class="card">
                <div class="card-header" id="entregas2-heading">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#entregas2-collapse"
                      aria-expanded="true" aria-controls="entregas2-collapse">
                      ¿Es seguro ingresar mi información de pago en una tienda en línea?
                    </button>
                  </h2>
                </div>

                <div id="entregas2-collapse" class="collapse" aria-labelledby="entregas2-heading"
                  data-parent="#faq-accordion">
                  <div class="card-body">
                    <ul>
                      <li>Sí, si la tienda tiene un certificado SSL válido, lo que significa que la información que
                        envía está encriptada y segura.</li>
                      <li>También es importante verificar que la tienda utilice proveedores de pago confiables y
                        seguros.</li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--<div class="faq-answer faq-cuenta">
                <p>No hay preguntas frecuentes para la categoría de cuenta.</p>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
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
      .p1 {
        text-decoration: none;
        color: white;
      }

      .p1:hover {
        text-decoration: underline;
        color: white;
      }
    </style>
 
 <?php require 'components/footer1.php' ?>

  <script src="https://kit.fontawesome.com/12e9a9568f.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/preguntas.js"></script>
  <!--------------------------------------Fin-Script-Bootstrap------------------------------------->
</body>

</html>