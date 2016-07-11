<?php
	session_start();
	include("connection.php");
	include("funciones.php");
	$id_hospedaje= $_POST['idh'];
	$id_solicitante= $_POST['idu'];
	$desc= $_POST['mensaje'];
	$desde= new dateTime($_POST['fechaD']); 
	$desde = date_format($desde, "Y-m-d");
	$hasta= new dateTime($_POST['fechaH']); 
	$hasta = date_format($hasta,"Y-m-d");
	$fecha_actual = date("Y-m-d");

	/*echo $id_hospedaje."----";
	echo $id_solicitante."----";
	echo $desc."----";
	echo $desde."----";
	echo $hasta."----";
	(fechaIncluidaEntre($fdBase,$fe,$fs) || fechaIncluidaEntre($fhBase,$fe,$fs)) ) {*/

	$link = connection();
	$consulta1 = "SELECT * FROM solicitudes where id_hospedaje='$id_hospedaje'";
	$result = mysqli_query($link,$consulta1);
	$ok = true;
	while($aux=mysqli_fetch_array($result)){
		if($aux['estado'] == "aceptada"){
			$fe = new dateTime($aux['fecha_entrada']);
			$fe = date_format($fe,"Y-m-d");
			$fs = new dateTime($aux['fecha_salida']);
			$fs = date_format($fs,"Y-m-d");
			if( fechaIncluidaEntre($desde,$fe,$fs) || fechaIncluidaEntre($hasta,$fe,$fs) ){
					$ok = false;
			}
		}
	}
	//echo $ok;
	
	if($ok){
		$consulta2 ="INSERT INTO solicitudes(fecha_entrada,fecha_salida,estado,descripcion,id_usuario,id_hospedaje)
 				VALUES('$desde','$hasta','pendiente','$desc','$id_solicitante','$id_hospedaje')";
 		if(mysqli_query($link,$consulta2)){ ?>
 			<script type="text/javascript"> alert ("La solicitud se ha enviado correctamente, puedes ver su estado en Mis Solicitudes!"); 
				window.location.href="detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>"; </script>
			<?php
 		}
 		else ?>
 			<script type="text/javascript"> alert ("Error inesperado"); 
				window.location.href="mandarSolicitud.php?idh=<?php echo $id_hospedaje; ?>&idu=<?php echo $id_solicitante; ?>"; </script>
			<?php
 	
 	}
 	else{ ?>
 			<script type="text/javascript"> alert ("El hospedaje esta ocupado  en las fechas solicitadas"); 
				window.location.href="mandarSolicitud.php?idh=<?php echo $id_hospedaje; ?>&idu=<?php echo $id_solicitante; ?>"; </script>
			<?php
 	}

?>