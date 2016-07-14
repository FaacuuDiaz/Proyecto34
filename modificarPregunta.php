<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	require_once ('connection.php');
	if (($_POST['id_preg_resp']) > 0) 
	{
		$id= $_POST['id_preg_resp'];
		$id_hospedaje= $_POST['id_hospedaje'];
		$pregunta= $_POST['pregunta'];
		$conn= connection();
		$sql = "update preg_resp
		set pregunta='$pregunta'
			WHERE id_preg_resp = '$id'";
		if ($conn->query($sql)) 
		{
			?>
				<script type="text/javascript"> alert ("La pregunta fue modificada correctamente"); 
				window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
				</script>
			<?php
		}
		else 
		{
			?>
				<script type="text/javascript"> alert ("La pregunta no fue modificada"); 
				window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
				</script>
			<?php
		}
	}

?>