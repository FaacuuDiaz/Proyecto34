<?php
	include("connection.php");
	$con=connection();
	$email=$_POST['email'];
	$consul="SELECT * FROM usuario where email='$email'";
	$resul=mysqli_query($con,$consul);
	if(mysqli_num_rows($resul)>0){
		$fila=mysqli_fetch_array($resul);
		$pass=$fila['password'];
		$dir = "./mensaje/Mensaje-para-".$fila['email'].".txt";
		$archivo=fopen($dir,"a");
		$text="La contraseña de su cuenta es: ".$fila['password']."\r\n Se recomineda que la proxima vez que inicie sesion cambie su clave a una mas factible de acordarse. \r\nGracias por usar CouchInn\r\n corp@GabilanSoftwares";
		fwrite($archivo,$text);
		?>
		<script type="text/javascript"> alert ("Se le ha enviado el mensaje correctamente"); 
			window.location.href='index.php'; </script>	
		<?php	
	}
	else{
		?>
		<script type="text/javascript"> alert ("Debe ingresar un mail existente en el sistema"); 
			window.location.href='formulario_recuperarContrasena.php'; </script>	
		<?php	
	}
?>	