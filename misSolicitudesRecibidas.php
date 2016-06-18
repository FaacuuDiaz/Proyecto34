<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
?>
<!DOCTYPE html>
	<?php include("head.php"); include("encabezado.php"); ?>
	<section class="div_listado">
		<div class="wrapper">
		<div class="columnat">MIS SOLICITUDES RECIBIDAS</div>
		</br>
			<table>
				<tr class="titulos">
				  <td><strong>Usuario</strong></td>
				  <td><strong>Hospedaje</strong></td>
				  <td><strong>Fecha solicitud</strong></td>
				  <td><strong>Fecha entrada</strong></td>
				  <td><strong>Fecha salida</strong></td>
				  <td><strong>Estado</strong></td>
				  <td><strong>Descripcion</strong></td>
				</tr>
				<?php 
				require_once ('connection.php');
				$cont= connection();
				$usuario=$_SESSION['id_usuario'];
				$consulta = "SELECT u.nombre, u.apellido, h.titulo, s.fecha_solicitud, s.fecha_entrada, s.fecha_salida, s.estado, s.descripcion
								from solicitudes s inner join usuario u on s.id_usuario = u.id_usuario 
								                   inner join hospedaje h on h.id_hospedaje = s.id_hospedaje where h.idusuario='$usuario'";
				if ($resultado = mysqli_query($cont, $consulta))
					{
						while ($fila = mysqli_fetch_assoc($resultado)) 
						{ 	?>
							<tr>
								<td><?php echo ($fila['nombre']." ".$fila['apellido']); ?></td>
								<td><?php echo $fila['titulo'];?></td>
								<td><?php echo $fila['fecha_solicitud'];?></td>
								<td><?php echo $fila['fecha_entrada'];?></td>
								<td><?php echo $fila['fecha_salida'];?></td>
								<td><?php echo $fila['estado'];?></td>
								<td><?php echo $fila['descripcion'];?></td>
							</tr>
							<?php	
						}
					}
				?>
			</table>			
		</div>
	</section>
	<?php include("footer.php") ?>
</body>
</html>