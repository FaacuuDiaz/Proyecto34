
<?php 
function busqueda(){
	require_once ('connection.php');
	$cont= connection();
if ((isset($_POST['buscar'])) )
{
	$texto=$_POST['buscar'];
	

		$sql =	"SELECT * FROM usuario u 
				where 
				u.nombre like '%$texto%' or
				u.apellido like '%$texto%' or
				u.email like '%$texto%' or
				u.nick like '%$texto%' 
						";
		return mysqli_query($cont, $sql);
}	
else 
	{
		?>
		<script type="text/javascript"> alert ("Debe seleccionar una busqueda primero!!"); </script>
		<?php
	}
}



$usuarios=busqueda();

require ('buscandoUsuario.php');

?>
