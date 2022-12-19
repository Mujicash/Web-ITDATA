<?php
require("header.php");
require "repositorio.php";

$idProyecto = $_GET["idProyecto"];
$proyecto   = getProjectById($idProyecto);
?>
<section class="page-section about-heading">
  <div class="container">
    <!--<img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="<?php /*echo $proyecto["imagen"]; */ ?>" alt="..."/>-->
    <div class="card w-50 mx-auto">
          <div class="card-header">
            <div class="text-center fw-bolder h4 pt-2">Proyecto</div>
          </div>
    </div>
    <hr>
    <div class="project-content">
      <div class="bg-faded rounded p-4">
        <h2 class="section-heading mb-4">
          <span class="section-heading-lower"> <?php echo $proyecto["nombre"]; ?> </span>
        </h2>
        <hr>
        <div class="general-project-data">
          <p>
            Responsable: <?php echo $proyecto["responsable"]["nombre"]; ?> <br>
            Correo: <?php echo $proyecto["responsable"]["correo"]; ?> <br>
            Código: <?php echo $proyecto["codigo"]; ?> <br>
            Tipo: <?php echo $proyecto["tipo"]; ?>
          </p>
        </div>
      </div>
    </div>
    <div class="card w-50 mx-auto my-4">
        <div class="card-header">
          <div class="text-center fw-bolder h4 pt-2">Miembros a cargo</div>
        </div>
    </div>
    <div class="row justify-content-center">
                <?php
                  $miembros = $proyecto["miembros"];
                  foreach ($miembros as $miembro): ?>
                    <div class="card h-100 col-md-5 col-sm-10 mb-3 mx-3 d-inline-flex text-center" style="max-width:300px">
                      <div style="overflow:hidden; width:100px; height:100px; border-radius: 50%; margin:auto; margin-top:10px">
                        <img src="assets/img/miembros/<?=$miembro["codigo"] ?>.jpeg" alt="avatar">
                      </div>
                      <div class="card-body">
                      <h2 class="section-heading mb-0">
                        <span class="section-heading-upper mb-2"><?=$miembro["nombre"] ?></span>
                        <span class="section-heading-lower text-center"><?=$miembro["condicion"] ?></span>
                      </h2>
                      </div>
                      <div class="card-footer">
                        <span class="d-block"> Código: <?=$miembro["codigo"] ?></span>
                        <span class="d-block">Correo:</span>
                        <a href="mailto:<?=$miembro["correo"] ?>"> <?=$miembro["correo"] ?></a>
                      </div>
                    </div>
                  <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
require("footer.php");
?>
