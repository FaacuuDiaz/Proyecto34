<html>
<?php
 	include("connection.php");
 	
 	$con = connection();
 	$e = false;
 	$ok = false;
 	if(isset($_GET['edit'])){
 		$e = $_GET['edit'];
 	}
 	if(isset($_GET['id'])){

 		$id = $_GET['id'];
 		$c = "SELECT * FROM tipo_hospedaje WHERE id_tipo='$id'";
 		$r = mysqli_query($con,$c);
 		$f = mysqli_fetch_array($r);
 		$nombre_viejo = $f['nombre_tipo'];

 	} 
 	if($e){
 		$mensaje = "Se han actualizado los datos correctamente";
 	}
 	else {
 		$mensaje = "Se han agregado los datos correctamente";
 	}
 	
 	if( isset($_POST['listo'])){//si se apreto el boton
 		$estado = $_POST['estado'];
 		$tipo = $_POST['nombreTipo'];
 		$result = mysqli_query($con, "SELECT * FROM tipo_hospedaje WHERE nombre_tipo='$tipo' ");
 		$fila = mysqli_fetch_array($result);
 		
 		
 		
 		
 		if(!$e){
           $consulta ="INSERT INTO tipo_hospedaje (nombre_tipo,estado)
 				VALUES('".$tipo."','".$estado."')";
 		}
 		else{
 			$ok = $nombre_viejo == $tipo;	
 			$consulta = "UPDATE tipo_hospedaje set nombre_tipo='$tipo', estado='$estado' WHERE id_tipo='$id'";
 		

 		}
 		if(!$ok){
 			if(mysqli_num_rows($result)>0){
 				$mensaje_final= "ya existe un tipo con este nombre";
 			}
 			else{
 				if(mysqli_query($con,$consulta)){
 					$mensaje_final=  $mensaje;
 				}
 				else $mensaje_final=  "Ocurrio error con la consulta";
 			}
 		}
 			else{
 				if(mysqli_query($con,$consulta)){
 					$mensaje_final= $mensaje;
 				}
 			}
 		
 			
 		
 			
 		
 	}
 	else echo "Ha ocurrido un error";
 	echo "<script type='text/javascript'>alert('".$mensaje_final."'); document.location=('listarTipos.php');</script>";

?>

</script>
</html>