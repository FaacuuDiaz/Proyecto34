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
			<div class="columnat">BUSQUEDA DE USUARIO</div>
			</br>
				<form name="form1" action="buscarUsuario.php" method="post">
				Usuario a buscar:
				<?php if(isset($_POST['buscar'])){$buscar=$_POST['buscar'];}?>
					
				<input name="buscar" class="buscarFiltro" type="text" value="<?php if(isset($_POST['buscar'])){ echo $_POST['buscar'];} ?>" required>
				
			
				
				<input class="buscarFiltro" type="submit"  value="Buscar">
	
	</form>
	</br>
	</br>
		
				<?php 
				
				if (!empty($usuarios))
				{
					$r = $usuarios->num_rows;

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
					
					while ($fila = mysqli_fetch_assoc($usuarios)) 
						{?>
							<li>
							
							
							<?php require_once('connection.php'); 
								
									if($fila['foto']==null)
									{?>
									<img src="img/perfil.png"style="width:340px; height:255px;"/>
									<?php
									}
									else
									{ ?>
										<img src="mostrarFotoUser.php?id=<?php echo $fila['id_usuario'];?>"class="property_img"style="width:340px; height:255px;"/>
									<?php 
									}
								
								
							?>
							
							<span class="price"><?php echo $fila['nombre']," ",$fila['apellido'];?></span>

							<div class="property_details">
								<h1><?php echo $fila['nick'];?></h1>
								<h1><?php echo $fila['email'];?></h1>
								<!-- <a href="detalleHospedaje.php?id=<?php echo $fila[0];?>">
								<h2>VER MAS DETALLES..</h2>
								</a>
								-->
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