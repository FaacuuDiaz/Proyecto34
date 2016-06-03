<html>
<head>
</head>

<?php
 require ('connection.php');
 //require('endConnection.php');
 function getAllTipos(){
	$cont= connection();
 $consulta = "SELECT * from tipo_hospedaje";

if ($resultado = mysqli_query($cont, $consulta)) {

    /* obtener el array asociativo */
    while ($fila = mysqli_fetch_row($resultado)) {
        printf ("%s (%s)\n", $fila[0], $fila[1]);
    }

    /* liberar el conjunto de resultados */
    mysqli_free_result($resultado);
  endConnection(); 
 }}

 function getAllHospedajes(){
	$cont= connection();
 $consulta = "SELECT * from hospedaje";

if ($resultado = mysqli_query($cont, $consulta)) {

    /* obtener el array asociativo */
    while ($fila = mysqli_fetch_row($resultado)) {
      //  printf ("%s (%s)\n", $fila[0], $fila[1]);
    }

    /* liberar el conjunto de resultados */
   return mysqli_free_result($resultado);
 // endConnection(); 
 }}

 
 ?>
</body> 
 
</html>