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
						<?php
						require_once('connection.php'); 
						$con=connection();
						$result = mysqli_query($con,"Select * from usuario where id_usuario = $id");	
						$fila = mysqli_fetch_assoc($result);
						if(!empty($fila['premium']))
						{ 	?>
							<a class="login_btn" href="verPerfil.php" style="padding: 3px 16px 3px 3px; margin: 15px 0 0 0px;background: #ffbf00;color: #1c3655;">
							<?php
						}
						else
						{ 	?>
							<a class="login_btn" href="verPerfil.php" style="padding: 3px 16px 3px 3px; margin: 15px 0 0 0px;background: #ffffff;color: #1c3655;">
							<?php
						}
						if(!empty($fila['foto']))
						{ 	?>
							<div style="float: left;">
								<img src="mostrarFotoUser.php?id=<?php echo $id;?>"class="property_img"style="width:60px; height:60px;"/>
							</div>
							<?php 
						}
						else
						{ 	?>
							<div style="float: left;">
								<img src="img/perfil.png"style="width:60px; height:60px;"/>
							</div>
							<?php
						}
						mysqli_close($con);
						?>
						<div style="float: right;margin-top: 22px;margin-left: 14px;">
							<?php echo "Bienvenido ".$_SESSION['nick']."!"; ?>
						</div>
					</a> 
					<?php 
				}
				else
				{ 	?>
					<a href="formulario.php?var=2" class="login_btn">Iniciar sesion</a>
					<a href="formulario.php?var=3" class="login_btn">Registrarme</a>
					<?php
				} ?>
				</nav>
			</div>
		</header>
	</section>
<?php
	if(isset($_SESSION['usuario'])) 
	{	?>							
		<section class="hero" style="background-color: #96ac3c;">
			<header>
				<div class="wrapper">
				<nav>
					<ul id="menu">
						<li><a href="index.php">Home</a></li>
					<?php 
					if($_SESSION['admin']== "si")
					{	?>
						<li><a href="#">Couch</a>
							<ul>
								<li><a href="agregarHospedaje.php">Agregar couch</a></li>
								<li><a href="hospedajes.php">Listar mis couch</a></li>
								<li><a href="verHospedajesVisitados.php">Couchs visitados</a></li>
							</ul>
						</li>
						<li><a href="#">Tipos de Couch</a>
							<ul>
								<li><a href="formulario.php?var=4">Agregar tipo de Couch</a></li>
								<li><a href="listarTipos.php">Listar tipos de Couch</a></li>
							</ul>
						</li>
						<li><a href="#">Reportes</a>
							<ul>
								<li><a href="reportarAceptadas.php">Reportar solicitudes aceptadas</a></li>
								<li><a href="reportarPremium.php">Reportar usuarios premium</a></li>
								<li><a href="reportarHospedajes.php">Reportar todos los couchs</a></li>

							</ul>
						</li>
					<?php 
					}
					else
					{ ?>
						<li><a href="#">Couch</a>
							<ul>
								<li><a href="agregarHospedaje.php">Agregar couch</a></li>
								<li><a href="hospedajes.php">Listar mis couchs</a></li>
								<li><a href="verHospedajesVisitados.php">Couchs visitados</a></li>
							</ul>
						</li>
					<?php
					}
					
					?>
						<li><a href="#">Buscar</a>
							<ul>
								<li><a href="buscandoHospedaje.php">Buscar couch</a></li>
								<li><a href="buscandoUsuario.php">Buscar usuario</a></li>
							</ul>
						</li>
						<li><a href="#">Solicitudes</a>
							<ul>
								<li><a href="misSolicitudesEnviadas.php">Enviadas</a></li>
								<li><a href="misSolicitudesRecibidas.php">Recibidas</a></li>
							</ul>
						</li>
						<li><a href="verUsuariosHospedados.php"> Usuarios Hospedados</a></li>
						
					<?php 
					
					if($_SESSION['premium'] == null)
					{	?>
						<li><a href="altaPremium.php">Alta Premium</a></li>
						<?php 
					} ?>
					</ul>
				</nav>
				</div>
		</section>
	<?php
	}
	?>