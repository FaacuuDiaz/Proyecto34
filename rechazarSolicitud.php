<?php 
	include("connection.php");
	$link = connection();
	$e = $_GET['idHospedaje'];
	$idu = $_GET['idUsuario'];
	$consulta = "UPDATE solicitudes set estado='rechazada' WHERE id_hospedaje='$e' and id_usuario='$idu'";
	if(mysqli_query($link,$consulta)){
		echo "<script type='text/javascript'>alert('Se ha rechazado la solicitud'); </script>";
		echo $e; echo $idu;
	}
	else{
		echo "<script type='text/javascript'>alert('Un error ha ocurrido, no se pudo rechazar la solicitud'); </script>";
		
	}
	echo "<script type='text/javascript'>document.location=('misSolicitudesRecibidas.php'); </script>";


?>