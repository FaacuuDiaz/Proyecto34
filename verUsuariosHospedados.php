<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CouchInn</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">
		function confirmar(url)
		{
			if (!confirm("Seguro que quiere eliminar el comentario?")) 
			{
				return false;
			}
			else
			{
				document.location = url;
				return true;
			}
		}
	</script>
</head>
<body>

	<?php include("encabezado.php") ?>
	<section class="div_listado">
		<div class="wrapper">
		<div class="columnat">USUARIOS QUE SE HOSPEDARON</div>
		</br>
			<table>
				<tr class="titulos">
				  <td><strong>Couch</strong></td>
				  <td><strong>Usuario</strong></td>
				  <td><strong>Fecha Estadia</strong></td>
				  <td><strong>Comentario</strong></td>
				  <td><strong>Borrar</strong></td>
				  <td><strong>Editar</strong></td>
				  </tr>
 			<?php 
				include_once ('connection.php');
				$cont= connection();
				$usuario=$_SESSION['id_usuario'];
				$consulta = "SELECT * from solicitudes s inner join hospedaje h on s.id_hospedaje=h.id_hospedaje 
														 inner join usuario u on s.id_usuario=u.id_usuario
							WHERE s.estado='aceptada' and s.id_hospedaje IN (SELECT id_hospedaje
													 from hospedaje
													 where idusuario='$usuario')";
				if ($resultado = mysqli_query($cont, $consulta))
					{
						while ($fila = mysqli_fetch_assoc($resultado)) 
						{ ?>
							<tr>
								<td><?php echo $fila['titulo']; ?></td>
								<?php 
									$id = $fila['id_hospedaje'];
									$estado= $fila['estado'];
								?>
								<td><?php echo $fila['nombre']." ".$fila['apellido'];?></td>
								<td><?php echo $fila['fecha_entrada']." a ".$fila['fecha_salida']?></td>
								<td>
								<?php 
					//$idH = $fila['id_hospedaje'];
					$con=connection();
					$idU = $fila['id_usuario'];
					$consultaAux = 
					"SELECT * from comentario c inner join usuario_comentario uc ON uc.id_comentario=c.id_comentario WHERE uc.id_usuario=$idU";
					$result2 = mysqli_query($con,$consultaAux);
						if(mysqli_num_rows($result2)<1){  
							if($fila['fecha_salida'] < date("Y-m-d"))
							{	?>
						
								<a href="hacerComentario.php?id_u=<?php echo $idU; ?> " >Comentar</a> 
								</td>
								<td>
								</td>
								<td>
								</td>
								<?php
							}
							else
							{
								echo "Todavia no paso la fecha de estadia!";
								?>
								</td>
								<td>
								</td>
								<td>
								</td>
								<?php
							}
						}
						else{
							$fila = mysqli_fetch_array($result2);
							echo "Puntuacion: ";
							echo $fila['puntuacion'];
							echo "</br>";
							if($fila['comentario']!=NULL){
								echo $fila['comentario'];
							}
							?>
							</td>
								<td style="width:100px; padding:1%;">
									<a href="javascript:;" onclick="confirmar('borrarComentarioUsuario.php?id=<?php echo $fila['id_usuario_comentario']; ?>'); return false;"><img src="img/borrar.png" style="width:100px; height:32px;"></a>
								</td>
								<td style="width:100px; padding:1%;">
									<a href="modificarComentarioUsuario.php?id=<?php echo $fila['id_comentario']; ?>"><img src="img/editar.png" style="width:100px; height:32px;"></a>
								</td>
							<?php

						 }

					?>
				
								
							</tr>
						<?php	
						}
					}
				//mysqli_free_result($resultado);
			?>
			
			
			</table>
				
		</div>
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>