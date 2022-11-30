window.addEventListener('DOMContentLoaded', event => {
    const listHoursArray = document.body.querySelectorAll('.list-hours li');
    listHoursArray[new Date().getDay()].classList.add(('today'));

	const nombre = document.getElementById("nombres");
	const apellidos = document.getElementById("apellidos");
	const celular = document.getElementById("movil");
	const correo = document.getElementById("correo");
	const pago = document.getElementById("pago");
	const expresiones = {
		nombres: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
		correo: /\w+@[a-zA-Z]+\.[a-zA-Z]+(\.[a-zA-z]+)?/,
		correo_1:  /\w+@(.+)?/
	}
	nombre.addEventListener("input",function(){
		let msj="";
		if (nombre.value.length<3)
			msj= "Digite un nombre con mínimo 3 caracteres";
		else if(!nombre.value.match(expresiones.nombres))
			msj= "Digite un nombre válido! (Sin números ni caracteres especiales)";
		nombre.setCustomValidity(msj);
		}
	)
	apellidos.addEventListener("input",function(){
		let msj="";
		if (apellidos.value.length<3)
			msj = "Digite un apellido paterno con mínimo 3 caracteres";
		else if(!apellidos.value.match(expresiones.nombres))
			msj = "Digite un apellido paterno válido! (Sin números ni caracteres especiales)";
		apellidos.setCustomValidity(msj);
		}
	)
	celular.addEventListener("input",function(){
		let msj="";
		if (celular.value.length!=9)
			msj ="Digite un número con 9 caracteres";
		else if(!celular.value.startsWith("9"))
			msj ="Un número móvil debe comenzar con el número 9";
		celular.setCustomValidity(msj);
		}
	)
	correo.addEventListener("input",function(){
		let msj="";
		if(!correo.value.includes('@'))
			msj ="Debe incluir un '@'";
		else if(!correo.value.match(expresiones.correo_1))
			msj ="Debe incluir una parte (letras y/o números) antes del '@'";
		else if(!correo.value.match(expresiones.correo))
			msj ="Después del '@' solo debe contener letras con al menos un punto entre ellas (ej. 'unmsm.edu.pe')";
		correo.setCustomValidity(msj);
		}
	)
	function validarForm(){
		if(nombres.value!=""&&apellidos.value!=""&&celular.value!=""&&correo.value!=""&&pago.value!=""){
			$('#modalInscripcion').modal('hide');
			document.getElementById("inscripcion-correcta").removeAttribute("hidden");
			setTimeout(() => {
				document.getElementById("inscripcion-correcta").setAttribute("hidden", true);
			}, 3000);
		}	
	}

    

})
