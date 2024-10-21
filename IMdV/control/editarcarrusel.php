<?php
include '../php/conexion.php'; // Conexión a la base de datos

// Obtener las imágenes actuales del carrusel
$consulta = $con->query("SELECT * FROM carrusel ORDER BY id ASC LIMIT 3");
$imagenes = $consulta->fetch_all(MYSQLI_ASSOC);

// Si se ha enviado el formulario para actualizar las imágenes
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    for ($i = 1; $i <= 3; $i++) {
        // Si se ha subido una nueva imagen
        if (!empty($_FILES["image$i"]['tmp_name'])) {
            $imagen = addslashes(file_get_contents($_FILES["image$i"]['tmp_name']));
            $update = "UPDATE carrusel SET imagen='$imagen' WHERE id=$i";

            if ($con->query($update)) {
                echo "Imagen $i actualizada exitosamente.<br>";
            } else {
                echo "Error al actualizar la imagen $i: " . $con->error . "<br>";
            }
        }
    }

    // Redirigir para evitar reenvíos al refrescar la página
    header("Location: control.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Control - Carrusel</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <style>
        /* General body styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px;
}

/* Header styling */
h2 {
    text-align: center;
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Form container */
form {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    max-width: 600px;
    margin: 0 auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Form labels */
label {
    font-weight: bold;
    display: block;
    margin-bottom: 8px;
    color: #555;
}

/* Input fields */
input[type="text"], textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 15px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}

/* Input field focus effect */
input[type="text"]:focus, textarea:focus {
    border-color: #007bff;
}

/* Textarea */
textarea {
    height: 120px;
    resize: vertical;
}

/* File input styling */
input[type="file"] {
    padding: 10px;
    margin-bottom: 15px;
}

/* Submit button */
input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease-in-out;
}

/* Submit button hover effect */
input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Centered image preview */
img {
    display: block;
    margin: 0 auto 15px;
    max-width: 100%;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Spacing */
br {
    margin-bottom: 15px;
}

/* Responsive styling */
@media (max-width: 768px) {
    form {
        padding: 15px;
    }

    h2 {
        font-size: 20px;
    }

    input[type="submit"] {
        width: 100%;
    }
}

    </style>
    <h2>Administrar Carrusel de Imágenes</h2>
    
    <form action="" method="post" enctype="multipart/form-data">
    <?php foreach ($imagenes as $index => $imagen): ?>
    <label for="image<?php echo $index + 1; ?>">Imagen <?php echo $index + 1; ?>:</label><br>
    <?php 
        // Check if the image data exists and is valid
        if (isset($imagen['imagen']) && !empty($imagen['imagen'])) {
            $imageData = base64_encode($imagen['imagen']);
            echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Imagen ' . ($index + 1) . '" width="200"><br>';
        } else {
            echo '<p>Error: No hay datos disponibles para la imagen ' . ($index + 1) . '.</p>';
        }
    ?>
    <input type="file" name="image<?php echo $index + 1; ?>" id="image<?php echo $index + 1; ?>"><br><br>
<?php endforeach; ?>
        
        <input type="submit" value="Actualizar Carrusel">
    </form>
</body>
</html>
