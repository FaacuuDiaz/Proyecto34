<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>
<?php
	include("head.php");
	include("encabezado.php");
	?>

	<section class="div_formulario">
		
		<form  class ="formulario" action="agregandoPremium.php" method="post" name="form">
			<b>¿Por que hacerme premium?</b> <br/> <br/>
			 Si eres premium todos podran ver la foto de tu hospedaje en los listados! <br/><br/>
		
			<input type="text" required placeholder="Ingrese nombre y apellido del titular" name="nombre" 
			onKeypress="if (!((event.keyCode > 64 && event.keyCode < 91)||(event.keyCode >96 && event.keyCode <123) || event.keyCode==32)) event.returnValue = false" />
			<input type="text" required placeholder="Ingrese su número de tarjeta " name="tarjeta"  pattern="[0-9]{16,16}" title="Se necesita un numero de 16 digitos" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"/>
			<input type="text" required placeholder="Ingrese su codigo de seguridad " name="seguridad"  pattern="[0-9]{3,3}" title="Se necesita un numero de 3 digitos" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"/>
			<br/><br/>
			
			
			<p><button type="submit" name="listo" >Activar Premium</button></p>
			<a href="index.php"><button type="button" name="cancelar" > Cancelar </button></a>
			
		</form>

	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>