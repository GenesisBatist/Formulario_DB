<?php

if(!empty($_GET["id"])){
    $id=$_GET["id"];
    include "conexion.php"; 
    $sql=$conexion->query("DELETE from personas WHERE id=$id");

    if ($sql== true) {
        echo '<div class="alert alert-success"> Persona eliminada correctamente </div>';

    }else {
        echo '<div class="alert alert-danger> Error al eliminar </div>';


    }
}

?>
