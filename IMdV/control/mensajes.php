<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" href="stylesc.css">
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <a href="../index.html">
                <img src="../images/logo.png" alt="Logo del Instituto Mexicano de Valores">
            </a>
        </div>
    </header>
    
    <div class="secondary-header">
        <nav>
            <ul>
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="../oferta.html">Oferta Educativa</a></li>
                <li><a href="../acercade.html">Acerca de nosotros</a></li>
                <li><a href="../contacto.html">Contacto</a></li>
                <li><a href="../profesores1.php">Conoce a nuestros profesores</a></li>
                <li><a href="../Login/login.html">Inicio de sesión</a></li>
            </ul>
        </nav>
    </div>
    
    <main>
        <a href="control.php" class="btn-regresar">Regresar a Inicio</a>
        
        <?php 
        include '../php/conexion.php'; // Conexión a la base de datos
        
        // Eliminar mensaje si se envió la solicitud de eliminación
        if (isset($_POST['delete'])) {
            $emailToDelete = $_POST['email'];
            $deleteSql = "DELETE FROM mensajes WHERE Email = '$emailToDelete'";
            if ($con->query($deleteSql) === TRUE) {
                echo "Mensaje eliminado exitosamente.";
            } else {
                echo "Error al eliminar el mensaje: " . $con->error;
            }
        }

        // Consulta SQL para obtener los mensajes
        $sql = "SELECT nombre, Email, mensaje FROM mensajes";
        $result = $con->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Correo Electrónico</th><th>Mensaje</th><th>Acción</th></tr>";
            
            // Mostrar los datos de cada fila
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["mensaje"] . "</td>";
                echo "<td>";
                // Agregar formulario con botón para borrar
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='email' value='" . $row["Email"] . "'>";
                echo "<button type='submit' name='delete'>Borrar</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "No hay mensajes disponibles.";
        }
        
        // Cerrar conexión
        $con->close();
        ?>
    </main>
    
    <footer class="main-footer">
        <div>&copy; 2024 Instituto Mexicano de valores. Todos los derechos reservados.</div>
    </footer>
</body>
</html>