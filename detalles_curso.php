<?php
require("header.php");
require("getCursos.php");
require("toUSD.php");
$e = getCursoId($_GET["id"]);
if($e==null) header("location:index.php");

?>

		<div class="modal fade" id="modalInscripcion" tabindex="-1" aria-labelledby="modalInscripcionLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="modalInscripcionLabel">Inscripción</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar dialogo"></button>
			  </div>
			  <div class="modal-body">
				<form>
				  <div class="mb-3">
					<label for="nombres" class="col-form-label" >Nombres:</label>
					<input type="text" class="form-control" id="nombres" onBlur="reportValidity()">
				  </div>
				  <div class="mb-3">
					<label for="apellidos" class="col-form-label">Apellidos:</label>
					<input type="text" class="form-control" id="apellidos" onBlur="reportValidity()">
				  </div>
				  <div class="mb-3">
					<label for="correo" class="col-form-label">Correo:</label>
					<input type="email" class="form-control" id="correo" onBlur="reportValidity()">
				  </div>
				  <div class="mb-3">
					<label for="movil" class="col-form-label">Teléfono:</label>
					<input type="text" class="form-control" id="movil" onBlur="reportValidity()">
				  </div>
				  <div class="mb-3">
					<label for="pago" class="col-form-label">Precio: S/.<?=$e["precio"]?> </label>
					 <div id="paypal-button-container"></div>
					 <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
					  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
						<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
					  </symbol>
					 </svg>
					 <div id="msj-pago" hidden>
						 <div class="alert alert-success d-flex align-items-center" role="alert">
						  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="compra exitosa"><use xlink:href="#check-circle-fill"/></svg>
						  ¡Pago completado!
						 </div>
				     </div>

					<script>
						paypal.Buttons({
							createOrder: function(data, actions) {
								return actions.order.create({
									purchase_units: [{
										amount: {
											value: <?=round(toUSD("PEN",$e["precio"]),2)?>
										}
									}]
								});
							},
							onApprove: function(data, actions) {
								return actions.order.capture().then(function(orderData) {
									// Successful capture! For demo purposes:
									console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
									var transaction = orderData.purchase_units[0].payments.captures[0];
									document.getElementById("paypal-button-container").style.display = "none";
									document.getElementById("msj-pago").removeAttribute("hidden");
								});
							}
						}).render('#paypal-button-container');
					</script>
				  </div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary">Inscribirme</button>
			  </div>
			</div>
		  </div>
		</div>
        <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="card mb-4">
                        <img style="object-fit: cover;" src="./assets/img/cursos/<?=$e["imagen"]?>" height="300" alt="<?=$e["imagen"]?>"/>
                  <div class="card-body">
                            <h2 class="card-title"><?=$e["nombre"]?></h2>
                    <p class="card-text"><?=$e["descripcion"]?></p>
                         
                  </div>
                </div>
              </div>

			  <div class="col-lg-4"> 
                    <div class="card mb-4">
                        <div class="card-header"><span class="fw-bolder">Detalles del curso</span></div>
                        <div class="card-body">
							<div class="d-flex align-items-center justify-content-between text-xs">Profesor
							<div align="right"><?=$e["profesor"]?></div>
							</div>
							<hr>
							<div class="d-flex align-items-center justify-content-between text-xs">Precio
							<div align="right">S/. <?=$e["precio"]?></div>
							</div>
							<hr>
							<div class="d-flex align-items-center justify-content-between text-xs">Duración
							<div align="right"><?=$e["horas"]?> horas</div>
							</div>
							<hr>
							
                            
                        </div>
						<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
							<div class="text-center"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInscripcion">Inscribirme</button></div>
						</div>
                    </div>
                </div>
				
            </div>
			<div class="card mb-4">
                      <div class="card-header">Comentarios</div>
					  <div class="card-body p-4">

						<div class="d-flex flex-start">
						  <img class="rounded-circle shadow-1-strong me-3" src="https://pixabay.com/get/g37a3e23cd478d52a51b172d3a12e29cb4bf495e6bb47c4cd58f27d2f61c120409e22e5429cfe70511e42027e06d1bd92362341336ab4acbcb2b04f49dda5402761b62f25d71586ebbc0d12ed3d8e0be0_1920.jpg" width="60" height="60" alt="avatar"/>
						<div>
						  <h6 class="fw-bold mb-1">Stephanie Halls</h6>
							<div class="d-flex align-items-center mb-3">
							  <p class="mb-0">
							  </p>
							</div>
							<p class="mb-0">
							  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore rem, culpa nemo consequuntur in, neque rerum aliquid numquam atque, error beatae odit perferendis voluptas nulla magnam repellendus! Consequuntur, aliquam, voluptate.
							</p>
					  	</div>
						</div>
					  </div>

					  <hr class="my-0" />

					  <div class="card-body p-4">
						<div class="d-flex flex-start">
						  <img class="fitting-image rounded-circle shadow-1-strong me-3" src="https://pixabay.com/get/g84ebc1c8514e99ef5bb5e6cd3330e7f8629fec61e4fa0154db70aea9659b7c36dd4cd2878f80ffc8b156e07f5d916ad8ab3f7fbb4116532087e0c07a55c158974281ad41633c695a204f98760baeb63b_640.jpg" alt="avatar" width="60"
							height="60" />
						  <div>
							<h6 class="fw-bold mb-1">Sandra Stewart</h6>
							<div class="d-flex align-items-center mb-3">
							  <p class="mb-0">
							  </p>
							</div>
							<p class="mb-0">
							  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius nobis, nulla in labore, provident expedita nam ratione aperiam vel corporis ullam, dolorem atque tempora dolorum dolor blanditiis. Rerum, placeat, tempora.
							</p>
						  </div>
						</div>
					  </div>
						
					  <hr class="my-0" />
						
					  <div class="card-body p-4">
						<div class="d-flex flex-start">
						  <img class="fitting-image rounded-circle shadow-1-strong me-3" src="https://pixabay.com/get/ga6785704e1b785c6b86fc522834dda1f392c2f4476f112185e639f4e7a1dd275debdea923735afabb1684ae59f38bc35af57b632c748abd5d81e2f621bdb085c6106333ffc8380802f6ce1bee3c0b60b_640.jpg" alt="avatar" width="60"
							height="60" />
						  <div>
							<h6 class="fw-bold mb-1">Sarah Jhones</h6>
							<div class="d-flex align-items-center mb-3">
							  <p class="mb-0">
							  </p>
							</div>
							<p class="mb-0">
							  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed pariatur magni, dolorem temporibus alias suscipit, quibusdam enim ab est praesentium ipsam animi consectetur facilis doloribus veniam ad, neque porro inventore.
							</p>
						  </div>
						</div>
					  </div>
                    </div>
        </div>
		<script>
		const nombre = document.getElementById("nombres");
		const apellidos = document.getElementById("apellidos");
		const celular = document.getElementById("movil");
		const correo = document.getElementById("correo");

		const expresiones = {
			alfanumerico: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
			correo: /\w+@\w+\.[a-zA-Z]+(\.[a-zA-z]+)?/ 
		}
		nombre.addEventListener("input",function(){
			let msj="";
			if (nombre.value.length<3)
				msj= "Digite un nombre con mínimo 3 caracteres";
			else if(!nombre.value.match(expresiones.alfanumerico))
				msj= "Digite un nombre válido! (Sin números ni caracteres especiales)";
			nombre.setCustomValidity(msj);
		  }
		)
		apellidos.addEventListener("input",function(){
			let msj="";
			if (apellidos.value.length<3)
				msj = "Digite un apellido paterno con mínimo 3 caracteres";
			else if(!apellidos.value.match(expresiones.alfanumerico))
				msj = "Digite un apellido paterno válido! (Sin números ni caracteres especiales)";
			apellidos.setCustomValidity(msj);
		  }
		)
		celular.addEventListener("input",function(){
			let msj="";
			if (celular.value.length!=9)
				msj ="Digite un número con 9 caracteres";
			else if(!celular.value.startsWith("9"))
				msj ="Un número de celular debe comenzar con el número 9";
			celular.setCustomValidity(msj);
		  }
		)
		correo.addEventListener("input",function(){
			let msj="";
			if(!correo.value.match(expresiones.correo))
				msj ="Después del '@' debe contener al menos un punto para el dominio (ej. 'unmsm.edu.pe')";
			correo.setCustomValidity(msj);
		  }
		)
		</script>
<?php
require("footer.php");
?>