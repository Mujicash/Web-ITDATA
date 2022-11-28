<?php
function getAllCursos(){
	$str = file_get_contents("data_cursos.json");
	return (json_decode($str,true));
}
function getCursoId($id){
	$array = getAllCursos();
	 foreach ($array as $dato) {
        if ($dato["id"] == $id) {
            return ($dato);
        }
    }
	return(null);
}

?>