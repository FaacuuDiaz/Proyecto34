
<?php 
function busqueda(){
	
if(isset($_POST['buscar']))
{
	$buscar=$_POST['buscar'];
	require ('connection.php');
				$cont= connection();
				$consulta = "SELECT * from hospedaje where estado='habilitado' and (titulo  like '%$buscar%' or 
																					descripcion like '%$buscar%' or 
																					ciudad like '%$buscar%')";
				$resultado = mysqli_query($cont, $consulta);
			return $resultado;
					
}

}
$hospedajes=busqueda();

require ('buscandoHospedaje.php');

?>