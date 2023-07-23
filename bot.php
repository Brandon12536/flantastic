<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- FAVICON -->
    <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
    <title>FlanTastic | Bot</title>
</head>

<body>
    
 <?php require 'components/header.php'?>
 <br>
 <br>
    <center>
    <div class="responsive-container">
        <div class="wrapper">
            <div class="title">FlanTastic</div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <img src="bot-conversacional.png" alt="" width="50px" height="50px" srcset="">
                    <!--<div class="icon">
                    <i class="fas fa-user"></i>
                </div>-->
                    <div class="msg-header">
                        <p>Hola, soy un Bot llamado FlanTastic, ¿En qué podemos ayudarle?</p>
                    </div>
                </div>
            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Escriba algo aquí.." required>
                    <button id="send-btn">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</center>
    <style>
        /*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}*/
        .botsito2b {
            display: grid;
            height: 100%;
            place-items: center;
            padding: 2%;
        }

        ::selection {
            color: #fff;
            background: #007bff;
        }

        ::-webkit-scrollbar {
            width: 3px;
            border-radius: 25px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #ddd;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ccc;
        }

        .wrapper {
            width: 370px;
            background: #fff;
            border-radius: 5px;
            border: 1px solid lightgrey;
            border-top: 0px;
        }

        .wrapper .title {
            background: #007bff;
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            line-height: 60px;
            text-align: center;
            border-bottom: 1px solid #006fe6;
            border-radius: 5px 5px 0 0;
        }

        .wrapper .form {
            padding: 20px 15px;
            min-height: 400px;
            max-height: 400px;
            overflow-y: auto;
        }

        .wrapper .form .inbox {
            width: 100%;
            display: flex;
            align-items: baseline;
        }

        .wrapper .form .user-inbox {
            justify-content: flex-end;
            margin: 13px 0;
        }

        .wrapper .form .inbox .icon {
            height: 40px;
            width: 40px;
            color: #fff;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            font-size: 18px;
            background: #007bff;
        }

        .wrapper .form .inbox .msg-header {
            max-width: 53%;
            margin-left: 10px;
        }

        .form .inbox .msg-header p {
            color: #fff;
            background: #007bff;
            border-radius: 10px;
            padding: 8px 10px;
            font-size: 14px;
            word-break: break-all;
        }

        .form .user-inbox .msg-header p {
            color: #333;
            background: #efefef;
        }

        .wrapper .typing-field {
            display: flex;
            height: 60px;
            width: 100%;
            align-items: center;
            justify-content: space-evenly;
            background: #efefef;
            border-top: 1px solid #d9d9d9;
            border-radius: 0 0 5px 5px;
        }

        .wrapper .typing-field .input-data {
            height: 40px;
            width: 335px;
            position: relative;
        }

        .wrapper .typing-field .input-data input {
            height: 100%;
            width: 100%;
            outline: none;
            border: 1px solid transparent;
            padding: 0 80px 0 15px;
            border-radius: 3px;
            font-size: 15px;
            background: #fff;
            transition: all 0.3s ease;
        }

        .typing-field .input-data input:focus {
            border-color: rgba(0, 123, 255, 0.8);
        }

        .input-data input::placeholder {
            color: #999999;
            transition: all 0.3s ease;
        }

        .input-data input:focus::placeholder {
            color: #bfbfbf;
        }

        .wrapper .typing-field .input-data button {
            position: absolute;
            right: 5px;
            top: 50%;
            height: 30px;
            width: 65px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            outline: none;
            opacity: 0;
            pointer-events: none;
            border-radius: 3px;
            background: #007bff;
            border: 1px solid #007bff;
            transform: translateY(-50%);
            transition: all 0.3s ease;
        }

        .wrapper .typing-field .input-data input:valid~button {
            opacity: 1;
            pointer-events: auto;
        }

        .typing-field .input-data button:hover {
            background: #006fef;
        }

        .p {
            text-decoration: none;
            color: white;
        }

        .p:hover {
            color: white;
        }
    </style>
    <script>
        $(document).ready(function () {
            $("#send-btn").on("click", function () {
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');

                // iniciar el código ajax
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text=' + $value,
                    success: function (result) {
                        $replay = '<div class="bot-inbox inbox"><img src="bot-conversacional.png" alt="" width="50px" height="50px"srcset=""><div class="msg-header"><p>' + result + '</p></div></div>';
                        $(".form").append($replay);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    <br>
    <br>
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
    <?php require 'components/footer.php' ?>
</body>

</html>