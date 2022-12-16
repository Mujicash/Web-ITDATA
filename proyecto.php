<?php
require("header.php");
require "repositorio.php";

$idProyecto = $_GET["idProyecto"];
$proyecto   = getProjectById($idProyecto);
?>
<section class="page-section about-heading">
  <div class="container">
    <!--<img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="<?php /*echo $proyecto["imagen"]; */ ?>" alt="..."/>-->
    <div class="project-content">
      <div class="bg-faded rounded p-5">
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
        <hr>
        <table class="table-fill">
          <thead>
          <tr>
            <th class="table-title" colspan="4"><?php echo $proyecto["nombre"]; ?></th>
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
          $miembros = $proyecto["miembros"];
          foreach ($miembros as $miembro): ?>
            <tr>
              <td class="text-left"><?php echo $miembro["condicion"]; ?></td>
              <td class="text-left"><?php echo $miembro["codigo"]; ?></td>
              <td class="text-left"><?php echo $miembro["nombre"]; ?></td>
              <td class="text-left"><?php echo $miembro["correo"]; ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<?php
require("footer.php");
?>
