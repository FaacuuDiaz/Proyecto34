<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>

	<?php
		include("connection.php");
		$link= connection();
		$u=$_SESSION['id_usuario'];
		$consulta= "SELECT * from usuario where id_usuario='".$u."' ";
		$result = mysqli_query($link,$consulta);
		$fila = mysqli_fetch_array($result);
	?>

	<form class ="formulario" name="registro" class"formularios_Registro" id="registro" action="agregarUsuario.php?edit=true" method="post" enctype="multipart/form-data" onSubmit="return validarUsuario(this);">
						
						<p>Nombre: <input type="text" name="nombre" id="nombre" required   placeholder="El nombre no puede contener numeros ni simbolos" value="<?php echo $fila['nombre']; ?>"/></p>
						<p>Apellido: <input type="text" name="apellido" id="apellido" required  placeholder="El nombre no puede contener numeros ni simbolos" value="<?php echo $fila['apellido']; ?>" /></p>
						<p>Nick: <input type="text" name="nick" id="nick" required  placeholder="Elija un apodo" value="<?php echo $fila['nick']; ?>" /></p>
						<p>Contraseña: <input type="password" name="pass" id="contraseña" required  placeholder="Minimo 8 caracteres" value="<?php echo $fila['password']; ?>" /></p>
						<p>Email: <input type="email" name="email" id="email" required="true"  placeholder="ejemplo@xxx.com" value="<?php echo $fila['email']; ?>" /></p>
						<p>Fecha de nacimiento:<input type="date" name="fecha" id="fecha" required min ="1920-12-31" max="2005-12-31" value="<?php echo $fila['fecha_nac']; ?>" /></p>	
						<p>Sexo: <select name="sexo" class="input_select">
									<option value="null"></option>
									<option value="M" <?php if ($fila['sexo']=='M') echo 'selected'; ?>>Masculino  </option>
									<option value="F" <?php if ($fila['sexo']=='F') echo 'selected'; ?>>Femenino</option>
								</select>
						</p>
						<p>Foto de perfil (opcional) <input class="imagen" type="file" name ="img" id="img" /></p>
				<?php if($fila['foto']!=null)
				{?>
					<img src="mostarFotoUser.php?id=<?php echo $fila['id_usuario']; ?>" class="property_img"style="width:340px; height:255px;"/>

				<?php 
				} ?>

						<p><button type="submit" id="listo" name="listo"> <?php if ($_GET['edit']=true) echo "Listo"; else echo "Registrarme" ?> </button></p>
						

	</form>