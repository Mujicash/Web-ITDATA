<?php
require("header.php");
require "repositorio.php";

$proyectos = getAllProjects();
?>
  <div class="box-container">
      <?php foreach ($proyectos as $proyecto): ?>
        <div class="box">
          <div class="heading">
            <h2><?php echo $proyecto["nombre"]; ?> </h2>
          </div>
          <img src="<?php echo $proyecto["imagen"]; ?>" alt=""/>
          <div class="text">
            <p>
              Responsable: <?php echo $proyecto["responsable"]["nombre"]; ?> <br>
              Correo: <?php echo $proyecto["responsable"]["correo"]; ?> <br>
              Código: <?php echo $proyecto["codigo"]; ?> <br>
              Tipo: <?php echo $proyecto["tipo"]; ?>
            </p>
            <a class="project-card-button" href="proyecto.php?idProyecto=<?php echo $proyecto["id"]; ?>">
              Más información
            </a>
          </div>
        </div>
      <?php endforeach; ?>
  </div>


  <!--  <div class="container">
      <div class="row g-5 justify-content-evenly">
        <div class="col-lg-12">
          <div class="card">
            <div class="row g-0">
              <div class="col-6 col-md-4">
                <img src="assets/img/ia.jpeg" alt="IA" class="card-img img-fluid rounded-start" />
              </div>
              <div class="col-6 col-md-8">Test</div>
            </div>
          </div>
        </div>
      </div>
    </div>-->
<?php
require("footer.php");
?>