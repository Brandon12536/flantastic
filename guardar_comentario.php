<?php
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

if (isset($_POST["name"]) && isset($_POST["comment"]) && isset($_POST["stars"])) {
  $name = $_POST["name"];
  $comment = $_POST["comment"];
  $stars = $_POST["stars"];

  $stmt = $con->prepare("INSERT INTO comentarios (nombre, comentario, estrellas) VALUES (?, ?, ?)");
  $stmt->bindParam(1, $name);
  $stmt->bindParam(2, $comment);
  $stmt->bindParam(3, $stars);

  if ($stmt->execute()) {
    $comment_id = $con->lastInsertId();

    echo "<tr><td>" . $comment_id . "</td><td>" . $name . "</td><td>" . $comment . "</td><td>" . $stars . "</td></tr>";
  } else {
    echo "Error: " . $stmt->errorInfo()[2];
  }

  //$con->close();
} else {
  echo "Error: Faltan valores del formulario.";
}

