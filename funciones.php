<?php 
function fechaIncluidaEntre($fecha,$desde,$hasta){
	if($desde <= $fecha)
		if($fecha <= $hasta)
			return true;
		else
			return false;

}