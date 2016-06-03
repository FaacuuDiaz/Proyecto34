<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>



	<?php include("head.php") ?>
	<?php include("encabezado.php") ?>

	<section class="div_formulario">
		<div class="wrapperw">
		<form class="formulario" action="agregandoHospedaje.php" method="POST"  enctype="multipart/form-data"  onsubmit="return validarFecha()">
		<br>
			<div class="columnat">AGREGAR COUCH</div>
			</br>
			<p>Titulo: <input type="text" name="titulo" class="input" required></p>
			
			
			<p>Ciudad: <input type="text" name="ciudad" class="input" required></p>
			
			
			<p>Tipo: 
			
			<select name="tipos" required style="width: 44.5%;">
			<option value="">Seleccione un tipo de couch</option>
			<?php 
				require ('connection.php');
				$cont= connection();
				$consulta = "SELECT * from tipo_hospedaje where estado='habilitado'";
				if ($resultado = mysqli_query($cont, $consulta))
					{
						while ($fila = mysqli_fetch_row($resultado)) 
						{?>
							<option value="<?php print($fila[0]) ?>"><?php printf ($fila[1]) ?></option>
				
					<?php	
						}
					}
				mysqli_free_result($resultado);
				
			?>
			
			
			</select>
			</p>
			
			<p>Descripcion: <input type="text" name="descripcion" class="input" required></p>
			
			
			<p>Cantidad de personas: <input type="numer" name="cantPers" class="input" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"required></p>
			
			
			
			
			<p>Elige una imagen: <input type="file" name="foto" class="input"><br></p>
			
			
				</br>			
			<input type="submit" value="Agregar"class="input" style="margin-right: 0%;">
			<a href="hospedajes.php"><input type="button" value="Cancelar" class="input" style="margin-right: 0%;"></a>
		</form>
		</div>
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>