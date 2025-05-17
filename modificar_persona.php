<?php
include "conexion.php";
$id = $_GET["id"];
$sql = $conexion->query("SELECT * FROM personas WHERE id = $id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/04ef8aad82.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: #f0f2f5;
        }
        .form-container {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-md-6 m-auto form-container">
            <h4 class="text-center text-primary mb-4">Modificar Registro</h4>
            
            <form method="POST">
                <!-- Incluimos el archivo que ejecuta la modificación -->
                <?php include "accion_modificar.php"; ?>

                <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

                <?php while ($datos = $sql->fetch_object()) { ?>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $datos->nombre ?>">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="<?= $datos->apellido ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" name="telefono" id="telefono" value="<?= $datos->telefono ?>">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo" value="<?= $datos->correo ?>">
                    </div>
                <?php } ?>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success" name="btnregistrar" value="ok">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
