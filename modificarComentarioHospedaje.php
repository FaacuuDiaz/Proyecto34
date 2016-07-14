<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	require_once ('connection.php');
	include("head.php"); include("encabezado.php");
	?>
<section class="div_formulario">
		<div class="wrapperw">
<form class="formulario" action="modificandoComentarioHospedaje.php" method="post" >
<div class="columnat">MODIFICAR COMENTARIO A COUCH</div>
			</br>
    <?php
		require_once ('connection.php');
			$cont= connection();
			$consulta = "SELECT * from comentario";
			if ($resultado = mysqli_query($cont, $consulta))
			{
				while ($comentario = mysqli_fetch_assoc($resultado)) 
				{
					if (($_GET['id']) > 0) 
					{ 
						$idc= $_GET['id']; 
						if ($idc == $comentario['id_comentario']) 
						{
	?>
	
	<select name="puntuacion" required style="width: 44.5%;">
	    <option value="">Elija una puntuacion</option>
		<option value=1 <?php if($comentario['puntuacion']==1){ echo "selected='selected' "; } ?> >1</option>
		<option value=2 <?php if($comentario['puntuacion']==2){ echo "selected='selected' "; } ?> >2</option>
		<option value=3 <?php if($comentario['puntuacion']==3){ echo "selected='selected' "; } ?> >3</option>
		<option value=4 <?php if($comentario['puntuacion']==4){ echo "selected='selected' "; } ?> >4</option>
		<option value=5 <?php if($comentario['puntuacion']==5){ echo "selected='selected' "; } ?> >5</option>
	</select>	
	<textarea rows="5" cols="50" name="comentario"><?php echo $comentario['comentario']; ?></textarea>
	<input name="id" type="hidden" value="<?php echo $_GET['id'] ?>"/>
	<p><button type="submit" id="listo" name="listo"> Modificar comentario </button></p>
	<a href="verUsuariosHospedados.php"><button  type="button" name="cancelar" > Cancelar </button> </a>

	<?php
			}}}}
			?>
	</form>
</div>
</section>

<?php include("footer.php") ?>
</body>
</html>