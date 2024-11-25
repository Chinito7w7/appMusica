<?php
include 'dbCon.php'; // Verifica la ruta correctamente

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $artista = $_POST['artista'];
    $album = $_POST['album'];
    $uploaded_at = date("Y-m-d H:i:s");

    // Manejo del archivo de audio
    $audio = $_FILES['file'];
    $audioPath = null;
    if ($audio && $audio['tmp_name']) {
        $audioPath = './uploads/' . basename($audio['name']);
        if (!move_uploaded_file($audio['tmp_name'], $audioPath)) {
            die("Error al mover el archivo de audio.");
        }
    } else {
        die("No se subió ningún archivo de audio.");
    }

    // Manejo de la imagen del álbum
    $albumImage = $_FILES['album_image'];
    $albumImagePath = null;
    if ($albumImage && $albumImage['tmp_name']) {
        $albumImagePath = './uploads/' . basename($albumImage['name']);
        if (!move_uploaded_file($albumImage['tmp_name'], $albumImagePath)) {
            die("Error al mover la imagen del álbum.");
        }
    }

    // Insertar datos en la base de datos
    $stmt = $conn->prepare("INSERT INTO canciones (titulo, artista, album, file_path, album_image, uploaded_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $titulo, $artista, $album, $audioPath, $albumImagePath, $uploaded_at);

    if ($stmt->execute()) {
        echo "Canción subida con éxito.";
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error al subir la canción: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
