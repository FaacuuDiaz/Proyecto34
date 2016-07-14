	<?php include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	include("head.php"); include("encabezado.php"); ?>
    <section class="div_listado">
		<?php include_once ("connection.php");
		$con=connection();
		$consul="SELECT * from hospedaje h  INNER JOIN usuario u ON h.idusuario=u.id_usuario ";
		$resul=mysqli_query($con,$consul); ?>
	<div class="columnat">COUCHS</div>
		</br>
		<table>
			<tr class="titulos">
				<td> Titulo</td>
				<td> Dueño</td>
				<td> Detalles</td>
			</tr>
		<?php while($fila=mysqli_fetch_array($resul)) {	?> 
			<tr>
				<td><?php echo $fila['titulo']; ?></td>
				<td><?php echo $fila['nick']; ?></td>
				<td><a href="detalleHospedaje.php?id=<?php echo $fila['id_hospedaje'];?>" > Ver detalles del Couch </a></td>


			</tr>   
			<?php } ?> 

		</table>
					<form class="formulario">
					<a href="index.php"><button type="button" name="cancelar" > Volver al inicio </button></a>
						</form>


</section>
<?php include("footer.php") ?>
</body>
</html> 