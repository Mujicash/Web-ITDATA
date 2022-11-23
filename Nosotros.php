<?php
require("header.php");
require "repositorio.php";

$data = getProjectById("1");
?>
  <section class="page-section about-heading">
    <div class="container">
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/SM1.jpg" alt="..."/>
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Nuestra </span>
                <span class="section-heading-lower">HISTORIA</span>
              </h2>
              <p>Fundado en el año 2020 por roman concha <br> Lista de mienbros: <br></p>
              <!--<p class="mb-0">

                <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/mienbros.png" alt="..."/>
              </p>-->

              <hr>
              <table class="table-fill">
                <thead>
                <tr>
                  <th class="table-title" colspan="4"><?php echo $data["nombre"] ?></th>
                </tr>
                <tr>
                  <th class="table-left">CONDICION</th>
                  <th class="table-left">CODIGO</th>
                  <th class="table-left">APELLIDOS Y NOMBRES</th>
                  <th class="table-left">CORREO</th>
                </tr>
                </thead>
                <tbody class="table-hover">
                <?php
                $miembros = $data["miembros"];
                foreach ($miembros as $miembro): ?>
                <tr>
                  <td class="text-left"><?php echo $miembro["condicion"] ?></td>
                  <td class="text-left"><?php echo $miembro["codigo"] ?></td>
                  <td class="text-left"><?php echo $miembro["nombre"] ?></td>
                  <td class="text-left"><?php echo $miembro["correo"] ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
require("footer.php");
?>