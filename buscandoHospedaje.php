<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>

<?php
	include("head.php");
	include("encabezado.php");
	?>
<script type="text/javascript" src="js/verificarFecha.js"></script>
	<section class="listings">
		<div class="wrapper">
			<div class="columnat">BUSQUEDA DE COUCH</div>
			</br>
				<form name="form1" action="buscarHospedaje.php" method="post" onsubmit="return validarFechaBusqueda()">
				Texto a buscar:
				<?php if(isset($_POST['buscar'])){$buscar=$_POST['buscar'];}?>
					
				<input name="buscar" class="buscarFiltro" type="text" value="<?php if(isset($_POST['buscar'])){ echo $_POST['buscar'];} ?>">
				
				Fecha desde:
				<input name="fechaDesde" id="fechaDesde" class="buscarFiltro" type="date"value="<?php if(isset($_POST['fechaDesde'])){ echo $_POST['fechaDesde'];} ?>">
				
				Fecha hasta:
				<input name="fechaHasta" id="fechaHasta" class="buscarFiltro" type="date"value="<?php if(isset($_POST['fechaHasta'])){ echo $_POST['fechaHasta'];} ?>">
				
				Tipo: 
			
			<select name="tipos">
			<option value="null">Seleccione un tipo de couch</option>
			<?php 
				require_once ('connection.php');
				$cont= connection();
				$consulta = "SELECT * from tipo_hospedaje where estado='habilitado'";
				if ($resultado = mysqli_query($cont, $consulta))
				{
					while ($fila = mysqli_fetch_assoc($resultado)) 
					{	?>
						<option value="<?php echo $fila['id_tipo']; ?>"
						<?php if((isset($_POST['tipos']))&&($_POST['tipos'] == $fila['id_tipo']))
						{ echo "selected='selected'"; } ?> > <?php echo $fila['nombre_tipo']; ?></option>
						<?php	
					}
				}
				mysqli_free_result($resultado);
			?>
			</select>
				
				
				<input class="buscarFiltro" type="submit"  value="Buscar">
	
	</form>
	</br>
	</br>
		
				<?php 
				
				if (!empty($hospedajes))
				{
					$r = $hospedajes->num_rows;

					if($r==0)
					{
						 ?>
						<div class="resBus">No se encontraron resultados de la búsqueda</div>
						<?php
					}
					else
					{
					
					
					
					?>
					<ul class="properties_list">
					<?php
					
					while ($fila = mysqli_fetch_row($hospedajes)) 
						{?>
							<li>
							
							
							<?php require_once('connection.php'); 
								$con=connection();
								$result = mysqli_query($con,"Select premium from usuario where id_usuario = $fila[9]");	
								$f = $result->fetch_row() ;
								if(!empty($f[0]))
								{
									if($fila[3]==null)
									{?>
									<img src="img/foto.png"style="width:340px; height:255px;"/>
									<?php
									}
									else
									{ ?>
										<img src="mostrarImagen.php?id=<?php echo $fila[0];?>"class="property_img"style="width:340px; height:255px;"/>
									<?php 
									}
								}
								else
								{?>
									<img src="img/foto.png"style="width:340px; height:255px;"/>
								<?php
								}
								mysqli_close($con);
							?>
							
							<span class="price"><?php echo $fila[1];?></span>

							<div class="property_details">
								<h1><?php echo $fila[5];?></h1>
								<a href="detalleHospedaje.php?id=<?php echo $fila[0];?>">
								<h2>VER MAS DETALLES..</h2>
								</a>
							</div>
							
							<br>
							</li>
						<?php	
						}
						?>
						
					</ul>
					<?php
					//mysqli_free_result($resultado);
					}
				}
				else
				{
					 ?>
						<div class="resBus">Seleccione una busqueda!</div>
						<?php
				}
				?>
		
				
		</div>
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>