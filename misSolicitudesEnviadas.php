<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	include("head.php");
	include("encabezado.php");
	?>
	<section class="div_listado">
		<div class="wrapper">
		<div class="columnat">MIS SOLICITUDES ENVIADAS</div>
		</br>
			<table>
				<tr class="titulos">
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
				$conh= connection();
				$hospedajes = "SELECT * FROM hospedaje";
				$consulta = "SELECT s.id_hospedaje, s.fecha_solicitud, s.fecha_entrada, s.fecha_salida, s.estado, s.descripcion from solicitudes s where s.id_usuario='$usuario'";
				if ($resultado = mysqli_query($cont, $consulta))
					{
						while ($fila = mysqli_fetch_assoc($resultado)) 
						{	?>
							<tr>
								<td>
									<?php
									if($fila['id_hospedaje']== NULL)
									{
										echo "Couch Eliminado";
									}
									else
									{
										if($res_hospedaje = mysqli_query($conh, $hospedajes))
										{
											while($h = mysqli_fetch_assoc($res_hospedaje))
											{
												if($fila['id_hospedaje'] == $h['id_hospedaje'])
												{
													echo $h['titulo'];
												}
											}
										}
									}
									?>
								</td>
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