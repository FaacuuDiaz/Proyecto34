<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	require_once ('connection.php');
	if (($_GET['id']) > 0) 
	{
		$id= $_GET['id'];
		$id_hospedaje= $_GET['idh'];
		$conn= connection();
		$sql = "update preg_resp
		set respuesta=NULL
		WHERE id_preg_resp = '$id'";
		if ($conn->query($sql)) 
		{
			?>
				<script type="text/javascript"> alert ("La respuesta fue eliminada correctamente"); 
				window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
				</script>
			<?php
		}
		else 
		{
			?>
				<script type="text/javascript"> alert ("La respuesta no fue eliminada"); 
				window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
				</script>
			<?php
		}
	}

?>