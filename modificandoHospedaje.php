<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>

<?php 
require ('connection.php');
$id= $_POST['id'];
$titulo = $_POST['titulo']; 
$ciudad = $_POST['ciudad']; 
$idtipo   = $_POST['tipos'];
$des=$_POST['descripcion']; 
$cantPer= $_POST['cantPers']; 
if ( !isset($_POST['estado']))
{
	$estado="deshabilitado";
}
else
{
	$estado="habilitado";
}



//$foto= $_POST['foto'];
$usuario=$_SESSION['id_usuario'];
#Conexión con mysqli
$conexion = connection();

//comprobamos si ha ocurrido un error.
if ( !isset($_FILES["foto"]) || $_FILES["foto"]["error"] > 0){
	if (!empty($_FILES["foto"]))
	{
		
		$consulta = "update hospedaje
		set titulo='$titulo',
		ciudad='$ciudad',
		descripcion='$des',
		estado='$estado',
		cant_perso='$cantPer',
		idtipo='$idtipo',
		idusuario='$usuario'
		where id_hospedaje='$id'";
		$resultado = $conexion -> query($consulta);
		//$resultado = $conexion ->query("INSERT INTO hospedaje (foto) VALUES ('$data')") ;

		if ($resultado){
			//echo "el archivo ha sido copiado exitosamente";
			?>
			<script type="text/javascript"> alert ("El Couch fue modificado correctamente"); 
			window.location.href='hospedajes.php'; </script>
			<?php
		} else {
			//echo "ocurrio un error al copiar el archivo.";
			?>
			<script type="text/javascript"> alert ("El Couch no fue modificado, intentelo nuevamente!"); 
			window.location.href='hospedajes.php'; </script>
			<?php
		}
	}
	else
	{
		//echo "ha ocurrido un error";
		?>
		<script type="text/javascript"> alert ("Ha ocurrido un error, intentelo nuevamente mas tarde!"); 
		window.location.href='hospedajes.php'; </script>
		<?php
	}
}	
 else {
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
		$consulta = "update hospedaje
		set titulo='$titulo',
		ciudad='$ciudad',
		descripcion='$des',
		estado='$estado',
		foto='$data',
		tipo_foto='$tipo',
		cant_perso='$cantPer',
		idtipo='$idtipo',
		idusuario='$usuario'
		where id_hospedaje='$id'";
		$resultado = $conexion -> query($consulta);
		//$resultado = $conexion ->query("INSERT INTO hospedaje (foto) VALUES ('$data')") ;

		if ($resultado){
			//echo "el archivo ha sido copiado exitosamente";
			?>
			<script type="text/javascript"> alert ("El Couch fue modificado correctamente"); 
			window.location.href='hospedajes.php'; </script>
			<?php
		} else {
			//echo "ocurrio un error al copiar el archivo.";
			?>
			<script type="text/javascript"> alert ("El Couch no fue modificado, intentelo nuevamente!"); 
			window.location.href='hospedajes.php'; </script>
			<?php
		}
	}
	else
	{
		//echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
		?>
		<script type="text/javascript"> alert ("archivo no permitido o es tipo de archivo prohibido"); 
		window.location.href='hospedajes.php'; </script>
		<?php
	}
}

 ?>
