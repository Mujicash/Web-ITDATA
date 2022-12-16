<?php
require("header.php");
?>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class="page-section cta">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <div class="cta-inner bg-faded text-center rounded">
          <h2 class="section-heading mb-5">
            <span class="section-heading-upper">Proximos </span>
            <span class="section-heading-lower">EVENTOS</span>
          </h2>
          <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
            <li class="list-unstyled-item list-hours-item d-flex">
              Inteligencia Artificial
              <span class="ms-auto">20/10/2022</span>
            </li>
            <li class="list-unstyled-item list-hours-item d-flex">
              Ciencia de Datos
              <span class="ms-auto">28/10/2022</span>
            </li>
            <li class="list-unstyled-item list-hours-item d-flex">
              Machine learning
              <span class="ms-auto">10/11/2022</span>
            </li>
            <li class="list-unstyled-item list-hours-item d-flex">
              Deep learning
              <span class="ms-auto">15/11/2022</span>
            </li>
            <li class="list-unstyled-item list-hours-item d-flex">
              Big data avanzado
              <span class="ms-auto">20/11/2022</span>
            </li>
            <li class="list-unstyled-item list-hours-item d-flex">
              Ciberseguridad
              <span class="ms-auto">25/11/2022</span>
            </li>
            <li class="list-unstyled-item list-hours-item d-flex">
              Redes neuronales
              <span class="ms-auto">28/11/2022</span>
            </li>
          </ul>
          <p class="address mb-5">
            <em>
              <strong>Eventos</strong>
              <br />
              Virtuales
            </em>
          </p>
          <form >
            <div class="mb-3">
              <label class="form-label">Nombre y Apellidos</label>
              <input class="form-control form-control-lg" type="text" name="dnipost" placeholder="Ingrese tu nombre y apellidos" />
            </div>
            <div class="mb-3">
											<label class="form-label">Correo</label>
											<input class="form-control form-control-lg" type="text" name="dnipost" placeholder="Ingrese el Correo" />
						</div>
            <div class="mb-3">
											<label class="form-label">Telefono celular</label>
											<input class="form-control form-control-lg" type="text" name="dnipost" placeholder="Ingrese el Celular" />
						</div>

            <div class="text-center mt-3">
              <button class="btn btn-primary btn-lg" type="submit"   id="boton">Registrarse</button>
              
            </div>
          </form>
          <script src="assets/js/JsEventos.js"></script>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
require("footer.php");
?>