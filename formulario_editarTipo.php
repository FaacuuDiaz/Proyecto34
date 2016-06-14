
<?php
include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();

$id_tipo = $_GET['id_tipo'];
include_once("connection.php");
$con=connection();
$consulta = "SELECT * FROM tipo_hospedaje WHERE id_tipo='$id_tipo'";
$resul=mysqli_query($con,$consulta);
$fila=mysqli_fetch_array($resul);
$estado=$fila['estado'];
$nombre=$fila['nombre_tipo'];

?>
<form class ="formulario"  name="formularioTipo" method="post" enctype="multipart/form-data" action="agregando_tipo.php?edit=true&id=<?php echo $id_tipo; ?> ">
	<p>Nombre tipo: <input type="text" name="nombreTipo" required placeholder="Nombre tipo" value="<?php echo $nombre; ?>"/></p>
    <p>Estado: <select name="estado" required>
    	            <option  value="habilitado" <?php if($estado == 'habilitado') echo "selected"; ?> > Habilitado </option>
    	            <option value="deshabilitado" <?php if($estado == 'deshabilitado') echo "selected"; ?>> Deshabilitado </option>
    	        </select>
    <p><button type="submit" name="listo" > Actualizar datos </button></p>
</form>    
