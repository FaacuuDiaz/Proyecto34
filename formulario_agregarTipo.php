<?php include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	?>
<form class ="formulario"  name="formularioTipo" method="post" enctype="multipart/form-data" action="agregando_tipo.php">
	<p>Nombre tipo: <input type="text" name="nombreTipo" required placeholder="Nombre tipo" /></p>
    <p>Estado: <select name="estado" required>
    	            <option value="habilitado"> Habilitado </option>
    	            <option value="deshabilitado"> Deshabilitado </option>
    	        </select>
    <p><button type="submit" name="listo" > Agregar tipo </button></p>
</form>    
