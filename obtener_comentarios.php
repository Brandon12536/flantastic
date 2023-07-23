<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = "SELECT id, nombre, comentario, estrellas FROM comentarios ORDER BY id ASC";
$result = $con->query($sql);

if (!$result) {
  echo "<tr><td colspan='4'>Error al ejecutar la consulta.</td></tr>";
} else if ($result->rowCount() == 0) {
  echo "<tr><td colspan='4'>No hay comentarios.</td></tr>";
} else {
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    if (!isset($row["id"]) || !isset($row["nombre"]) || !isset($row["comentario"]) || !isset($row["estrellas"])) {
      echo "<tr><td colspan='4'>Error al leer los resultados.</td></tr>";
      break;
    }
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["comentario"] . "</td><td>" . $row["estrellas"] . "</td></tr>";
  }
}

$con = null;
?>
