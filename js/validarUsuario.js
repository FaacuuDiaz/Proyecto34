function validarUsuario(registro) { 
			var nombre = registro.nombre.value;
			var apellido = registro.apellido.value;
			var nick = registro.nick.value;
			var pass = registro.pass.value;
 
			if (nombre == null || nombre.length == 0 || !/[a-zA-Z]/.test(nombre)) {
				alert("Por favor, ingrese un nombre valido. Debe contener solo letras");
				return false;
			}
			if (apellido == null || apellido.length == 0 || !/[a-zA-Z]/.test(apellido)) {
				alert("Por favor, ingrese un apellido valido. Debe contener solo letras");
				return false;
			}
			
			if (nick == null ||nick.length == 0 || /^\s+$/.test(nick)) {
				alert("Por favor, ingrese un nick valido.");
				return false;
			}
			
			if (pass == null || pass.length < 8) {
				alert("Por favor, ingrese una contrase\u00F1a valida. Por su seguridad, la clave debe tener 8 o mas caracteres");
				return false;
			}
			return true;		
}
