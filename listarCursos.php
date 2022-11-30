<?php
require("getCursos.php");
$array = getAllCursos();

foreach($array as $e){
	?>
<div class="col mb-5">
        
		<a style="text-decoration: none;" href="detalles_curso.php?id=<?=$e["id"]?>">
      <div class="card h-100">
          <img class="card-img-top" src="./assets/img/cursos/<?=$e["imagen"]?>" height="150" alt="<?=$e["imagen"]?>"/>
          <div class="card-body p-4">
            <div class="text-center">
				
              <h5 class="fw-bolder"><?=$e["nombre"]?></h5>
              S/. <?=$e["precio"]?>
            </div>
          </div>
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><button class="btn btn-outline-dark mt-auto">Ver detalles</button></div>
          </div>
        </div>
	  </a>
      </div>
<?php
}
?>