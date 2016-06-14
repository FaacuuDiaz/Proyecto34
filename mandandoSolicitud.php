<?php
	session_start();
	include("connection.php");
	$id_hospedaje= $_POST['idh'];
	$id_solicitante= $_POST['idu'];
	$desc= $_POST['mensaje'];
	$desde= $_POST['fechaD'];
	$hasta= $_POST['fechaH'];
	$fecha_actual = date("Y-m-d");

	/*echo $id_hospedaje."----";
	echo $id_solicitante."----";
	echo $desc."----";
	echo $desde."----";
	echo $hasta."----";*/

	$link = connection();
	$consulta1 = "SELECT * FROM solicitudes where id_hospedaje='$id_hospedaje'";
	$result = mysqli_query($link,$consulta1);
	$ok = true;
	while($aux=mysqli_fetch_array($result)){
		if($aux['estado'] == "aceptada"){
			$f = new dateTime($aux['fecha_entrada']);
			$f = date_format($f,"Y-m-d");
			if(($f <= $desde ) || ($aux['fecha_salida'] >= $hasta )){
					$ok = false;
			}
		}
	}
	//echo $ok;
	
	if($ok){
		 $consulta2 ="INSERT INTO solicitudes(fecha_solicitud,fecha_entrada,fecha_salida,estado,descripcion,id_usuario,id_hospedaje)
 				VALUES('$fecha_actual','$desde','$hasta','pendiente','$desc','$id_solicitante','$id_hospedaje')";
 		if(mysqli_query($link,$consulta2)){ ?>
 			<script type="text/javascript"> alert ("La solicitud se ha enviado correctamente, puedes ver su estado en Mis Solicitudes!"); 
				window.location.href="detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>"; </script>
			<?php
 		}
 	}
 	else{ ?>
 			<script type="text/javascript"> alert ("El hospedaje esta ocupado  en las fechas solicitadas"); 
				window.location.href="mandarSolicitud.php?idh=<?php echo $id_hospedaje; ?>&idu=<?php echo $id_solicitante; ?>"; </script>
			<?php
 	}

?>