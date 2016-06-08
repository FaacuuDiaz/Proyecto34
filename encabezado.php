<section class="hero">
		<header>
			<div class="wrapper">
				<a href="index.php"><img src="img/logo.png" class="logo" alt="" titl=""/></a>
				<a href="index.php" class="hamburger"></a>
			</div>	
						
			<div class="wrapper">
				<nav>
				<?php
				if(session_status()!=2)
				{
					session_start();
				}
				
				if(isset($_SESSION['usuario']))
				{
					$user=$_SESSION['usuario'];
					$nick = $_SESSION['nick'];
					$id = $_SESSION['id_usuario'];
					?>
					<a class="login_btn"  href="cerrar_sesion.php"> Cerrar sesion </a> 
					<a class="login_btn"  href="formulario.php?edit=true&var=1"> Editar perfil </a> 
					<a class="login_btn"  style="padding: 3px 16px 3px 3px; margin: 15px 0 0 0px;background: #ffffff;color: #1c3655;">
						<?php
						$con=connection();
						$result = mysqli_query($con,"Select * from usuario where id_usuario = $id");	
						$fila = mysqli_fetch_assoc($result);
						if(!empty($fila['foto']))
						{ 	?>
							<img src="mostrarFotoUser.php?id=<?php echo $id;?>"class="property_img"style="width:60px; height:60px;"/>
							<?php 
						}
						else
						{ 	?>
							<img src="img/perfil.png"style="width:60px; height:60px;"/>
							<?php
						}
						mysqli_close($con);
						?>
						<span>
							<?php echo "Bienvenido ".$_SESSION['nick']."!"; ?>
						</span>
					</a> 
					<?php 
				}
				else
				{ ?>
					<a href="formulario.php?var=2" class="login_btn">Iniciar sesion</a>
					<a href="formulario.php?var=3" class="login_btn">Registrarme</a>
					<?php
				} ?>
				</nav>
			</div>
		</header>
	</section>
<?php
		if(isset($_SESSION['usuario'])) {			?>							
	<section class="hero" style="background-color: #96ac3c;">
		<header>
			<div class="wrapper">
					<nav>
					
				
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					
					<?php 
					if($_SESSION['admin']== "si"){
					?>
					<li><a href="#">Couch</a>
						<ul>
							<li><a href="agregarHospedaje.php">Agregar couch</a></li>
							<li><a href="hospedajes.php">Listar mis couch</a></li>
						</ul>
					</li>
					<li><a href="listarTipos.php">Tipos de couch</a></li>
					<?php 
					}
					else
					{ ?>
					<li><a href="#">Couch</a>
						<ul>
							<li><a href="agregarHospedaje.php">Agregar couch</a></li>
							<li><a href="hospedajes.php">Listar mis couchs</a></li>
						</ul>
					</li>
					<?php
					}
					
					?>
					<li><a href="buscandoHospedaje.php">Buscar couch</a></li>
					<?php 
					
					if($_SESSION['premium'] == null){
					?>
						<li><a href="altaPremium.php">Alta Premium</a></li>
					<?php } ?>
				</ul>
				</nav>

				
			</div>

	<!--  end header section  --

			<section class="caption">
				<h2 class="caption">Find You Dream Home</h2>
				<h3 class="properties">Appartements - Houses - Mansions</h3>
			</section>
			-->
	</section>
		<?php } ?>