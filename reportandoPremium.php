	<?php include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	$d=$_POST['desde'];
	$h=$_POST['hasta'];
	include("head.php"); include("encabezado.php"); ?>
    <section class="div_listado">
		<?php include_once ("connection.php");
		$con=connection();
		$consul="SELECT * from usuario WHERE premium BETWEEN '$d' and '$h'";
		$resul=mysqli_query($con,$consul); 
		$recaudado = mysqli_affected_rows($con);
		$recaudado = $recaudado*20;
		 ?>
	<div class="columnat">Solicitudes aceptadas</div>
		</br>
		<table>
			<tr class="titulos">
				<td> Nombre</td>
				<td> Apellido</td>
				<td> Fecha de alta</td>

			</tr>
		<?php while($fila=mysqli_fetch_array($resul)) {	?> 
			<tr>
				<td><?php echo $fila['nombre']; ?></td>
				<td><?php echo $fila['apellido']; ?></td>
				<td><?php echo $fila['premium']; ?></td>


			</tr>   
			<?php } ?> 
			<tr style="background-color:green">
				<td> Total recaudado: </td>
				<td> <?php echo '$'.$recaudado ?> </td>
			</tr>   
		</table>
		<form class="formulario">
		<a href="reportarPremium.php"><button type="button" name="cancelar" >Atras </button></a>
		</form>
</section>
<?php include("footer.php") ?>
</body>
</html> 