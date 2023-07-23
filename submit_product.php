<?php
require 'config/config.php';
require 'config/database.php';

$db = new Database();
$con = $db->conectar();

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$id_categoria = $_POST['id_categoria'];
$activo = $_POST['activo'];
$stock = $_POST['stock'];

// Inserta el producto en la base de datos
$sql = "INSERT INTO productos (nombre, descripcion, precio, descuento, id_categoria, activo, stock)
          VALUES (:nombre, :descripcion, :precio, :descuento, :id_categoria, :activo, :stock)";
$sentencia = $con->prepare($sql);
$sentencia->bindValue(':nombre', $nombre);
$sentencia->bindValue(':descripcion', $descripcion);
$sentencia->bindValue(':precio', $precio);
$sentencia->bindValue(':descuento', $descuento);
$sentencia->bindValue(':id_categoria', $id_categoria);
$sentencia->bindValue(':activo', $activo);
$sentencia->bindValue(':stock', $stock);
$sentencia->execute();

if ($sentencia->rowCount() > 0) {
    // Mensaje de éxito
    $_SESSION['message'] = 'Producto almacenado correctamente.';
    // Redireccionar al usuario
    header('Location: inicio.php');
  } else {
    // Mensaje de error
    $_SESSION['message'] = 'Error al guardar el producto.';
    // Redireccionar al usuario
    header('Location: inicio.php');
  }
?>

