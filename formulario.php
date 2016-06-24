<?php
	include("head.php");
	include("encabezado.php");
	?>
<section class="div_formulario" id="formulario_usuario" >
	<?php if($_GET['var']== 1){
				include("formulario_edit_user.php");
			}
			elseif($_GET['var']== 2){
				include("formulario_inicio_sesion.php");
			}
			elseif($_GET['var']== 3){
				include("formulario_usuario.php");
			}
			elseif($_GET['var']== 4){
				include("formulario_agregarTipo.php");
			}
			elseif($_GET['var']== 5){
				include("formulario_editarTipo.php");
			}
			elseif($_GET['var']== 6){
				include("formulario_editPass.php");
			}
			elseif($_GET['var']== 7){
				include("formulario_comentarHospedaje.php");
			}
			
	?>
</section>
	
<?php include("footer.php") ?>	
</body>
</html>