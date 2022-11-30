<?php
    for ($i=1; $i <= 4 ; $i++) { 
        if($id < count($array))
            $id++;
        else
            $id = 1;
            $e = getCourseById($id);
            ?>
            <div class="col mb-5" style="max-width:300px">
            <a style="text-decoration: none;" href="detalles_curso.php?id=<?=$e["id"]?>">
                <div class="card h-100 p-0">
                    <img class="card-img-top" src="./assets/img/cursos/<?=$e["imagen"]?>" height="150" width="100" alt="<?=$e["imagen"]?>"/>
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