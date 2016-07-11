<?php

	include("funciones.php");
	include("connection.php");
	$link = connection();
	$idu = $_GET['idUsuario'];
	$fe = $_GET['fd'];
	$fs = $_GET['fh'];
	$idHospedaje = $_GET['idHospedaje'];
	$fecha_actual = date("Y-m-d");
	$consulta1 = "UPDATE solicitudes SET estado='aceptada', fecha_solicitud='$fecha_actual' WHERE id_hospedaje=$idHospedaje and id_usuario=$idu";
	$consulta2 = "SELECT *FROM solicitudes WHERE id_hospedaje=$idHospedaje";
	$aux1 = "SELECT * FROM usuario WHERE id_usuario=$idu";
	$aux2 = "SELECT u.tel,u.email, h.titulo, u.nick, h.id_hospedaje FROM usuario u INNER JOIN hospedaje h ON h.idusuario=u.id_usuario WHERE id_hospedaje=$idHospedaje";
	$result1 = mysqli_query($link,$aux1);
	$result2 = mysqli_query($link,$aux2);
	$filaSolic = mysqli_fetch_array($result1);
	$filaDueno = mysqli_fetch_array($result2);

	$nombreHosp = $filaDueno['titulo'];
	$emailDue=$filaDueno['email'];
	$emailSol=$filaSolic['email'];
	$telDue=$filaDueno['tel'];
	$telSol=$filaSolic['tel'];
	$enlace= "http://localhost/detalleHospedaje.php?id=";
	$enlace.=$idHospedaje;
	$nick = $filaSolic['nick'];

		$dir = "./mensaje/Mensaje-para-solicitante-".$filaSolic['nick'].".txt";
		$archivo1=fopen($dir,"a");
		$text="Tu solicitud en el hospedaje $nombreHosp ha sido aceptado! \r\nAhora puedes comunicarte con el dueño, su direccion de correo electronica es $emailDue y su telefono es $telDue .\r\n Aqui tienes un link del hospedaje en cuestion $enlace ";
		fwrite($archivo1,$text);


	$dir2 = "./mensaje/Mensaje-para-dueno-de-Hospedaje- ".$filaDueno['nick'].".txt";
		$archivo2=fopen($dir2,"a");
		$text2="Has aceptado la solicitud de $nick ya puedes comunicarte con el\r\n su direccion de correo electronico es $emailSol y su telefono es $telSol \r\n Aqui tienes un link del hospedaje en cuestion $enlace ";
		fwrite($archivo2,$text2);

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

