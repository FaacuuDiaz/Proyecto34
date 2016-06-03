<?php
	include("connection.php");

	//Para verificar que los campos se hayan completado
		$con = connection();
		session_start();
		$email = $_SESSION['usuario'];
		//Para verificar que el nick se encuentre en la BD
		$query = "SELECT * FROM usuario where email='$email' ";
		$aux = mysqli_query($con,$query);
		if (mysqli_num_rows($aux) < 1){
			$mensaje_final="El usuario no esta registrado en el sistema";
		}
		else{
			$fila = mysqli_fetch_array($aux);
			if($fila ['premium'] == null){
				//$f = getdate();
				$f = date("Y-m-d");
				
				
				$consulta = "UPDATE usuario set premium = '$f' where email='$email'";
				if(mysqli_query($con,$consulta))
				{
					$mensaje_final= "Felicitaciones! ya eres un usuario premium";
					if(session_status()!=2)
				{
					session_start();
				}
					$_SESSION['premium'] = $f;
				}
				else
				{
					$mensaje_final= " Ha ocurrido un error";
				}
				
			}
			else{
				$mensaje_final="Este usuario ya es premiun";
			}
		}
		 	echo "<script type='text/javascript'>alert('".$mensaje_final."'); document.location=('index.php');</script>";

/*
		$res = mysqli_fetch_array($resultado);
		while($res != $_POST['nick']) {
			$res = mysqli_fetch_array($resultado);
		}

		//El nick no se encontró
		if($res != $_POST['nick']) {
			echo "El usuario ingresado no se encuentra registrado";
			return;
		}

		//Para verificar que la tarjeta se encuentre en la BD
		$query = "SELECT tarjeta FROM usuario";
		$resultado = mysqli_query($con,$query);
		$res = mysqli_fetch_array($resultado);
		while($res != $_POST['tarjeta']) {
			$res = mysqli_fetch_array($resultado);
		}

		//La tarjeta no se encontró
		if($res != $_POST['tarjeta']) {
			echo "El número de la tarjeta de crédito no es válido";
			return;
		}


		//Todo OK, se activa el premium
		$fecha = POSTdate();
		$query = "UPDATE usuario set premium = '$fecha' WHERE nick = '$_POST[nick]'";
		$resultado = mysqli_query($con,$query);
		echo "Felicitaciones! Ahora eres un usuario Premium";


	//Si algún campo está vacio, entra al else
	} else {
		echo "Error. Debe llenar todos los campos";
	}
*/
?>