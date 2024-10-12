<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conoce a nuestros profesores</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <img src="images/logo.png" alt="Company Logo" width="80" height="80">
        </div>
    </header>

    <main>
        <?php include 'php/conexion.php'; ?> <!-- Conecta a la base de datos -->
        
        <h2>Lista de Profesores</h2>
        <table class="tablaprofes">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Estudios</th>
                <th>Acciones</th>
            </tr>

            <?php
            $selec = $con->query("SELECT * FROM profesores"); // Obtener registros de la tabla "profesores"
            while ($fila = $selec->fetch_assoc()) { ?>
            <tr>
                <td><img src="data:image/jpeg;base64,<?php echo base64_encode($fila['Imagen']); ?>" alt="Foto del profesor" width="80" height="80"></td>
                <td><?php echo $fila['Nombre']; ?></td>
                <td><?php echo $fila['Apellido']; ?></td>
                <td><?php echo $fila['Estudios']; ?></td>
                <td>
                    <a href="profesores2.php?ID=<?php echo $fila['ID']; ?>">Ver</a> |
                    <a href="editar.php?ID=<?php echo $fila['ID']; ?>">Editar</a> |
                    <a href="php/borrar.php?ID=<?php echo $fila['ID']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Borrar</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </main>

    <footer class="main-footer">
        <div>&copy; 2024 Instituto Mexicano de valores. Todos los derechos reservados.</div>
        <div><a href="/privacy-policy">Política de privacidad</a></div>
    </footer>
</body>
</html>
