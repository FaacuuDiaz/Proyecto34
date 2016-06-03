<?php
	require_once('connection.php'); 
	$idImagen = $_GET['id']; 
	$con=connection();
	$result = mysqli_query($con,"Select * from hospedaje where id_hospedaje = $idImagen");	
	$imagen =  mysqli_fetch_assoc($result);
	$fileExtension = substr(strrchr($imagen['tipo_foto'], '/'), 1);
	$contenido = $imagen['foto'];
	header("Content-type:$fileExtension");
	print $contenido;
	mysqli_close($con);
?>