<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	include("head.php");
	include("encabezado.php");
?>
<!DOCTYPE html>
<html>
<body>


<section class="div_formulario">

	<form class="formulario" action="reportandoPremium.php" method="POST"  enctype="multipart/form-data"  onsubmit="return validarFecha2()">
	<p style="text-align:left; font-size:2">Ingrese un rango de fechas de las altas premium que desea visualizar</p><br>
		Desde:<input type="date" required id="fechaDesde" name="desde"/><br>
		Hasta: <input type="date" required id="fechaHasta" name="hasta"/><br>
		<p><button type="submit" name="listo" > Generar reporte </button></p>
		<a href="index.php"><button type="button" name="cancelar" > Cancelar </button></a>

	</form>
</section>	<!--  end listing section  -->
<?php include("footer.php") ?>
</body>
</html>