<?php include("head.php");
include("encabezado.php");
?>
<section class="div_listado">
<div class="wrapper">
<div class="columnat">RECUPERAR CONTRASEÑA </div> </br>

<form class="formulario" action="recuperando_Contrasena.php" method="post" >
    <p style="text-align:center">Ingrese su email asi le mandamos la contraseña</p>
	<p>Email: <input type="email" name="email" id="email" required="true"  placeholder="ejemplo@xxx.com"/></p> 
	<p><button type="submit" id="listo" name="listo"> Enviar </button></p>
	<a href="formulario.php?var=2"><button type="button" name="cancelar" > Cancelar </button></a>

</form>

</div>
</section>
<?php include("footer.php"); ?>