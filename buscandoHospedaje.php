<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>

<?php
	include("head.php");
	include("encabezado.php");
	?>

	<section class="listings">
		<div class="wrapper">
		<br>
			<div class="columnat">BUSQUEDA DE COUCH</div>
			</br>
	<form name="form1" action="buscarHospedaje.php" method="post">
	
	<input name="buscar" class="buscarFiltro" type="text">
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
				
				 
				?>
		
				
		</div>
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>