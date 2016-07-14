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
		$sql = "delete from preg_resp
			WHERE id_preg_resp = '$id'";
		if ($conn->query($sql)) 
		{
			?>
				<script type="text/javascript"> alert ("La pregunta fue eliminada correctamente"); 
				window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
				</script>
			<?php
		}
		else 
		{
			?>
				<script type="text/javascript"> alert ("La pregunta no fue eliminada"); 
				window.location.href='detalleHospedaje.php?id=<?php echo $id_hospedaje; ?>'; 
				</script>
			<?php
		}
	}

?>