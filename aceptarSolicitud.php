<?php

	include("funciones.php");
	include("connection.php");
	$link = connection();
	$idu = $_GET['idUsuario'];
	$fe = $_GET['fd'];
	$fs = $_GET['fh'];
	$idHospedaje = $_GET['idHospedaje'];
	$consulta1 = "UPDATE solicitudes SET estado='aceptada' WHERE id_hospedaje=$idHospedaje and id_usuario=$idu";
	$consulta2 = "SELECT *FROM solicitudes WHERE id_hospedaje=$idHospedaje";
	$r1 = mysqli_query($link,$consulta1);
	if($r1){ 
		$r2 = mysqli_query($link,$consulta2);
		$a = 0;
		while($fila = mysqli_fetch_array($r2)){
			$fdBase = new dateTime($fila['fecha_entrada']);
			$fdBase = date_format($fdBase,"Y-m-d");
			$fhBase = new dateTime($fila['fecha_salida']);
			$fhBase = date_format($fhBase,"Y-m-d");

			if($fila['estado']=='pendiente' && (fechaIncluidaEntre($fdBase,$fe,$fs) || fechaIncluidaEntre($fhBase,$fe,$fs)) ) {
				$id = $fila['id_solicitud'];
				$consulta3 = "UPDATE solicitudes set estado='rechazada' WHERE id_solicitud='$id'";
				$r3 = mysqli_query($link, $consulta3);
				if($r3) $a++;
			}
		}
		
		echo "<script type='text/javascript'>alert('Se ha aceptado correctamente y rechazado automaticamente ".$a." solicitudes'); </script>";
	}
	else{
		echo "<script type='text/javascript'>alert('No se pudo realizar la operacion'); </script>";
	}
	
		echo "<script type='text/javascript'>document.location=('misSolicitudesRecibidas.php'); </script>";
?>

