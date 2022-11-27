<?php

function getData() {
    return json_decode(file_get_contents(__DIR__ . '/data.json'),true);
}

function getProjectById($id) {
    $datos = getData();

    foreach ($datos as $dato) {
        if ($dato["id"] == $id) {
            return $dato;
        }
    }

    return null;
}