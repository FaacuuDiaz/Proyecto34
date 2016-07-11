<form class ="formulario" name="registro" class"formularios_Registro" id="registro" action="agregarUsuario.php" method="post" enctype="multipart/form-data" onSubmit="return validarUsuario(this);">
	<p>Nombre: <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" required /></p>						
	<p>Apellido: <input type="text" name="apellido" id="apellido" required  placeholder="Ingrese su apellido"  /></p>
	<p>Telefono: <input type="text" name="tel" id="tel" required  placeholder="Ingrese su telefono"  /></p>
	<p>Nick: <input type="text" name="nick" id="nick" required  placeholder="Elija un apodo" /></p>
	<p>Contraseña: <input type="password" name="pass" id="contraseña" required  placeholder="Minimo 8 caracteres"/></p>
	<p>Email: <input type="email" name="email" id="email" required="true"  placeholder="ejemplo@xxx.com" /></p>
	<p>Fecha de nacimiento:<input type="date" name="fecha" id="fecha" required min ="1920-12-31" max="2005-12-31"/></p>
	<p><button type="submit" id="listo" name="listo"> Registrarme </button></p>
</form>