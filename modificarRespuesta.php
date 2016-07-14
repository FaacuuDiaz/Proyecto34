<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	require_once ('connection.php');
	if (($_POST['id_preg_resp']) > 0) 
	{
		$id= $_POST['id_preg_resp'];
		$id_hospedaje= $_POST['id_hospedaje'];
		$respuesta= $_POST['respuesta'];
		$conn= connection();
		$sql = "update preg_resp
		set respuesta='$respuesta'
			WHERE id_preg_resp = '$id'";
		if ($conn->query($sql)) 
		{
			?>
				<script type="text/javascript"> alert ("La respuesta fue modificada correctamente"); 
				window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
				</script>
			<?php
		}
		else 
		{
			?>
				<script type="text/javascript"> alert ("La respuesta no fue modificada"); 
				window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
				</script>
			<?php
		}
	}

?>