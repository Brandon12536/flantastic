<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <script
        src="https://www.paypal.com/sdk/js?client-id=AZ_yg7Rk-UsPbMDG1CQG9ArqJka5U8kTnOxonDFL8ZrJwBg3-GZEmYe9rcFVeH5wkkOVZTPcnLmhozMq&currency=MXN"
        data-sdk-integration-source="button-factory"></script>
    <title>Document</title>
</head>

<body>

    <div id="paypal-button-container"></div>


    <!-----------------------------------Inicio-Scripts-Paypal---------------------------------------->

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
                        "amount": {
                            value: 100
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                actions.order.capture().then(function (detalles) {
                    window.location.href='completado.html'
                });
            },

            onCancel: function (data) {
                alert('Pago cancelado')
                console.log(data)
            }
        }).render('#paypal-button-container')
    </script>
    <!--<script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>-->

    <!--------------------------------------Fin-Scripts-Paypal---------------------------------------->
</body>

</html>