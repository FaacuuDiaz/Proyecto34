<?php
	include("connection.php");
	session_start();
	$con=connection();
	$comen=$_POST['comentario'];
	$id_user=$_SESSION['id_usuario'];
	$id_u=$_POST['id_u'];
	$punt = $_POST['punt'];
	if(isset($_POST['comentario'])){
		$c = $_POST['comentario'];
		$consul= "INSERT INTO comentario(puntuacion,comentario,id_usuario) VALUES('".$punt."','".$c."','".$id_user."')";
	}
	else{
		$consul="INSERT INTO comentario(puntuacion,id_usuario) VALUES('".$punt."','".$id_user."')";
	}
	$r = mysqli_query($con,$consul);
	$id_comentario = mysqli_insert_id($con);
	$conn=connection();
	$consulta2 = "INSERT INTO usuario_comentario(id_usuario,id_comentario) VALUES('".$id_u."','".$id_comentario."')";
	$result = mysqli_query($conn,$consulta2);

		if($result){
				?>
		<script type="text/javascript"> alert ("Se ha guardado su comentario correctamente"); 
			window.location.href='verUsuariosHospedados.php'; </script>	
		<?php
		}
		else{
							?>
		<script type="text/javascript"> alert ("No se pudo realizar el comentario"); 
			window.location.href="verUsuariosHospedados.php"; </script>	
		<?php
		}

		?>