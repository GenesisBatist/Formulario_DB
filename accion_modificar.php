<?php
if (!empty($_POST["btnregistrar"])) {
    if (
        !empty($_POST["nombre"]) and
        !empty($_POST["apellido"]) and
        !empty($_POST["telefono"]) and
        !empty($_POST["correo"])
    ) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];

        include "conexion.php"; // Asegúrate de incluir la conexión

        $sql = $conexion->query("UPDATE personas SET nombre ='$nombre', apellido='$apellido',telefono= '$telefono', correo= '$correo' WHERE id=$id");

        if ($sql == true) {
            header("location:index.php");
          
        }else {
            echo '<div class="alert alert-danger">Error al Modificar persona</div>';
        }
    } else {
        echo '<div class="alert alert-warning"> Existen campos vacíos</div>';
    }
}
?>