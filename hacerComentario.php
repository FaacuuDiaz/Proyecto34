<?php
	include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	require_once ('connection.php');
	include("head.php"); include("encabezado.php");
	?>
<section class="div_formulario">
		<div class="wrapperw">
<form class="formulario" action="comentando_usuario.php" method="post" >
<div class="columnat">COMENTAR USUARIO</div>
			</br>
    
	<select name="punt" required style="width: 44.5%;">
	    <option value="">Elija una puntuacion</option>
		<option value=1>1</option>
		<option value=2>2</option>
		<option value=3>3</option>
		<option value=4>4</option>
		<option value=5>5</option>
	</select>	
	<textarea placeholder="Escriba su comentario aqui..." rows="5" cols="50" name="comentario"></textarea>
	<input name="id_u" type="hidden" value="<?php echo $_GET['id_u'] ?>"/>
	<p><button type="submit" id="listo" name="listo"> Dejar comentario </button></p>
	<a href="verUsuariosHospedados.php"><button  type="button" name="cancelar" > Cancelar </button> </a>
</form>
</div>
</section>

<?php include("footer.php") ?>
</body>
</html>