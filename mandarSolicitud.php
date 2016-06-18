<?php
	include("head.php");
	include("encabezado.php");
	?>

<section class="div_formulario" id="formulario_usuario" action="mandandoSolicitud.php">
		<form class="formulario" method="POST" action="mandandoSolicitud.php">
			<div class="columnat">ENVIAR SOLICITUD</div>
		</br>
			 <input type="hidden" name="idh" value="<?php echo $_POST['idh']; ?> "/>
			  <input type="hidden" name="idu" value="<?php echo $_POST['idu']; ?> "/>
			Ingrese fecha desde: <input type="date" name="fechaD" required min="<?php echo date('Y-m-d')?>" /> &nbsp
			</br>
			Ingrese fecha hasta: <input type="date" name="fechaH" required/> </br></br>
			<textarea placeholder="Escriba una breve descripcion de la solicitud..." name="mensaje" id="mensaje" rows="3" cols="40"></textarea></br></br>
			<p><button type="submit" name="listo" >Enviar Solicitud</button></p>
			<a href="index.php"><button type="button" name="cancelar" > Cancelar </button></a>
			
		</form>
</section>
	
<?php include("footer.php") ?>	
</body>
</html>