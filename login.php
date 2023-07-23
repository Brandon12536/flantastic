<?php
require 'config/database.php';
$db = new Database();
$conn = $db->conectar();
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: inicio.php');
}


if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: inicio.php");
    } else {
        $message = 'Las credenciales no coinciden, intenta de nuevo';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
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
    <link rel="shortcut icon" href="img/tuzotec.png" type="image/x-icon">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="shortcut icon" href="img/flantastic.png" type="image/x-icon">
    <title>FlanTastic | Iniciar Sesión</title>
</head>

<body>
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand tuzo">
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
                            <a href="#" class="nav-link active">|&nbsp&nbsp&nbspFórmulario</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <?php if (!empty($message)): ?>
    <p>
        <?= $message ?>
    </p>
    <?php endif; ?>

    <div class="formulario-container">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="POST">
            <input placeholder="Correo electrónico" type="email" name="email" required>
            <input placeholder="Contraseña" type="password" name="password" id="password-field" required>
            <label for="show-password">
                <input type="checkbox" id="show-password"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                    <path
                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                </svg>&nbsp;&nbsp;&nbsp;Mostrar contraseña
            </label>
            <br>
            <br>
            <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                    <path fill-rule="evenodd"
                        d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg> Ingresar</button> &nbsp;&nbsp;&nbsp;&nbsp;ó &nbsp;&nbsp;&nbsp;&nbsp;<a href="signup.php">Regístrate aquí</a>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <?php require 'components/footer.php' ?>
    <script>
        const passwordField = document.getElementById('password-field');
        const showPassword = document.getElementById('show-password');

        showPassword.addEventListener('click', function () {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>


</body>

</html>