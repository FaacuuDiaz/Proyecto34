
<?php 
function busqueda(){
if((isset($_POST['buscar'])||(!isset($_POST['fechaDesde']))||(!isset($_POST['fechaHasta']))))  
{	
	 $buscar=$_POST['buscar'];
	 $fechaDesde=$_POST['fechaDesde'];
	 $fechaHasta=$_POST['fechaHasta'];
	if($fechaDesde==""){$fechaDesde="null";}
	if($fechaHasta==""){$fechaHasta="null";}
	
if(($buscar!="null")&&($fechaDesde=="null")&&($fechaHasta=="null"))  	 
{
	$buscar=$_POST['buscar'];
	require ('connection.php');
	$cont= connection();
	$consulta = "SELECT * from hospedaje where estado='habilitado' and (titulo  like '%$buscar%' or 
																					cant_perso >= '$buscar' or
																					ciudad like '%$buscar%' or
																					descripcion like '%$buscar%' or 
																					ciudad like '%$buscar%')";
	$resultado = mysqli_query($cont, $consulta);
	return $resultado;
}
else if(($buscar!="")&&($fechaDesde!="null")&&($fechaHasta!="null"))  	 
{
	require ('connection.php');
	$cont= connection();
	$consulta = "SELECT * from hospedaje where estado='habilitado' and (titulo  like '%$buscar%' or 
																					cant_perso <= '$buscar' or
																					ciudad like '%$buscar%' or
																					descripcion like '%$buscar%' or 
																					ciudad like '%$buscar%') AND h.id_hospedaje not in 
	(SELECT s.id_hospedaje 
	FROM solicitudes s 
	WHERE  s.estado = 'aceptada' 
	and (s.fecha_entrada between '$fechaDesde' and '$fechaHasta') 
	or (s.fecha_salida between '$fechaDesde' and '$fechaHasta' ))";
	$resultado = mysqli_query($cont, $consulta);
	return $resultado;
	
}
else if(($buscar=="")&&($fechaDesde!="null")&&($fechaHasta!="null"))  	 
{
	$fechaDesde=$_POST['fechaDesde'];
	$fechaHasta=$_POST['fechaHasta'];
	require ('connection.php');
	$cont= connection();
	$consulta = "SELECT * FROM hospedaje h where estado='habilitado' AND h.id_hospedaje not in 
	(SELECT s.id_hospedaje 
	FROM solicitudes s 
	WHERE  s.estado = 'aceptada' 
	and (s.fecha_entrada between '$fechaDesde' and '$fechaHasta') 
	or (s.fecha_salida between '$fechaDesde' and '$fechaHasta' ))";
	
	$resultado = mysqli_query($cont, $consulta);
	return $resultado;
	
}

}
}
$hospedajes=busqueda();

require ('buscandoHospedaje.php');

?>
