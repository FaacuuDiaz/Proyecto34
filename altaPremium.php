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
		
		<form action="agregandoPremium.php" method="post" name="form">
			
			<input type="text" redquired placeholder="Ingrese su número de tarjeta" name="tarjeta"  pattern="[0-9]{15,15}" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"><br/><br/>
			<input type="submit" value="Activar premium">
			<a href="index.php"><input type="button" value="Volver" class="input"></a>
		</form>
</div>
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>