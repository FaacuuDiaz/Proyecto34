<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	require_once ('connection.php');
	if (($_GET['id']) > 0) 
	{
		$id= $_GET['id'];
		//$id_hospedaje= $_GET['idh'];
		$conn= connection();
		$sql = "delete from hospedaje_comentario
			WHERE id_hospedaje_comentario = '$id'";
		if ($conn->query($sql)) 
		{
			?>
				<script type="text/javascript"> alert ("El comentario fue eliminado correctamente"); 
				window.location.href='verHospedajesVisitados.php'; 
				</script>
			<?php
		}
		else 
		{
			?>
				<script type="text/javascript"> alert ("El comentario no fue eliminado"); 
				window.location.href='verHospedajesVisitados.php'; 
				</script>
			<?php
		}
	}

?>