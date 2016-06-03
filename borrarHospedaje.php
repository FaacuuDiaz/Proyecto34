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
$sql = "DELETE FROM hospedaje WHERE id_hospedaje = '$id'";

if ($conn->query($sql)) {
   	?>
	<script type="text/javascript"> alert ("El Couch fue eliminado correctamente"); 
	 window.location.href='hospedajes.php'; </script>
	 <?php
} else {
    //echo "Error deleting record: " . $conn->error;
	?>
	<script type="text/javascript"> alert ("El Couch no fue eliminado"); 
	 window.location.href='hospedajes.php'; </script>
	 <?php
}
//endConnection();
}
?>