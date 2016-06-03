<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();

require ('connection.php');

$titulo = $_POST['titulo']; 
$ciudad = $_POST['ciudad']; 
$idtipo   = $_POST['tipos'];
$des=$_POST['descripcion']; 
$cantPer= $_POST['cantPers']; 
$estado="habilitado";
//$foto= $_POST['foto'];
$usuario=$_SESSION['id_usuario'];
#Conexión con mysqli
$conexion = connection();


//comprobamos si ha ocurrido un error.
if ( !isset($_FILES["foto"]) || $_FILES["foto"]["error"] > 0){
	if ( !empty($_FILES["foto"]))
	{
		
				$consulta = "INSERT INTO `hospedaje`(`titulo`,`ciudad`,`descripcion`,`estado`,`cant_perso`,`idtipo`,`idusuario`)
							 VALUES ('$titulo' ,'$ciudad','$des','$estado','$cantPer','$idtipo','$usuario')";
		$resultado = $conexion -> query($consulta);
		//$resultado = $conexion ->query("INSERT INTO hospedaje (foto) VALUES ('$data')") ;

		if ($resultado){
		?>
			<script type="text/javascript"> alert ("El Couch fue agregado correctamente"); 
			window.location.href='hospedajes.php'; </script>
		<?php
		} else 
		{
		?>
			<script type="text/javascript"> alert ("El Couch no fue agregado, vuelva a intentarlo nuevamente"); 
			window.location.href='hospedajes.php'; </script>
		<?php
		}
	}
	else
	{
		?>
			<script type="text/javascript"> alert ("Ha ocurrido un error, vuelva a intentarlo nuevamente"); 
			window.location.href='hospedajes.php'; </script>
		<?php
	}

	
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 16MB
	$permitidos = array("image/jpg", "image/jpeg", "image/png");
	$limite_kb = 16384;

	if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite_kb * 1024){

		//este es el archivo temporal
		$imagen_temporal  = $_FILES['foto']['tmp_name'];
		//este es el tipo de archivo
		$tipo = $_FILES['foto']['type'];
		//leer el archivo temporal en binario
        $fp     = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //escapar los caracteres
        $data = mysql_escape_string($data);
		$consulta = "INSERT INTO `hospedaje`(`titulo`,`ciudad`,`descripcion`,`estado`,`foto`,`tipo_foto`,`cant_perso`,`idtipo`,`idusuario`)
							 VALUES ('$titulo' ,'$ciudad','$des','$estado','$data','$tipo','$cantPer','$idtipo','$usuario')";
		$resultado = $conexion -> query($consulta);
		//$resultado = $conexion ->query("INSERT INTO hospedaje (foto) VALUES ('$data')") ;

		if ($resultado){
		?>
			<script type="text/javascript"> alert ("El Couch fue agregado correctamente"); 
			window.location.href='hospedajes.php'; </script>
		<?php
		} else 
		{
		?>
			<script type="text/javascript"> alert ("El Couch no fue agregado, vuelva a intentarlo nuevamente"); 
			window.location.href='hospedajes.php'; </script>
		<?php
		}
	}
	else
	{
		?>
			<script type="text/javascript"> alert ("Ha ocurrido un error, vuelva a intentarlo nuevamente"); 
			window.location.href='hospedajes.php'; </script>
		<?php
	}
}

 ?>
