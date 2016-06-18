<?php
	include("head.php");
	include("encabezado.php");
	?>
	<section class="listings">
		<div class="wrapper">
		<br>
			<div class="columnat">DETALLE DEL COUCH</div>
			<?php
			require_once ('connection.php');
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
								echo '</br></br>';
								?>
							
		<div>PROMEDIO: </div>

		<link rel="stylesheet" type="text/css" href="css/star_rating.css">
				
		<ul class="stars stars-32" data-value="4.5" data-votes="1866" data-id="3">
		<?php
				//require ('connection.php');
				$cont= connection();
				$id_hospedaje=$_GET['id'];
				$consulta = "SELECT avg(comentario.puntuacion) FROM hospedaje_comentario inner join hospedaje on hospedaje_comentario.id_hospedaje = hospedaje.id_hospedaje 
							inner join comentario on comentario.id_comentario = hospedaje_comentario.id_comentario
				
				where hospedaje.id_hospedaje = $id_hospedaje";
				if ($resultado = mysqli_query($cont, $consulta))
					{
						if ($fila = mysqli_fetch_row($resultado)) 
						{ 
							
							$r=$fila[0];
							if($r==null)
							{
								?>
								<li data-vote="1" style="background-position: 0px 0px;">1</li>
								<?php
							}
							for ($i = 1; $i <= $r; $i++) 
							{
								?>
								<li data-vote="1" style="background-position: 0px -27px;">1</li>
								<?php
							}
							$resto=fmod ($r,1);
							if(($resto>0)&&($resto<1))
							{ 	?>
								<li data-vote="2" style="background-position: 0px -27px;width:13px;">2</li>
								<?php
							} 
						}
					}
				?>
		</ul>	
								
								<?php
								
								
								
								
								$link = connection();
								$id_h = $_GET['id'];
								$id_u = $_SESSION['id_usuario'];
								$consulta = "SELECT idusuario FROM hospedaje WHERE id_hospedaje='$id_h' ";
								$result = mysqli_query($link,$consulta);
								$aux = mysqli_fetch_array($result);
								$consulta2 = "SELECT * FROM  solicitudes WHERE id_usuario='$id_u' and id_hospedaje='$id_h'";
								$r= mysqli_query($link,$consulta2);
								$aux2 = mysqli_fetch_array($r);
						
								if($aux['idusuario']== $id_u)
								{ 	?>
									<form action="verSolicitudes.php" method="post">
										<input style="visibility:hidden" name="id" value="<?php echo $id_h; ?>" />
										</br>
										<input value="Ver Solicitudes" type="submit" class="btn_soli" />
									</form>
									<?php 
									//echo	"<a  class='btn_soli'  href=verSolicitudes.php> Ver solicitudes </a>";
								}	
							
									
								else if(mysqli_num_rows($r) ==0 || $aux2['estado']=='rechazada')
								{	?>
									<form action="mandarSolicitud.php" method="post">
										<input style="visibility:hidden" name="idh" value="<?php echo $id_h; ?>" />
										</br>
										<input style="visibility:hidden" name="idu" value="<?php echo $id_u; ?>" />
										</br>
										<input value="Enviar Solicitud" type="submit" class="btn_soli" />
									</form>
									<?php
									//echo    "<a  class='btn_soli'  href=mandarSolicitud.php?idh=$id_h&idu=$id_u> Enviar solicitud </a>";
								}
								else
								{
									echo "Ya enviaste una solicitud por este hospedaje, el estado de la solicitud es: ".$aux2['estado'] ;
								}													
								//mysqli_close($con);
									
						}
					}
				}
			}
			?>		
				
				</br>
		
			</br>
			</br>

		</br>
		</br>
		</br>

		</div>

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
		/*
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
				
		*/
		?>
		<!-- <a href="javascript:history.go(-1)"><input type="button" value="Volver" class="input"></a> -->
		</div>
		
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>