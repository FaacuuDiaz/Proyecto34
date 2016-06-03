<?php
	include("connection.php");
	$con=connection();
	$id=$_GET['id_tipo'];
	$consul="SELECT * FROM hospedaje WHERE idtipo='$id'";
	$r = mysqli_query($con,$consul);
	if(mysqli_num_rows($r)>0){
		$mensaje_final= " no se puede eliminar por que tiene couchs asociados ";
	}
	else{
		$consulta="DELETE FROM tipo_hospedaje WHERE id_tipo='$id'";
		if(mysqli_query($con,$consulta)){
			$mensaje_final= "se borro exitosamente";
		} 
		else{
			$mensaje_final= "error en la consulta de borrar";
		}
	}
		echo "<script type='text/javascript'>alert('".$mensaje_final."'); document.location=('listarTipos.php');</script>";
?>