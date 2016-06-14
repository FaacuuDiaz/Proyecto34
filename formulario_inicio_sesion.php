<form class ="formulario" name="registro" class="formularios_Registro" id="registro" action="validar_loggin.php" method="post" enctype="multipart/form-data" onSubmit="return validarLoggin(this);">
						
						<p>Email: <input type="email" name="email" id="email" required 
						 value="<?php if(isset($_POST['email']))
						{ echo $_POST['email'];}
					?>"
						
						/></p>
						<p>Contrase&ntilde;a: <input type="password" name="pass" id="contraseña" required  /></p>
						<button type="submit" name="loggin"> Loggin</button> </br></br></br></br></br>
						<!--<a href=# >Olvide mi contraseña </a>&nbsp&nbsp&nbsp &nbsp-->
						<a href="formulario.php?var=3" >Registrarme </a>

						

	</form>