	<?php include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	include("head.php"); include("encabezado.php"); ?>
	<script type="text/javascript"> function confirmar(url) { if (!confirm("Seguro que quiere eliminar el tipo de Couch?")) { return false; } else { document.location = url; return true; } } </script>
    <section class="div_listado">
		<?php include_once ("connection.php");
		$con=connection();
		$consul="SELECT * FROM tipo_hospedaje";
		$resul=mysqli_query($con,$consul); ?>
	<div class="columnat">TIPOS DE COUCH</div>
		</br>
		<table>
			<tr class="titulos">
				<td> Tipo</td>
				<td> Estado</td>
				<td> Editar</td>
				<td> Eliminar</td>
			</tr>
		<?php while($fila=mysqli_fetch_array($resul)) {	?> 
			<tr>
				<td><?php echo $fila['nombre_tipo']; ?></td>
				<td><?php echo $fila['estado']; ?></td>
				<td style="width:100px;"><a href="formulario.php?var=5&id_tipo=<?php echo $fila['id_tipo']; ?>" > <img src="img/editar.png" style="width:100px; height:32px;"> </a> </td>
				<td style="width:100px;"><a href="javascript:;" onclick="confirmar('eliminarTipo.php?id_tipo=<?php echo $fila['id_tipo']; ?>'); return false;"><img src="img/borrar.png" style="width:100px; height:32px;"> </a></td>
			</tr>   
			<?php } ?> 
		</table>
</section>
<?php include("footer.php") ?>
</body>
</html> 