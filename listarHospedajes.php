<?php
	include("head.php");
	include("encabezado.php");
	?>
	<section class="listings">
		<div class="wrapper">
		<br>
			
			</br>
	
	
		<ul class="properties_list">
				<?php
				require ('connection.php');
				$cont= connection();
				$consulta = "SELECT * from hospedaje where estado='habilitado'";
				if ($resultado = mysqli_query($cont, $consulta))
					{
						while ($fila = mysqli_fetch_row($resultado)) 
						{ ?>
							<li>
							
							
							<?php 
							//require_once('connection.php'); 
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
								{ ?>
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
					}
				//mysqli_free_result($resultado);
				?>
		</ul>
				
		</div>
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>