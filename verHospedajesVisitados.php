 <?php
 include("head.php"); include("encabezado.php");

	include_once("connection.php");
	$con=connection();
	$id_u=$_SESSION['id_usuario'];
	$consul="SELECT u.id_usuario, h.id_hospedaje, h.titulo,s.fecha_entrada,s.fecha_salida FROM hospedaje h INNER JOIN solicitudes s ON h.id_hospedaje=s.id_hospedaje INNER JOIN usuario u ON u.id_usuario=s.id_usuario WHERE s.estado='aceptada' and u.id_usuario=$id_u";
	$resul=mysqli_query($con,$consul);
	?>
		<section class="div_listado">
		<div class="wrapper">
		<div class="columnat">Hospedajes donde me quede </div>
		</br>
			<table><tr class="titulos">
				<td><strong>Nombre de Hospedaje</strong></td>
				<td><strong>Periodo de estadia</strong></td>
				<td><strong>Comentario</strong></td>
				</tr>
			<?php
			if($resul){
				while($fila=mysqli_fetch_array($resul)){
				?>
				<tr>
				<td><?php echo $fila['titulo']?></td>
				<td><?php echo $fila['fecha_entrada']." a ".$fila['fecha_salida'] ?></td>
				<?php 
					$idH = $fila['id_hospedaje'];
					$idU = $fila['id_usuario'];
					$consultaAux = 
					"SELECT c.comentario, c.puntuacion from comentario c inner join hospedaje_comentario hc ON hc.id_comentario=c.id_comentario WHERE hc.id_hospedaje=$idH and c.id_usuario=$idU";
					$result2 = mysqli_query($con,$consultaAux);
					?>
				<td>
					<?php 
						if(mysqli_num_rows($result2)<1){  ?>
							
							<a href="formulario.php?var=7&id_h=<?php echo $fila['id_hospedaje']?> " >Comentar</a> <?php
						}
						else{
							$fila = mysqli_fetch_array($result2);
							echo "Puntuacion: ";
							echo $fila['puntuacion'];
							echo "</br>";
							if($fila['comentario']!=NULL){
								echo $fila['comentario'];
							}


						 }

					?>
				</td>
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