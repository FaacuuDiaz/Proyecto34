<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	include("head.php");
	include("encabezado.php");
	?>
	<section class="div_formulario">
		<div class="wrapper">
		<form class="formulario" action="modificandoHospedaje.php" method="POST"  enctype="multipart/form-data"  onsubmit="return validarFecha()">
			</br>
			<div class="columnat">MODIFICAR COUCH</div>
			<?php 
			require_once ('connection.php');
			$cont= connection();
			$consulta = "SELECT * from hospedaje";
			if ($resultado = mysqli_query($cont, $consulta))
			{
				while ($hospedaje = mysqli_fetch_row($resultado)) 
				{
					if (($_GET['id']) > 0) 
					{ 
						$idh= $_GET['id']; 
						if ($idh == $hospedaje[0]) 
						{
						?>
							<input name="id" value="<?php echo $hospedaje[0]; ?>" style="visibility:hidden">
							<p>Titulo: <input type="text" name="titulo" class="input" value="<?php echo $hospedaje[1]; ?>" required></p>
							<p>Ciudad: <input type="text" name="ciudad" class="input" value="<?php echo $hospedaje[2]; ?>"required></p>
							<p>Tipo: <select name="tipos" required style="width: 44.5%;">
							<option value="">Seleccione un tipo de hospedaje</option>
							<?php 
							$consulta = "SELECT * from tipo_hospedaje where estado='habilitado'";
							if ($res = mysqli_query($cont, $consulta))
							{
								while ($tipo = mysqli_fetch_row($res)) 
								{	?>
									<option value="<?php echo $tipo[0];?>"<?php if($hospedaje[8]==$tipo[0]){echo  "selected='selected' ";};?>><?php echo $tipo[1];?> </option>
									<?php
								}		
							}
							mysqli_free_result($res);
				
			?>
			</select></p>
			
			<p>Descripcion: <input type="text" name="descripcion" class="input" value="<?php echo $hospedaje[5]; ?>"required></p>
			
			<p>Cantidad de personas: <input type="text" name="cantPers" class="input"  value="<?php echo $hospedaje[6]; ?>" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;" required></p>
			
			
			<p style="text-align: center;">Estado: 
			<?php
				if($hospedaje[7]=="habilitado")
				{
					?> <input type="checkbox" name="estado" value="habilitado" checked style="width: 6%;"> Habilitado
					<?php
				}
				else
				{
					?> <input type="checkbox" name="estado" value="deshabilitado" style="width: 6%;"> Habilitado
					<?php
				}
			?>
			</p>
			
			
			<p>Elige una imagen: 
			<input type="file" name="foto" class="input"><br>
			</p>
			<?php
			if($hospedaje[3]!=null)
				{?>
					<p style="text-align:center;"><img src="mostrarImagen.php?id=<?php echo $hospedaje[0];?>"class="property_img"style="width:340px; height:255px;"/></p>
				<?php
				}
			
			?>
			
			
				</br>			
				
	<?php }}}} ?>		
				
				
			<input type="submit" value="Modificar"class="input"  style="margin-right: 0%;">
			<a href="hospedajes.php"><input type="button" value="Cancelar" class="input" style="margin-right: 0%;"></a>
		</form>
		</div>
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>