<form class="formulario" action="comentando_Hospedaje.php" method="post" >
    Debe elegir una puntuacion obligatoriamente y si quiere puede dejar un comentario.
	<select name="punt" required style="width: 44.5%;">
	    <option value="">Elija una puntuacion</option>
		<option value=1>1</option>
		<option value=2>2</option>
		<option value=3>3</option>
		<option value=4>4</option>
		<option value=5>5</option>
	</select>	
	<textarea placeholder="Escriba su comentario aqui..." rows="5" cols="50" name="comentario"></textarea> <input name="id_h" type="hidden" value="<?php echo $_GET['id_h'] ?>"/>
	<p><button type="submit" id="listo" name="listo"> Dejar comentario </button></p>
	<a href="verHospedajesVisitados.php"><button  type="button" name="cancelar" > Cancelar </button> </a>
</form>
