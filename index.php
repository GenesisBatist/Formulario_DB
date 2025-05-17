<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Con BD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/04ef8aad82.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: #f8f9fa;
        }
        .form-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-weight: 600;
        }
        .table-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="text-center mb-4 text-primary">FORMULARIO</h1>

        <?php include "eliminar_persona.php"; ?>

        <div class="row g-4">
            <!-- Formulario -->
            <div class="col-md-4">
                <div class="form-card">
                    <h4 class="text-center text-secondary mb-4">Registrar Persona</h4>
                    <form method="POST">
                        <?php
                        include "conexion.php";
                        include "registrar_personas.php";
                        ?>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" name="telefono" id="telefono">
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" name="btnregistrar" value="ok">
                                <i class="fa-solid fa-plus"></i> Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabla -->
            <div class="col-md-8">
                <div class="table-container">
                    <h4 class="mb-4 text-secondary">Listado de Personas</h4>
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $conexion->query("SELECT * FROM personas");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><?= $datos->id ?></td>
                                    <td><?= $datos->nombre ?></td>
                                    <td><?= $datos->apellido ?></td>
                                    <td><?= $datos->telefono ?></td>
                                    <td><?= $datos->correo ?></td>
                                    <td>
                                        <a href="modificar_persona.php?id=<?= $datos->id ?>" class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="index.php?id=<?= $datos->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
