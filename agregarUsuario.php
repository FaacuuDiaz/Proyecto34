	
<!DOCTYPE html>
<html lang="es">
<head>

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/validarUsuario.js"></script>

</head>

<body>

<?php 
	$edit=false;
	if(isset($_GET['edit'])) $edit = $_GET['edit'];
	include("connection.php");
	$link = connection();
	if(isset($_POST['listo'])){
		if ($edit) {
			session_start();
			$id = $_SESSION['id_usuario'];
		}	
	
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$nick = $_POST['nick'];
		$contraseña = $_POST['pass'];
		$email = $_POST['email'];
		$fecha = $_POST['fecha'];
		$admin = 'no';
		
		if(!$edit){
			$consulta = "INSERT INTO usuario (id_usuario,nick,password,nombre,apellido,email,fecha_nac,admin)
						VALUES (null,'".$nick."','".$contraseña."','".$nombre."','".$apellido."','".$email."','".$fecha."', '".$admin."')";
		}
		else
		{
			$consulta = "UPDATE usuario SET nick='".$nick."', password='".$contraseña."',  nombre='".$nombre."', apellido='".$apellido."', email='".$email."', fecha_nac='".$fecha."' ";
			$_SESSION['usuario'] = $email;
			$_SESSION['nick'] = $nick;

			if(0!==$_FILES['img']['size']){
				$img_temp= fopen($_FILES['img']['tmp_name'], "rb");
				$img_temp= fread($img_temp,$_FILES['img']['size']);
				$binario_contenido= addslashes($img_temp);
				$binario_tipo=$_FILES['img']['type'];
				$consulta .= ", foto='".$binario_contenido."', tipo_img='".$binario_tipo."'";
			}
			if(isset($_POST['sexo'])){
				$sexo = $_POST['sexo'];
				$consulta .= ", sexo='".$sexo."'";
			}
			$consulta .= " where id_usuario='".$id."'";
		}
	
	}
	$consulta2 = "SELECT * from usuario where email='".$email."'";
	$aux = mysqli_query($link, $consulta2);

	if($edit){
		if (mysqli_query($link, $consulta))
		{
			echo "<script type='text/javascript'>alert('$nombre, se han actualizado correctamente tus datos!'); document.location=('index.php');</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('$nombre, ha habido un problema con la actualizacion de datos, intenta de nuevo mas tarde!.'); document.location=('index.php');</script>";
			echo "<p class='parrafo_mensaje'> ".$nombre." , ha habido un problema con la actualizacion de datos, intenta de nuevo mas tarde!.  </p>" ;
		}
	}
	else{
		if(mysqli_num_rows($aux) < 1 ){			
			if (mysqli_query($link, $consulta)) {
				echo "<script type='text/javascript'>alert('$nombre, el registro ha concluido satisfactoriamente, ya puedes iniciar sesion con tus datos'); document.location=('formulario.php?var=2.php');</script>";
			}
			else {
				echo "<script type='text/javascript'>alert('Hubo un error durante el registro'); document.location=('index.php');</script>";
			}
	}
		else{
			echo "<script type='text/javascript'>alert('Ya existe un usuario registrado con esta direccion de correo, por favor elija otro'); document.location=('formulario.php?var=3.php');</script>";
			}
	}
		
			echo "<script type='text/javascript'>alert('".$mensaje_final."'); document.location=('listarTipos.php');</script>";
?>



</body>

</html>