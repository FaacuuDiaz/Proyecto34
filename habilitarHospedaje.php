<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>
<?php 
require ('connection.php');
//require ('endConnection.php');
if (($_GET['id']) > 0) 
{
$id= $_GET['id'];

$conn= connection();
if($_GET['estado'] == "habilitado")
{
	$sql = "update hospedaje set estado = 'deshabilitado' WHERE id_hospedaje = '$id'";	
}
else
{
	$sql = "update hospedaje set estado = 'habilitado' WHERE id_hospedaje = '$id'";	
}

if ($conn->query($sql)) {
   	?>
	<script type="text/javascript"> alert ("El estado del Couch se modifico correctamente"); 
	 window.location.href='hospedajes.php'; </script>
	 <?php
} else {
    //echo "Error deleting record: " . $conn->error;
	?>
	<script type="text/javascript"> alert ("El estado del Couch no se modifico"); 
	 window.location.href='hospedajes.php'; </script>
	 <?php
}
//endConnection();
}
?>