<?php
 include("comprobarSesionActiva.php");
    $csa=new ComprobarSesionActiva();
	$csa->ComprobarSesion();
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CouchInn</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">
			function confirmar(url){
				if (!confirm("Seguro que quiere eliminar el Couch?")) {
				return false;
				}
			else {
				document.location = url;
				return true;
				}
			}
	</script>
</head>
<body>

	<?php include("encabezado.php") ?>
	<section class="div_listado">
		<div class="wrapper">
		
			
			<table>
<tr class="titulos">
  <td><strong>Titulo</strong></td>
  <td><strong>Ciudad</strong></td>
  <td><strong>Cant de personas</strong></td>
  <td><strong>Estado</strong></td>
  <td><strong>Eliminar</strong></td>
  <td><strong>Editar</strong></td>
  <td><strong>Cambiar estado</strong></td>
</tr>
 

			
			
			
			
			
			<?php 
				require ('connection.php');
				$cont= connection();
				$usuario=$_SESSION['id_usuario'];
				$consulta = "SELECT * from hospedaje where idusuario='$usuario'";
				if ($resultado = mysqli_query($cont, $consulta))
					{
						while ($fila = mysqli_fetch_row($resultado)) 
						{?>
							<tr>
								<td><?php echo $fila[1]; ?></td>
								<?php $id = $fila[0];
									$estado= $fila[7];
								?>
								<td><?php echo $fila[2];?></td>
								<td><?php echo $fila[6];?></td>
								<td><?php echo $fila[7];?></td>
							<td><a href="javascript:;" onclick="confirmar('borrarHospedaje.php?id=<?php echo $id; ?>'); return false;"><img src="img/eliminar.gif" width=15px height=15px></a>
							</td>
							<td><a href="modificarHospedaje.php?id=<?php echo $id; ?>"><img src="img/modificar.png" width=15px height=15px></a>
							</td>
							<td><a style="color:black;" href="habilitarHospedaje.php?id=<?php echo $id;?>&estado=<?php echo $estado;?> ">
							<?php
								if($estado == "habilitado")
								{
									echo "Deshabilitar";
								}
								else
								{
									echo "Habilitar";
								}
							?>
							
							</a>
							</td>
							</tr>
				
					<?php	
						}
					}
				mysqli_free_result($resultado);
				
			?>
			
			
			</table>
				</br>
				</br>
			<a href="agregarHospedaje.php"><input type="button" value="Agregar couch"></a>
			
		</div>
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>