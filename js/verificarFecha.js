function validarFecha() {
    var fechaDesde = document.getElementById("fechaDesde").value;
    var fechaHasta = document.getElementById("fechaHasta").value;
	var fechaActual= new Date();
	var mes= fechaActual.getMonth()+1;
    if(mes<10){mes="0"+mes;};
    var dia= fechaActual.getDate();
    if(dia<10){dia="0"+dia;};
    var hoy=fechaActual.getFullYear()+"-"+mes+"-"+dia;
	
    
		if((fechaDesde == "")&(fechaHasta == "")) { return true; }
		else if((fechaDesde != "")&(fechaHasta == "")) {alert("La fecha hasta no esta seleccionada!!"); return false;}
		else if((fechaDesde == "")&(fechaHasta != "")) {alert("La fecha desde no esta seleccionada!!"); return false;}
        else if(fechaDesde<hoy){alert("La fecha desde es menor a la fecha actual!!"); return false;}
		else if(fechaHasta<hoy){alert("La fecha hasta es menor a la fecha actual!!"); return false;}
		else if(fechaHasta<fechaDesde){alert("La fecha hasta es menor a la fecha desde!!"); return false;}
		else{return true;}
		}
