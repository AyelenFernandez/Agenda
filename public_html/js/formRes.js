(function(){
	var formulario = document.formulario;
	var elementos = formulario.elements;
	
	// Functions
	var validarInputs = function(){
		
		for (var i = 0; i < elementos.length; i++) {
			if( elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "password" || elementos[i].type == "textarea"){
				if( elementos[i].value == 0){
					console.log('El campo ' + elementos[i].name + ' esta incompleto');
					elementos[i].className = elementos[i].className + ' error';
					return false;
				} else {
					elementos[i].className = elementos[i].className.replace(" error", "");
				}
			}
		}

		if( elementos.pass1.value !== elementos.pass2.value){
			elementos.pass1.value = "";
			elementos.pass2.value = "";
			elementos.pass1.className = elementos.pass1.className + " error";
			elementos.pass2.className = elementos.pass2.className + " error";
		} else {
			elementos.pass1.className = elementos.pass1.className.replace(" error", "");
			elementos.pass2.className = elementos.pass2.className.replace(" error", "");
		}

		return true;
	};


	var validarRadios = function(){
		
		var opciones = document.getElementsByName('aula');
		var resultado = false;

		for (var i = 0; i < elementos.length; i++) {
			
			if( elementos[i].type == "radio" && elementos[i].name == "aula"){
				
				for (var x = 0; x < opciones.length; x++) {
					if(opciones[x].checked){
						resultado = true;
						break;
					}
				}

				if ( resultado == false ){
					elementos[i].parentNode.className = elementos[i].parentNode.className + " error";
					console.log('No selecciono el motivo');
					return false;
				} else {
					elementos[i].parentNode.className = elementos[i].parentNode.className.replace("error", "");
					return true;
				}
			}
		}
	};


	var validarCheckbox = function(){
		var opciones = document.getElementsByName('aula1');
		var resultado = false;

		for (var i = 0; i < elementos.length; i++) {
			
			if( elementos[i].type == "checkbox" && elementos[i].name == "aula1"){
				
				for (var x = 0; x < opciones.length; x++) {
					if(opciones[x].checked){
						resultado = true;
						break;
					}
				}

				if ( resultado == false ){
					elementos[i].parentNode.className = elementos[i].parentNode.className + " error";
					console.log('El campo terminos no esta seleccionado');
					return false;
				} else {
					elementos[i].parentNode.className = elementos[i].parentNode.className.replace("error", "");
					return true;
				}
			}
		}
	};


	var enviar = function(e){
		if( !validarInputs() ){
			console.log('Falta validar los Input');
			e.preventDefault();
		}else if( !validarRadios() ){
			console.log('Falta validar los Radio');
			e.preventDefault();
		}else if( !validarCheckbox() ){
			console.log('Falta validar los Checkbox');
			e.preventDefault();
		}else{
			console.log('Enviar Datos');
			// e.preventDefault();
		}
	};


	var focusInput = function(){
		this.parentElement.children[1].className = "lbl active";
		this.parentElement.children[0].className = this.parentElement.children[0].className.replace("error", "");
	};


	var blurInput = function(){
		if ( this.value <= 0 ) {
			this.parentElement.children[1].className = "lbl";
			this.parentElement.children[0].className = this.parentElement.children[0].className + " error";
		}
	};
	

	// Events
	formulario.addEventListener("submit", enviar);

	for (var i = 0; i < elementos.length; i++) {
		if( elementos[i].type == "text" || elementos[i].type == "email" || elementos[i].type == "password" || elementos[i].type == "textarea"){
			elementos[i].addEventListener("focus", focusInput);
			elementos[i].addEventListener("blur", blurInput);
		}
	}
}())
