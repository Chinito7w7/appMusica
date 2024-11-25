<?php
include 'dbCon.php'; // Asegúrate de que este archivo conecta correctamente a la base de datos.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Obtén los datos del archivo para eliminarlo del servidor
    $stmt = $conn->prepare("SELECT file_path, album_image FROM canciones WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($filePath, $albumImagePath);
    $stmt->fetch();
    $stmt->close();

    // Elimina los archivos asociados
    if ($filePath && file_exists("." . $filePath)) {
        unlink("." . $filePath);
    }
    if ($albumImagePath && file_exists("." . $albumImagePath)) {
        unlink("." . $albumImagePath);
    }

    // Elimina el registro de la base de datos
    $stmt = $conn->prepare("DELETE FROM canciones WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error al eliminar la canción: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
