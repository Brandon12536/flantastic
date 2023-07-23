<?php
	session_start();
	session_destroy();
	
	// Redirige a la página de inicio
	header('Location: index.php?logout=true');
	exit();
?>
