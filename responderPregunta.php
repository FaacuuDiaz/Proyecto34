<html>
<?php
 	include_once("connection.php");
 	
 	$con = connection();
 	if(isset($_POST['respuesta'])){

 		$id = $_POST['id_preg_resp'];
		$id_hospedaje= $_POST['id_hospedaje'];
 		$respuesta = $_POST['respuesta'];
 		$consulta = "update preg_resp
		set respuesta='$respuesta'
		where id_preg_resp='$id'";
		$resultado = $con -> query($consulta);
		if ($resultado){
		?>
			<script type="text/javascript"> alert ("La respuesta fue agregada correctamente!"); 
			window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
			</script>
		<?php
		} else 
		{
		?>
			<script type="text/javascript"> alert ("La respuesta no fue agregada, vuelva a intentarlo nuevamente"); 
			window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
			</script>
		<?php
		}
 	} 
 	
?>

</script>
</html>