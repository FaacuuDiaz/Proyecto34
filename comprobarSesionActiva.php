<?php

    class ComprobarSesionActiva {

        function ComprobarLogin($result, $usuario, $contraseña){
        	try{
	    		if($row = mysqli_fetch_array($result)) {
					if($row['password'] == $contraseña) {
	    				session_start();
	   					$_SESSION['usuario'] = $usuario;
                        $_SESSION['estado'] = "logueado";
                        $_SESSION['id_usuario']= $row['id_usuario'];
                        $_SESSION['nick'] = $row['nick'];
                        $_SESSION['premium'] = $row['premium'];
                        $_SESSION['admin'] = $row['admin'];
                        
                        header("Location: /");
					}else{
						throw new Exception('La contrase\u00f1a ingresada es incorrecta.');
                    }
				}else{
					throw new Exception('El usuario ingresado es incorrecto.');
				}
    		}
    		catch (Exception $e) {
				echo "<script type='text/javascript'>alert('".$e->getMessage()."'); document.location=('formulario.php?var=2');</script>";
 			}
        }

		function ComprobarSesion(){
            try {
				if(session_status()!=2)
				{
					session_start();
				}
                if(!isset($_SESSION['usuario'])) {
                    throw new Exception('Debe estar loggeado para visualizar el contenido de esta pagina.');
                }
            }
            catch (Exception $e) {
                echo "<script type='text/javascript'>alert('".$e->getMessage()."'); document.location=('formulario.php?var=2');</script>";
			}
        }
    }
?>