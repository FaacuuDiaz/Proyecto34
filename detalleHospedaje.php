<?php
	include("head.php");
	include("encabezado.php");
	
	?>
	<script type="text/javascript">
		function confirmarRespuesta(url)
		{
			if (!confirm("Seguro que quiere eliminar la respuesta?")) 
			{
				return false;
			}
			else
			{
				document.location = url;
				return true;
			}
		}
		function confirmarPregunta(url)
		{
			if (!confirm("Seguro que quiere eliminar la pregunta?")) 
			{
				return false;
			}
			else
			{
				document.location = url;
				return true;
			}
		}
	</script>
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
		<a onClick=" document.getElementById('titulo_comentario').hidden=false; document.getElementById('contenido_comentario').hidden=false;" href="detalleHospedaje.php?id=<?php echo $_GET['id'] ?>#titulo_comentario">
								
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
		 </a>
 		</br>
		
		
		
 		</br>
		<?php
		$link = connection();
		$id_h = $_GET['id'];
		if(isset($_SESSION['usuario']))
		{
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
				</br>
					<input style="visibility:hidden; width:1px;" name="id" value="<?php echo $id_h; ?>" />
					<input value="Ver Solicitudes" type="submit" class="btn_soli" />
				</form>
				<?php 
				//echo	"<a  class='btn_soli'  href=verSolicitudes.php> Ver solicitudes </a>";
			}	
			else if(mysqli_num_rows($r) ==0 || $aux2['estado']=='rechazada')
			{	echo $aux2['estado']; ?>
				<form action="mandarSolicitud.php" method="post">
				</br>
					<input style="visibility:hidden; width:1px;" name="idh" value="<?php echo $id_h; ?>"  />
					<input style="visibility:hidden; width:1px;" name="idu" value="<?php echo $id_u; ?>" />
					</br>
					<input value="Enviar Solicitud" type="submit" class="btn_soli" />
				</form>
				<?php
				//echo    "<a  class='btn_soli'  href=mandarSolicitud.php?idh=$id_h&idu=$id_u> Enviar solicitud </a>";
			}
			else
			{
				echo '</br></br></br>';
				echo "Ya enviaste una solicitud por este hospedaje, el estado de la solicitud es: ".$aux2['estado'] ;
			}													
		}
		}
					}
				}
			}
			?>		
				
				</br></br></br>
			

		
		
		<?php
		$cont= connection();
		$id_hospedaje=$_GET['id'];
		if(isset($_SESSION['usuario']))
		{
			$cons = "SELECT * from hospedaje h where h.id_hospedaje = $id_hospedaje";
			if ($resultado = mysqli_query($cont, $cons))
			{
				if ($hospedaje = mysqli_fetch_assoc($resultado)) 
				{
					$id = $_SESSION['id_usuario'];
					if($hospedaje['idusuario']!= $id)
					{
						
						?>	<form class="formulariog" action="hacerPregunta.php" method="post" >
								<input name="id_usuario" value="<?php echo $id; ?>" style="visibility:hidden" />
								<input name="id_hospedaje" value="<?php echo $id_hospedaje; ?>" style="visibility:hidden" />
								</br>
								Escriba aqui su pregunta: <input type="text" name="pregunta" required="true" />
								<button type="submit" id="listo" name="listo"> Enviar </button>
								
							</form>
							</br>
							</br>
							</br>
							
						<?php
					}
				}
			}
		}
		$consulta = "SELECT * from preg_resp pr inner join usuario u on pr.id_usuario=u.id_usuario where id_hospedaje = $id_hospedaje";
		if ($resultado = mysqli_query($cont, $consulta))
		{
			if(mysqli_num_rows($resultado)>0){
				?>
				<div class="columnat">PREGUNTAS</div></br> 
				<ul style="list-style: none;">
				
				<?php
				while ($fila = mysqli_fetch_assoc($resultado)) 
				{	?> 
					
					<li><img src="img/pregunta.png" style="width:22px; height:22px;">
					<?php echo $fila['pregunta'];
					if(isset($_SESSION['id_usuario']))
					{
						$idu = $_SESSION['id_usuario'];
						if($fila['id_usuario']==$idu)
						{
							?>
							<a href="javascript:;" onclick="confirmarPregunta('borrarPregunta.php?id=<?php echo $fila['id_preg_resp']; ?>&idh=<?php echo $id_hospedaje; ?>'); return false;"><img src="img/eliminar.gif" style="width:20px; height:20px;"></a>
							<a onClick=" document.getElementById('modificar_pregunta<?php echo $fila['id_preg_resp'];?>').hidden=false;" href="detalleHospedaje.php?id=<?php echo $_GET['id'] ?>#modificar_pregunta">
							<img src="img/modificar.png" style="width:20px; height:20px;"></a>
							<div hidden=true id="modificar_pregunta<?php echo $fila['id_preg_resp'];?>">
								<form class="formulariog" action="modificarPregunta.php" method="post" >
									<input name="id_preg_resp" value="<?php echo $fila['id_preg_resp']; ?>" style="visibility:hidden" />
									<input name="id_hospedaje" value="<?php echo $id_hospedaje; ?>" style="visibility:hidden" />
									</br>
									Modifique aqui su pregunta: <input type="text" name="pregunta" required="true" />
									<button type="submit" id="listo" name="listo"> Enviar </button>
									<a onClick=" document.getElementById('modificar_pregunta<?php echo $fila['id_preg_resp'];?>').hidden=true;" href="#">
									<button type="button" name="cancelar" > Cancelar </button></a>
								</form>
								</br>
							</div>
							
							
							<?php
						}
					}
					$mia[0]=false;
					if(isset($_SESSION['usuario']))
						{
							$con= connection();
							$cons = "SELECT * from hospedaje h where h.id_hospedaje = $id_hospedaje";
							if ($resul = mysqli_query($con, $cons))
							{
								if ($h = mysqli_fetch_assoc($resul)) 
								{
									$id = $_SESSION['id_usuario'];
									if($h['idusuario']== $id)
									{
										$mia[0]=true;
						}}}}
					
					
					
					if($fila['respuesta']!=NULL)
					{	?>
						<ul style="list-style: none;margin-left: 18px;">
							<li>
								<img src="img/respuesta.jpg" style="width:22px; height:22px;">
								<?php echo $fila['respuesta']; 
								if($mia[0]==true)
								{
									?>
									<a href="javascript:;" onclick="confirmarRespuesta('borrarRespuesta.php?id=<?php echo $fila['id_preg_resp']; ?>&idh=<?php echo $id_hospedaje; ?>'); return false;"><img src="img/eliminar.gif" style="width:20px; height:20px;"></a>
									<a onClick=" document.getElementById('modificar_respuesta<?php echo $fila['id_preg_resp'];?>').hidden=false;" href="detalleHospedaje.php?id=<?php echo $_GET['id'] ?>#modificar_respuesta">
										<img src="img/modificar.png" style="width:20px; height:20px;">
									</a>
										<div hidden=true id="modificar_respuesta<?php echo $fila['id_preg_resp'];?>">
											<form class="formulariog" action="modificarRespuesta.php" method="post" >
												<input name="id_preg_resp" value="<?php echo $fila['id_preg_resp']; ?>" style="visibility:hidden" />
												<input name="id_hospedaje" value="<?php echo $id_hospedaje; ?>" style="visibility:hidden" />
												</br>
												Modifique aqui su respuesta: <input type="text" name="respuesta" required="true" />
												<button type="submit" id="listo" name="listo"> Enviar </button>
												<a onClick=" document.getElementById('modificar_respuesta<?php echo $fila['id_preg_resp'];?>').hidden=true;" href="#">
												<button type="button" name="cancelar" > Cancelar </button></a>
											</form>
											</br>
										</div>
									
									
									
									<?php
								}
								?>
							</li>
						</ul>
						<?php
					}
					else if(($fila['respuesta']==NULL)&&($mia[0]==true))
					{
						$id_hospedaje=$_GET['id'];
						?>	
						<ul style="list-style: none;margin-left: 18px;">
							<li>
								<form class="formulariog" action="responderPregunta.php" method="post" >
									<input name="id_hospedaje" value="<?php echo $id_hospedaje; ?>" style="visibility:hidden" />
									<input name="id_preg_resp" value="<?php echo $fila['id_preg_resp']; ?>" style="visibility:hidden" />
									</br>
									Escriba aqui su respuesta: <input type="text" name="respuesta" required="true" />
									<button type="submit" id="listo" name="listo"> Responder </button>
								</form>
								</br>
							</li>
						</ul>
						<?php
					}
					else
					{
						
					}
					?>
					</li> 
					<li> ------------------------------------ </li>
					<?php
				}
				?>
				</ul>
				<?php
			}
		}
		
		?>
		
		</br></br></br>
		<div hidden=true id="titulo_comentario" class="columnat">COMENTARIOS</div>
		<div hidden=true id="contenido_comentario">
		<?php
		$cont= connection();
		$id_hospedaje=$_GET['id'];
		$consulta = "SELECT u.nick, c.puntuacion, c.comentario from comentario c inner join hospedaje_comentario hc ON c.id_comentario=hc.id_comentario inner join usuario u ON c.id_usuario=u.id_usuario where id_hospedaje = $id_hospedaje";
		if ($resultado = mysqli_query($cont, $consulta))
		{
			while ($fila = mysqli_fetch_array($resultado)) 
			{ ?>
				<div class="comentario">	 <?php
				echo "<p>".$fila['nick']." dice: </p>";
				echo "</br> Puntuacion: ";
				echo $fila['puntuacion'];
				echo "</br>";
				echo $fila['comentario']; ?>
				</div> <?php
			}
		}
		
		?>
		
		</div>
		</div>
		</div>
		
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>