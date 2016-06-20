<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	include("head.php");
	include("encabezado.php");
	?>
	<section class="div_listado">
		<div class="wrapper">
			<div class="columnat">SOLICITUDES</div>
			</br>
			<table>
				<tr class="titulos">
				  <td><strong>Usuario</strong></td>
				  <td><strong>Fecha solicitud</strong></td>
				  <td><strong>Fecha entrada</strong></td>
				  <td><strong>Fecha salida</strong></td>
				  <td><strong>Estado</strong></td>
				  
				  <td><strong>Descripcion</strong></td>
				</tr>
				<?php 
				require_once ('connection.php');
				$cont= connection();
				$id_hospedaje=$_POST['id'];
				$consulta = "SELECT * from solicitudes inner join usuario on solicitudes.id_usuario = usuario.id_usuario where solicitudes.id_hospedaje='$id_hospedaje'";
				if ($resultado = mysqli_query($cont, $consulta))
				{
					while ($fila = mysqli_fetch_assoc($resultado)) 
					{?>
						<tr>
							<td><?php echo ($fila['nombre']." ".$fila['apellido']); ?></td>
							<td><?php echo $fila['fecha_solicitud'];?></td>
							<td><?php echo $fila['fecha_entrada'];?></td>
							<td><?php echo $fila['fecha_salida'];?></td>
							
							<td><?php echo $fila['estado']; 
										if($fila['estado']=='pendiente'){ ?> 
											<br/> 
											<a href="aceptarSolicitud.php?idHospedaje=<?php echo $fila['id_hospedaje'];?>&idUsuario=<?php echo $fila['id_usuario'];?>&fd=<?php echo $fila['fecha_entrada'];?>&fh=<?php echo $fila['fecha_salida'];?> " > Aceptar </a> 
											<br/> 
											<a href="rechazarSolicitud.php?idHospedaje=<?php echo $fila['id_hospedaje']; ?>&idUsuario=<?php echo $fila['id_usuario'];?>" > Rechazar </a>
										<?php } ?>
							</td>
							<td><?php echo $fila['descripcion'];?></td>
						</tr>
					<?php	
					}
				}
				mysqli_free_result($resultado);
				?>
			</table>	
		</div>
	</section>
	<?php include("footer.php") ?>
</body>
</html>