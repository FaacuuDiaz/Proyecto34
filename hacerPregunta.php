<html>
<?php
 	include_once("connection.php");
 	
 	$con = connection();
 	if(isset($_POST['pregunta'])){

 		$id_usuario = $_POST['id_usuario'];
 		$id_hospedaje = $_POST['id_hospedaje'];
 		$pregunta = $_POST['pregunta'];
 		$consulta = "INSERT INTO `preg_resp`(`pregunta`,`id_usuario`,`id_hospedaje`)
							 VALUES ('$pregunta' ,'$id_usuario','$id_hospedaje')";
		$resultado = $con -> query($consulta);
		if ($resultado){
		?>
			<script type="text/javascript"> alert ("La pregunta fue agregada correctamente!"); 
			window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
			</script>
		<?php
		} else 
		{
		?>
			<script type="text/javascript"> alert ("La pregunta no fue agregada, vuelva a intentarlo nuevamente"); 
			window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
			</script>
		<?php
		}
 	} 
 	
?>

</script>
</html>