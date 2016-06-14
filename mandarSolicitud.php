<?php
	include("head.php");
	include("encabezado.php");
	?>

<section class="div_formulario" id="formulario_usuario" action="mandandoSolicitud.php">
		<form class="formulario" method="POST" action="mandandoSolicitud.php">
			 <input type="hidden" name="idh" value="<?php echo $_GET['idh']; ?> "/>
			  <input type="hidden" name="idu" value="<?php echo $_GET['idu']; ?> "/>
			Ingrese fecha desde: <input type="date" name="fechaD" required min="<?php echo date('Y-m-d')?>" /> &nbsp
			Ingrese fecha hasta: <input type="date" name="fechaH"/> </br></br>
			<textarea placeholder="Escriba una breve descripcion de la solicitud..." name="mensaje" id="mensaje" rows="3" cols="40"></textarea></br></br>
			<input type="submit" value="Enviar solicitud" />
		</form>
</section>
	
<?php include("footer.php") ?>	
</body>
</html>