<?php
if (!empty($_POST["btnregistrar"])) {
    if (
        !empty($_POST["nombre"]) and
        !empty($_POST["apellido"]) and
        !empty($_POST["telefono"]) and
        !empty($_POST["correo"])
    ) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];

        include "conexion.php"; // Asegúrate de incluir la conexión

        $sql = $conexion->query("INSERT INTO personas(nombre, apellido, telefono, correo) VALUES('$nombre', '$apellido', '$telefono', '$correo')");

        if ($sql == true) {
            header("Location: index.php?mensaje=registrado");
            exit();
            echo '<div class="alert alert-success">Persona registrada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar persona</div>';
        }
    } else {
        echo '<div class="alert alert-warning">El registro tiene campos vacíos</div>';
    }
}
?>
