<?php
require("header.php");
require("repositorio.php");
require("toUSD.php");
$array = getAllCourses();
$id    = $_GET["id"];
$e     = getCourseById($id);
if ($e == null) header("location:index.php");

?>
  <style>
      @media screen and (max-width: 400px) {
          h5.fw-bolder {
              font-size: 12px;
          }
      }
  </style>
  <div hidden id="inscripcion-correcta" class="alert alert-success fade show fixed-bottom" role="alert">
    <i class="bi-check-circle-fill px-2"></i><strong>Inscripción exitosa</strong>
    Ya se encuentra inscrito en el curso
  </div>
  <div class="modal fade" id="modalInscripcion" tabindex="-1" aria-labelledby="modalInscripcionLabel"
       aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalInscripcionLabel"><i class="bi-pencil-square px-2"></i>Inscripción</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar dialogo"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="nombres" class="col-form-label">Nombres:</label>
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
              <label for="pago" class="col-form-label">Precio: S/.<?= $e["precio"] ?> </label>
              <input type="hidden" id="pago" value=""/>
              <div id="paypal-button-container"></div>

              <div id="msj-pago" hidden>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <i class="bi-check-circle-fill px-2"></i>
                  ¡Pago completado!
                </div>
              </div>

              <script>
                  paypal.Buttons({
                      createOrder: function (data, actions) {
                          return actions.order.create({
                              purchase_units: [{
                                  amount: {
                                      value: <?=round(toUSD("PEN", $e["precio"]), 2)?>
                                  }
                              }]
                          });
                      },
                      onApprove: function (data, actions) {
                          return actions.order.capture().then(function (orderData) {
                              // Successful capture! For demo purposes:
                              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                              var transaction = orderData.purchase_units[0].payments.captures[0];
                              document.getElementById("paypal-button-container").style.display = "none";
                              document.getElementById("msj-pago").removeAttribute("hidden");
                              document.getElementById("pago").value = transaction.id;
                          });
                      }
                  }).render('#paypal-button-container');
              </script>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle pe-2"></i> Cerrar</button>
          <button class="btn btn-primary" onclick="validarForm()"><i class="bi-pencil-square pe-2"></i>Inscribirme
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="card mb-4">
          <img style="object-fit: cover;" src="./assets/img/cursos/<?= $e["imagen"] ?>" height="300"
               alt="<?= $e["imagen"] ?>"/>
          <div class="card-body">
            <h2 class="card-title"><?= $e["nombre"] ?></h2>
            <p class="card-text p-3"><?= $e["descripcion"] ?></p>

          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card mb-4 mx-auto" style="max-width:500px">
          <div class="card-header"><span class="fw-bolder">Datos adicionales</span></div>
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between text-xs">Profesor
              <div align="right"><?= $e["profesor"] ?></div>
            </div>
            <hr>
            <div class="d-flex align-items-center justify-content-between text-xs">Precio
              <div align="right">S/. <?= $e["precio"] ?></div>
            </div>
            <hr>
            <div class="d-flex align-items-center justify-content-between text-xs">Duración
              <div align="right"><?= $e["horas"] ?> horas</div>
            </div>
            <hr>


          </div>
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInscripcion"><i
                        class="bi-pencil-square pe-2"></i>Inscribirme
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col mx-auto">
      <div class="card mx-auto vw-50 mb-4" style="max-width:500px">
        <div class="card-header">
          <div class="text-center fw-bolder h4 pt-2">Contenido del curso</div>
        </div>
        <div class="card-body">
          <div class="accordion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="chapter1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                  <span class="fw-bolder">Capítulo 1: Introducción al curso</span>
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="chapter1">
                <div class="accordion-body">
                  <div class="d-flex mb-2">¡Bienvenidos al curso!</div>
                  <hr>
                  <div class="d-flex mb-2">Conceptos previos</div>
                  <hr>
                  <div class="d-flex mb-2">Vista general</div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="chapter2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                  <span class="fw-bolder"> Capítulo 2: Desarrollo de temas </span>
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="chapter2">
                <div class="accordion-body">
                  <div class="d-flex mb-2">Tema 1</div>
                  <hr>
                  <div class="d-flex mb-2">Tema 2</div>
                  <hr>
                  <div class="d-flex mb-2">Tema 3</div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="chapter3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                  <span class="fw-bolder">Capítulo 3: Desarrollo de temas</span>
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="chapter3">
                <div class="accordion-body">
                  <div class="d-flex mb-2">Tema 1</div>
                  <hr>
                  <div class="d-flex mb-2">Tema 2</div>
                  <hr>
                  <div class="d-flex mb-2">Tema 3</div>
                </div>
              </div>
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
        const pago = document.getElementById("pago");
        const expresiones = {
            nombres: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
            correo: /\w+@[a-zA-Z]+\.[a-zA-Z]+(\.[a-zA-z]+)?/,
            correo_1: /\w+@(.+)?/
        }
        nombre.addEventListener("input", function () {
                let msj = "";
                if (nombre.value.length < 3)
                    msj = "Digite un nombre con mínimo 3 caracteres";
                else if (!nombre.value.match(expresiones.nombres))
                    msj = "Digite un nombre válido! (Sin números ni caracteres especiales)";
                nombre.setCustomValidity(msj);
            }
        )
        apellidos.addEventListener("input", function () {
                let msj = "";
                if (apellidos.value.length < 3)
                    msj = "Digite un apellido paterno con mínimo 3 caracteres";
                else if (!apellidos.value.match(expresiones.nombres))
                    msj = "Digite un apellido paterno válido! (Sin números ni caracteres especiales)";
                apellidos.setCustomValidity(msj);
            }
        )
        celular.addEventListener("input", function () {
                let msj = "";
                if (celular.value.length != 9)
                    msj = "Digite un número con 9 caracteres";
                else if (!celular.value.startsWith("9"))
                    msj = "Un número móvil debe comenzar con el número 9";
                celular.setCustomValidity(msj);
            }
        )
        correo.addEventListener("input", function () {
                let msj = "";
                if (!correo.value.includes('@'))
                    msj = "Debe incluir un '@'";
                else if (!correo.value.match(expresiones.correo_1))
                    msj = "Debe incluir una parte (letras y/o números) antes del '@'";
                else if (!correo.value.match(expresiones.correo))
                    msj = "Después del '@' solo debe contener letras con al menos un punto entre ellas (ej. 'unmsm.edu.pe')";
                correo.setCustomValidity(msj);
            }
        )

        function validarForm() {
            if (nombres.value != "" && apellidos.value != "" && celular.value != "" && correo.value != "" && pago.value != "") {
                $('#modalInscripcion').modal('hide');
                document.getElementById("inscripcion-correcta").removeAttribute("hidden");
                setTimeout(() => {
                    document.getElementById("inscripcion-correcta").setAttribute("hidden", true);
                }, 3000);
            }
        }

    </script>
    <div class="card mx-auto w-50">
      <div class="card-header">
        <div class="text-center fw-bolder h4 pt-2">Cursos relacionados</div>
      </div>

    </div>
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-2 row-cols-xl-4 justify-content-center">
          <?php
          require("cursosRelacionados.php");
          ?>

      </div>
    </div>
  </div>


  </div>

<?php
require("footer.php");
?>