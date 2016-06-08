<?php
	include("head.php");
	include("encabezado.php");
	?>

	<section class="listings">
		<div class="wrapper">
		
		<br>
			<div class="columnat">DETALLE DEL COUCH</div>
			
			<?php require ('connection.php');
			$cont= connection();
			$consulta = "SELECT * from hospedaje where estado='habilitado'";
			if ($resultado = mysqli_query($cont, $consulta))
			{
				while ($hospedaje = mysqli_fetch_row($resultado)) 
				{
					if (($_GET['id']) > 0) 
					{ 
						$idh= $_GET['id']; 
						
						if ($idh == $hospedaje[0])
						{?>
							</br>
								<label>Titulo: </label><span><?php echo $hospedaje[1]; ?></span>
							</br>
							<label>Ciudad: </label><span><?php echo $hospedaje[2]; ?></span>
							</br>
							
							<label>Tipo: </label>
							<?php 
								$consulta = "SELECT * from tipo_hospedaje where estado='habilitado'";
								if ($res = mysqli_query($cont, $consulta))
									{
										while ($tipo = mysqli_fetch_row($res)) 
										{
											if($hospedaje[8]==$tipo[0])
											{?>
												<span><?php echo $tipo[1]; ?></span>
											<?php	
											};							
										}
									}
								mysqli_free_result($res);
							?>
							</select>
							</br>
							<label>Descripcion: </label><span><?php echo $hospedaje[5]; ?></span>
							</br>
							<label>Cantidad de personas: </label><span><?php echo $hospedaje[6]; ?></span>
							</br>
							<label>Usuario: </label>
							<span>
							
							<?php
								require_once('connection.php'); 
								$con=connection();
								$result = mysqli_query($con,"Select * from usuario where id_usuario = $hospedaje[9]");	
								$f = $result->fetch_row() ;
								if(!empty($f[0]))
								{
									print ($f[3]." ".$f[4]);
								}
							?>	
							</span>
							
							</br>
							<label>Imagen: </label>
							</br>
							<?php
								
									if($hospedaje[3]==null)
									{?>
									<img src="img/foto.png"style="width:340px; height:255px;"/>
									<?php
									}
									else
									{ ?>
										<img src="mostrarImagen.php?id=<?php echo $hospedaje[0];?>"class="property_img"style="width:340px; height:255px;"/>
									<?php 
									}
								
								
								//mysqli_close($con);
								
						}
					}
				}
			}
			?>		
				
				</br>
		
			
		<div>PROMEDIO: </div>
		<?php
				//require ('connection.php');
				$cont= connection();
				$id_hospedaje=$_GET['id'];
				$consulta = "SELECT avg(comentario.puntuacion) FROM hospedaje_comentario inner join hospedaje on hospedaje_comentario.id_hospedaje = hospedaje.id_hospedaje 
							inner join comentario on comentario.id_comentario = hospedaje_comentario.id_comentario
				
				where hospedaje.id_hospedaje = $id_hospedaje";
				if ($resultado = mysqli_query($cont, $consulta))
					{
						while ($fila = mysqli_fetch_row($resultado)) 
						{ 
							echo $fila[0];
							
						}
					}
				?>
		
		<div class="columnat">PREGUNTAS</div>
		<div>
		
		<?php
				//require ('connection.php');
				$cont= connection();
				$id_hospedaje=$_GET['id'];
				$consulta = "SELECT * from preg_resp where id_hospedaje = $id_hospedaje";
				if ($resultado = mysqli_query($cont, $consulta))
					{
						while ($fila = mysqli_fetch_row($resultado)) 
						{ 
							echo $fila[1];
							
						}
					}
				//mysqli_free_result($resultado);
				?>
		
		</div>
		<?php
		
		//session_start();
                if(isset($_SESSION['usuario'])) 
				{
				
					$cont= connection();
					$id_usuario=$_SESSION['id_usuario'];
					$consulta = "SELECT * from solicitudes inner join hospedaje on solicitudes.id_hospedaje = hospedaje.id_hospedaje
					where hospedaje.idusuario = $id_usuario and solicitudes.id_hospedaje = $id_hospedaje";
					if ($resultado = mysqli_query($cont, $consulta))
					{
						$r=$resultado->fetch_assoc();
						if($r!=0)
						{ ?>
					 
					<form action="verReservas.php" method="post">
							<div class="more_listing">
								<input style="visibility:hidden" name="id" value="<?php echo $id_hospedaje; ?>" />
								</br>
								<input value="ver reservas" type="submit" class="more_listing_btn" style="background-color: white;" />
							<!--	<a  type= "submit" href="#" class="more_listing_btn">Ver reservas</a> -->
							</div>
							</form>
						<?php	
						}
					}
				}
				
		?>
		<!-- <a href="javascript:history.go(-1)"><input type="button" value="Volver" class="input"></a> -->
		</div>
		
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>