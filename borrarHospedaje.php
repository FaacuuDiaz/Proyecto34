<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	require_once ('connection.php');
	if (($_GET['id']) > 0) 
	{
		$id= $_GET['id'];
		$conn= connection();
		$consulta = "SELECT * from solicitudes where id_hospedaje='$id'";
		if ($resultado = mysqli_query($conn, $consulta))
		{
			$fecha_actual = date("Y-m-d");
			$borrar = true;
			while ($fila = mysqli_fetch_assoc($resultado)) 
			{ 
				if(($fila['estado']=="aceptada")&&($fecha_actual < $fila['fecha_entrada']))
				{
					$borrar=false;
				?>
					<script type="text/javascript"> alert ("Hay solicitudes aceptadas para ese hospedaje!!"); 
					window.location.href='hospedajes.php'; </script>
				<?php
				}
			}
			if($borrar)
			{
				$sql = "DELETE FROM hospedaje WHERE id_hospedaje = '$id'";
				if ($conn->query($sql)) 
				{
					?>
						<script type="text/javascript"> alert ("El Couch fue eliminado correctamente"); 
						window.location.href='hospedajes.php'; </script>
					<?php
				}
				else 
				{
					?>
						<script type="text/javascript"> alert ("El Couch no fue eliminado"); 
						window.location.href='hospedajes.php'; </script>
					<?php
				}
			}
		}
	}
?>