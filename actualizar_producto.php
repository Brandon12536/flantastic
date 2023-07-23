<?php
    // Incluir archivo de configuración de la base de datos
    require 'config/database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new Database();
        $con = $db->conectar();
        // Obtener los datos enviados por el formulario
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $descuento = $_POST['descuento'];
        $id_categoria = $_POST['id_categoria'];
        $stock = $_POST['stock'];
        $activo = $_POST['activo'];

        // Preparar la consulta SQL para actualizar el producto en la base de datos
        $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, descuento = :descuento, id_categoria = :id_categoria, activo = :activo, stock = :stock WHERE id = :id";

        // Preparar la sentencia
        $stmt = $con->prepare($sql);

        // Vincular los valores
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':descuento', $descuento);
        $stmt->bindParam(':id_categoria', $id_categoria);
        $stmt->bindParam(':activo', $activo);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':id', $id);

        // Ejecutar la consulta SQL
        if ($stmt->execute()) {
			echo "<script>swal('Producto actualizado exitosamente', '', 'success');</script>";
            header("Location: inicio.php");
            exit();
        } else {
			echo "<div class='container'><p class='alert alert-danger'>Error al actualizar el producto</p></div>";
        }

        // Cerrar la conexión a la base de datos
        //$db->cerrar();
    } else {
		echo "<div class='container'><p class='alert alert-danger'>Error al procesar la solicitud</p></div>";
    }
?>


  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

