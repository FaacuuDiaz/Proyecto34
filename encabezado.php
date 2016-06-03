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
				
				if(isset($_SESSION['usuario'])) {
							$user=$_SESSION['usuario'];
							$nick = $_SESSION['nick'];
							$id = $_SESSION['id_usuario'];
				?>					
				
				<a class="login_btn"  href="cerrar_sesion.php"> Cerrar sesion </a> 
				<a class="login_btn"  href="formulario.php?edit=true&var=1"> Editar perfil </a> 

						
				<?php
				echo "Bienvenido ".$_SESSION['nick']."!";
				}
				else{ ?>
					
					<a href="formulario.php?var=2" class="login_btn">Iniciar sesion</a>
					<a href="formulario.php?var=3" class="login_btn">Registrarme</a>
				
				<?php  } ?>
				</nav>
			</div>
		</header>
	</section>
<?php
		if(isset($_SESSION['usuario'])) {			?>							
	<section class="hero" style="background-color: #96ac3c;">
		<header>
		<style>
		ul#menu {
    font-family: "lato-regular", Helvetica, Arial, sans-serif;
    font-size: 16px;
    letter-spacing: 1px;
 width: 1085px;
 float:left;
 padding: 5px;
}
  
ul#menu li {
 color: #fff;
 float: left;
 list-style: none;
 margin: 0% 2%;
}
  
ul#menu li:hover{
 color: #aaa073;
 cursor:pointer;
}
  
ul#menu ul {
 display: none;
 position: absolute;
 top: 49px;
 background: #96ac3c;
 color: #fff;
 padding: 5px 0px 5px 5px;
 margin: 0;
 }
  
ul#menu ul li{
 float: left;
 color: #96ac3c;
 width:100%;
 margin:2% 0%;
}
 
 
ul#menu ul li a{
 color: #fff;
}
  
ul#menu ul li a:hover{
 color: black;
 cursor:pointer;
}
  
ul#menu li:hover ul ul,ul#menu li:hover ul ul ul,ul#menu li.iehover ul ul,ul#menu li.iehover ul ul ul {
 display: none;
 cursor:pointer;
}
  
ul#menu li:hover ul,ul#menu ul li:hover ul,ul#menu ul ul li:hover ul,ul#menu li.iehover ul,ul#menu ul li.iehover ul,ul#menu ul ul li.iehover ul {
 display: block;
 cursor:pointer;
}
		</style>
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