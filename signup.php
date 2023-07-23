<?php
require 'config/database.php';

$message = '';
$db = new Database();
$conn = $db->conectar();

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {

    // Verificar que la contraseña y la confirmación coinciden
    if ($_POST['password'] != $_POST['confirm_password']) {
        $message = 'Las contraseñas no coinciden, por favor inténtalo de nuevo';
    } else {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Usuario registrado exitosamente';
        } else {
            $message = 'Lo sentimos, hubo un problema al crear su cuenta';
        }
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
    <title>FlanTastic | Regístrate</title>
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
        <h2>Regístrate</h2>
        <form action="signup.php" method="POST">
            <input placeholder="Correo electrónico" type="email" name="email" required>
            <input placeholder="Contraseña" type="password" name="password" required>
            <input placeholder="Confirma tu contraseña" type="password" name="confirm_password" required>
            <br>
            <button type="submit" name="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path
                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd"
                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg> Registrarse</button> &nbsp;&nbsp;&nbsp;&nbsp;ó &nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php">Iniciar Sesión</a>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <?php require 'components/footer.php' ?>
</body>

</html>