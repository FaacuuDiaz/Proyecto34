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
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

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
		<div class="columnat">MIS SOLICITUDES ENVIADAS</div>
		</br>
			
			<table>
<tr class="titulos">
  <td><strong>Hospedaje</strong></td>
  <td><strong>Fecha solicitud</strong></td>
  <td><strong>Fecha entrada</strong></td>
  <td><strong>Fecha salida</strong></td>
  <td><strong>Estado</strong></td>
  <td><strong>Descripcion</strong></td>
  
</tr>
 

			
			
			
			
			
			<?php 
				require_once ('connection.php');
				$cont= connection();
				$usuario=$_SESSION['id_usuario'];
				$conh= connection();
										$hospedajes = "SELECT * FROM hospedaje";
				
				
				$consulta = "SELECT s.id_hospedaje, s.fecha_solicitud, s.fecha_entrada, s.fecha_salida, s.estado, s.descripcion 
						from solicitudes s where s.id_usuario='$usuario'";
				if ($resultado = mysqli_query($cont, $consulta))
					{
						while ($fila = mysqli_fetch_assoc($resultado)) 
						{?>
							<tr>
								<td>
									<?php
									if($fila['id_hospedaje']== NULL)
									{
										echo "Couch Eliminado";
									}
									else
									{
										
										if($res_hospedaje = mysqli_query($conh, $hospedajes))
										{
										while($h = mysqli_fetch_assoc($res_hospedaje))
										{
											
											if($fila['id_hospedaje'] == $h['id_hospedaje'])
											{
												echo $h['titulo'];
											}
										}
										}
										
									}
									?>
								</td>
								
								<td><?php echo $fila['fecha_solicitud'];?></td>
								<td><?php echo $fila['fecha_entrada'];?></td>
								<td><?php echo $fila['fecha_salida'];?></td>
								<td><?php echo $fila['estado'];?></td>
								<td><?php echo $fila['descripcion'];?></td>
							<!--
							<td><a href="javascript:;" onclick="confirmar('borrarHospedaje.php?id=<?php echo $id; ?>'); return false;"><img src="img/eliminar.gif" width=15px height=15px></a>
							</td>
							<td><a href="modificarHospedaje.php?id=<?php echo $id; ?>"><img src="img/modificar.png" width=15px height=15px></a>
							</td>
							<td><a style="color:black;" href="habilitarHospedaje.php?id=<?php echo $id;?>&estado=<?php echo $estado;?> ">
							-->
							<?php
							/*	if($estado == "habilitado")
								{
									echo "Deshabilitar";
								}
								else
								{
									echo "Habilitar";
								}
								*/
							?>
							
							</a>
							</td>
							</tr>
				
					<?php	
						}
					}
				//mysqli_free_result($resultado);
				
			?>
			
			
			</table>
			
			
		</div>
	</section>	<!--  end listing section  -->

	<?php include("footer.php") ?>
	
</body>
</html>