<?php	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	?>
	<form class ="formulario" name="registro" class="formularios_Registro" id="registro" action="cambiarPass.php" method="post" enctype="multipart/form-data" onSubmit="return validarUsuario(this);">
	<p>Elija una nueva cotraseña, como minimo debe tener 8 caracteres</p> </br></br>
	<p>Contraseña actual: <input type="password" name="act" id="act" required  placeholder="Ingrese su contraseña actual" /></p>
	<p>Contraseña nueva: <input type="password" name="nue" id="nue" required  placeholder="Ingrese su contraseña nueva"/></p>
	<p>Reescriba contraseña: <input type="password" name="nue2" id="nue2" required  placeholder="Reescriba su contraseña nueva"/></p>
	<p><button type="submit" id="listo" name="listo"> Listo </button></p>
</form>
