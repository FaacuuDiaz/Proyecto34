<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	include_once ("connection.php");
	$link= connection();
	$u=$_SESSION['id_usuario'];
	$consulta= "SELECT * from usuario where id_usuario='".$u."' ";
	$result = mysqli_query($link,$consulta);
	$fila = mysqli_fetch_array($result);
	
	include("head.php");
	include("encabezado.php");
?>
<section class="listings">
		<div class="wrapper">
			<div class="columnat">PERFIL</div>
			</br>
	
		<p>Nombre: <?php echo $fila['nombre']; ?></p>
		<p>Apellido: <?php echo $fila['apellido']; ?></p>
		<p>Nick: <?php echo $fila['nick']; ?></p>
		<p>Email: <?php echo $fila['email']; ?></p>
		<p>Fecha de nacimiento: <?php echo $fila['fecha_nac']; ?></p>	
		<p>Sexo: <?php if ($fila['sexo']=='M') echo "Masculino"; ?>
				<?php if ($fila['sexo']=='F') echo "Femenino"; ?>
		
		</p>
		
		<?php if($fila['foto']!=null)
				{?>
					<p>Foto de perfil </p>
					<img src="mostrarFotoUser.php?id=<?php echo $fila['id_usuario']; ?>" class="property_img"style="width:340px; height:255px;"/>
				<?php 
				} ?>
		</br></br></br>
		
		<div class="columnat">COMENTARIOS RECIBIDOS</div>
			</br>
	
		<?php
			$con=connection();
					$idU = $_SESSION['id_usuario'];
					$consulta =	"SELECT * from 
					comentario c inner join usuario_comentario uc ON uc.id_comentario=c.id_comentario
								 inner join usuario u on u.id_usuario=c.id_usuario
					WHERE uc.id_usuario=$idU";
					if ($resultado = mysqli_query($con, $consulta))
					{
						while ($c = mysqli_fetch_assoc($resultado)) 
						{ 
							?> Comentario recibido de: <?php echo $c['nombre']." ".$c['apellido'];
							?> </br>Puntacion: <?php echo $c['puntuacion'];
							?> </br>Comentario: <?php echo $c['comentario'];
							?> </br> <?php
						}	
					}						
		
		
		?>
		
	</div>
	</section>
	<?php include("footer.php") ?>
	
</body>
</html>