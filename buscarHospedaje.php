
<?php 
function busqueda(){

if ((isset($_POST['buscar'])) || (isset($_POST['tipo_hospedaje'])) || (isset($_POST['fechaDesde'])) || (isset($_POST['fechaHasta'])) )
{
	$texto=$_POST['buscar'];
	$tipo=$_POST['tipos'];
	$fechad=$_POST['fechaDesde'];
	$fechah=$_POST['fechaHasta'];

	if (($texto =="") && ($tipo != "null") && ($fechad !="") && ($fechah !="") ) 
	{
		$sql =	"SELECT * FROM hospedaje h INNER JOIN tipo_hospedaje t ON h.idtipo = t.id_tipo
		WHERE t.id_tipo = $tipo AND h.estado = 'habilitado'
		AND h.id_hospedaje NOT IN (SELECT s.id_hospedaje FROM solicitudes s WHERE s.estado = 'aceptada' 
		AND (s.fecha_entrada BETWEEN '$fechad' AND '$fechah' OR s.fecha_salida BETWEEN '$fechad' AND '$fechah'
		OR '$fechad' BETWEEN s.fecha_entrada AND s.fecha_salida OR '$fechah' BETWEEN s.fecha_entrada AND s.fecha_salida))";
		
	}	
	
	else if (($texto !="") && ($tipo == "null") && ($fechad !="") && ($fechah !=""))
	{
		$sql ="SELECT * FROM hospedaje h WHERE (h.titulo LIKE '%$texto%' OR h.descripcion LIKE '%$texto%' 
		OR h.ciudad LIKE '%$texto%') AND h.estado = 'habilitado' 
		AND h.id_hospedaje NOT IN (SELECT s.id_hospedaje FROM solicitudes s WHERE s.estado = 'aceptada' 
		AND (s.fecha_entrada BETWEEN '$fechad' AND '$fechah' OR s.fecha_salida BETWEEN '$fechad' AND '$fechah'
		OR '$fechad' BETWEEN s.fecha_entrada AND s.fecha_salida OR '$fechah' BETWEEN s.fecha_entrada AND s.fecha_salida))";

		
	}
	
	else if (($texto !="") && ($tipo != "null") && ($fechad =="") && ($fechah ==""))
	{
		$sql ="SELECT * FROM hospedaje h INNER JOIN tipo_hospedaje t ON h.idtipo = t.id_tipo WHERE  t.id_tipo = '$tipo' AND h.estado = 'habilitado' AND (h.titulo LIKE '%$texto%' OR h.descripcion LIKE '%$texto%' OR h.ciudad LIKE '%$texto%')";
	}
	
	else if (($texto !="") && ($tipo != "null") && ($fechad !="") && ($fechah !=""))
	{
		$sql ="SELECT * FROM hospedaje h INNER JOIN tipo_hospedaje t ON h.idtipo = t.id_tipo 
		WHERE h.estado = 'habilitado' AND  t.id_tipo = '$tipo' AND (h.titulo LIKE '%$texto%' OR h.descripcion LIKE '%$texto%' 
		OR h.ciudad LIKE '%$texto%') AND h.id_hospedaje NOT IN (SELECT s.id_hospedaje FROM solicitudes s WHERE s.estado = 'aceptada' 
		AND (s.fecha_entrada BETWEEN '$fechad' AND '$fechah' OR s.fecha_salida BETWEEN '$fechad' AND '$fechah'
		OR '$fechad' BETWEEN s.fecha_entrada AND s.fecha_salida OR '$fechah' BETWEEN s.fecha_entrada AND s.fecha_salida))";
	}
	
	else if (($texto =="") && ($tipo == "null") && ($fechad !="") && ($fechah !=""))
	{
		$sql ="SELECT * FROM hospedaje h WHERE h.estado = 'habilitado' AND h.id_hospedaje NOT IN 
		(SELECT s.id_hospedaje FROM solicitudes s WHERE s.estado = 'aceptada' 
		AND (s.fecha_entrada BETWEEN '$fechad' AND '$fechah' OR s.fecha_salida BETWEEN '$fechad' AND '$fechah'
		OR '$fechad' BETWEEN s.fecha_entrada AND s.fecha_salida OR '$fechah' BETWEEN s.fecha_entrada AND s.fecha_salida))";
	}
	
	else if (($texto !="") && ($tipo == "null") && ($fechad =="") && ($fechah ==""))
	{
		$sql ="SELECT * FROM hospedaje h WHERE h.estado = 'habilitado' AND (h.titulo LIKE '%$texto%' OR h.descripcion LIKE '%$texto%' OR h.ciudad LIKE '%$texto%') ";
	}
	
	else if (($texto =="") && ($tipo != "null") && ($fechad =="") && ($fechah ==""))
	{
		$sql ="SELECT * FROM hospedaje h INNER JOIN tipo_hospedaje t ON h.idtipo = t.id_tipo WHERE t.id_tipo = '$tipo' AND h.estado = 'habilitado'";
	}
	else 
	{
		//$sql = "SELECT * FROM hospedaje h INNER JOIN tipo_hospedaje t ON h.idtipo = t.idtipo WHERE h.despublihado = 0";
	}
}
else 
{
	$sql = "SELECT * FROM hospedaje h WHERE h.estado = 'habilitado'";
}
	require_once ('connection.php');
	$cont= connection();
	return mysqli_query($cont, $sql);
}

$hospedajes=busqueda();

require ('buscandoHospedaje.php');

?>
