<?php
require("header.php");
require "repositorio.php";

$proyectos = getData();

foreach ($proyectos as $proyecto):
?>
  <section class="page-section">
    <div class="project-card">
      <div class="project-card-container">
        <div class="project-card-image">
          <img src="<?php echo $proyecto["imagen"]; ?>" alt=""/>
        </div>
        <div class="project-card-content">
          <h2 class="project-card-title"><?php echo $proyecto["nombre"]; ?> </h2>
          <div class="cuerpo">
            <p>
              Responsable: <?php echo $proyecto["responsable"]["nombre"]; ?> <br>
              Correo: <?php echo $proyecto["responsable"]["correo"]; ?> <br>
              Código: <?php echo $proyecto["codigo"]; ?> <br>
              Tipo: <?php echo $proyecto["tipo"]; ?>
            </p>
            <a class="project-card-button" href="proyecto.php?idProyecto=<?php echo $proyecto["id"]; ?>">Más
              información</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endforeach; ?>
<?php
require("footer.php");
?>