<?php

function getAllProjects() {
    return json_decode(file_get_contents(__DIR__ . '/assets/database/proyectos.json'), true);
}

function getProjectById($id) {
    $datos = getAllProjects();

    foreach ($datos as $dato) {
        if ($dato["id"] == $id) {
            return $dato;
        }
    }

    return null;
}

function getAllCourses(){
    $str = file_get_contents(__DIR__ . '/assets/database/data_cursos.json');
    return (json_decode($str,true));
}
function getCourseById($id){
    $array = getAllCourses();
    foreach ($array as $dato) {
        if ($dato["id"] == $id) {
            return ($dato);
        }
    }
    return(null);
}