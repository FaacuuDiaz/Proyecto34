<?php 

$act = $_POST['act'];
$nue = $_POST['nue'];
$nue2 = $_POST['nue2'];
session_start();
$id_usuario = $_SESSION['id_usuario'];


require ('connection.php');
$link= connection();
$consulta = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
$resultado = mysqli_query($link, $consulta);
$fila = mysqli_fetch_array($resultado);

if ($act == $fila['password']) {
	if ($nue == $nue2) { 
		$consulta = "UPDATE usuario SET password='$nue' WHERE id_usuario=$id_usuario";
		$result= mysqli_query($link,$consulta);
		if($result){?>
			<script type="text/javascript"> alert ("La contraseña ha sido cambiada correctamente"); 
			window.location.href='formulario.php?edit=true&var=1'; </script>
			<?php				
		}
		else{
			?>
			<script type="text/javascript"> alert ("Error con la base de datos"); 
			window.location.href='formulario.php?edit=true&var=1'; </script>
			<?php	
		}

		
	}
	else{
		?>
	<script type="text/javascript"> alert ("La contraseña nueva no coincide"); 
	window.location.href='formulario.php?var=6'; </script>
	<?php	
	}
}
else{
	?>
	<script type="text/javascript"> alert ("La contraseña actual es incorrecta"); 
	window.location.href='formulario.php?var=6'; </script>
	<?php
}
