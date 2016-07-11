	<?php include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	$d=$_POST['desde'];
	$h=$_POST['hasta'];
	include("head.php"); include("encabezado.php"); ?>
    <section class="div_listado">
		<?php include_once ("connection.php");
		$con=connection();
		$consul="SELECT h.titulo,u.nombre, s.fecha_solicitud, s.fecha_entrada, s.fecha_salida FROM solicitudes s INNER JOIN usuario u ON s.id_usuario=u.id_usuario INNER JOIN hospedaje h ON h.id_hospedaje=s.id_hospedaje  WHERE fecha_solicitud BETWEEN '$d' and '$h'";
		$resul=mysqli_query($con,$consul); echo date("Y-m-d"); ?>
	<div class="columnat">Solicitudes aceptadas</div>
		</br>
		<table>
			<tr class="titulos">
				<td> Hospedaje</td>
				<td> Solicitante</td>
				<td> Fecha de aceptacion</td>
				<td> Fecha de entrada</td>
				<td> Fecha de salida</td>
			</tr>
		<?php while($fila=mysqli_fetch_array($resul)) {	?> 
			<tr>
				<td><?php echo $fila['titulo']; ?></td>
				<td><?php echo $fila['nombre']; ?></td>
				<td><?php echo $fila['fecha_solicitud']; ?></td>
				<td><?php echo $fila['fecha_entrada']; ?></td>
				<td><?php echo $fila['fecha_salida']; ?></td>

			</tr>   
			<?php } ?> 

		</table>
					<form class="formulario">
					<a href="reportarAceptadas.php"><button type="button" name="cancelar" > Atras</button></a>
						</form>


</section>
<?php include("footer.php") ?>
</body>
</html> 