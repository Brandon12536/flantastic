
<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

/*$id = base64_decode($_GET['id']);
$sql = "DELETE FROM productos2 WHERE id=$id";
$datos = $con->query($sql);*/
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $con->query(" DELETE FROM productos WHERE id=$id");
    $articulo = $sql->fetchAll(PDO::FETCH_ASSOC);
}
//******************Redirección luego de borrar el regístro************************************
header("location:inicio.php");
?>
