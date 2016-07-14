<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>

<?php 
require ('connection.php');
$conexion = connection();
$id= $_POST['id'];
$puntuacion = $_POST['puntuacion']; 
$comentario = $_POST['comentario']; 

		
		$consulta = "update comentario
		set puntuacion ='$puntuacion',
		comentario ='$comentario'
		where id_comentario ='$id'";
		$resultado = $conexion -> query($consulta);
		//$resultado = $conexion ->query("INSERT INTO hospedaje (foto) VALUES ('$data')") ;

		if ($resultado){
			//echo "el archivo ha sido copiado exitosamente";
			
			?>
			<script type="text/javascript"> alert ("El comentario fue modificado correctamente"); 
			window.location.href='verHospedajesVisitados.php'; </script>
			<?php
		} else {
			//echo "ocurrio un error al copiar el archivo.";
			?>
			<script type="text/javascript"> alert ("El comentario no fue modificado, intentelo nuevamente!"); 
			window.location.href='verHospedajesVisitados.php'; </script>
			<?php
		}

 ?>
