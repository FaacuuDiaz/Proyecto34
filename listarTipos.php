 <?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>   
<?php
	include("head.php");
	include("encabezado.php");
	?>
    <section class="div_listado">
<?php
    include("connection.php");
    $con=connection();
    $consul="SELECT * FROM tipo_hospedaje";
    $resul=mysqli_query($con,$consul);
    ?>
    <table>
        <tr class="titulos">
            <td> Tipo</td>
            <td> Estado</td>
            <td> Editar</td>
            <td> Eliminar</td>
        </tr>
    <?php
    while($fila=mysqli_fetch_array($resul)){
    ?> 
        <tr>
            <td><?php echo $fila['nombre_tipo']; ?></td>
            <td><?php echo $fila['estado']; ?></td>
            <td><a href="formulario.php?var=5&id_tipo=<?php echo $fila['id_tipo']; ?>" > Editar </a> </td>
            <td><a  href="eliminarTipo.php?id_tipo=<?php echo $fila['id_tipo']; ?>"   > Eliminar </a></td>
        </tr>   
        <?php
    } ?> </table>
    </br>
	<a href="formulario.php?var=4"><input type="button" value="Agregar un nuevo tipo"></a>
    




</section>
<?php include("footer.php") ?>
</body>

</html> 