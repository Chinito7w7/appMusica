<?php include './assets/dbCon.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Song</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        /* Estilos generales */
        body {
            background-color: #121212;
            color: #B3B3B3;
            font-family: "Poppins", serif;
        }

        /* Navbar */
        .spotify-navbar {
            border-radius: 10px;
            background-color: #212121;
            padding: 10px;
            margin-top:10px;
        }

        .spotify-navbar .nav-link {
            color: #B3B3B3;
            margin-left: 10px;
            text-transform: uppercase;
            transition: color 0.3s ease-in-out;
        }

        .spotify-navbar .nav-link.active,
        .spotify-navbar .nav-link:hover {
            color: #1DB954;
        }

        /* Formulario */
        .upload-form {
            background-color: #212121;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            color: #B3B3B3;
        }

        .upload-form h2 {
            color: #1DB954;
            margin-bottom: 20px;
        }

        .upload-form .form-label {
            color: #B3B3B3;
        }

        .upload-form .form-control {
            background-color: #535353;
            color: #fff;
            border: 1px solid #1DB954;
        }

        .upload-form .form-control:focus {
            background-color: #535353;
            border-color: #1DB954;
            box-shadow: none;
        }

        .spotify-btn {
            background-color: #1DB954;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;

        }

        .spotify-btn:hover {
            background-color: #148C3A;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container-md">
        <nav class="navbar navbar-expand-lg spotify-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets\img\icons8-spotify-48.png" alt="Spotify Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Volver</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="upload.php">Cargar canción</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <form action="assets/upload_process.php" method="POST" enctype="multipart/form-data" class="upload-form mt-5">
            <h2>Subir una canción</h2>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="artista" class="form-label">Artista</label>
                <input type="text" class="form-control" id="artista" name="artista" required>
            </div>
            <div class="mb-3">
                <label for="album" class="form-label">Álbum</label>
                <input type="text" class="form-control" id="album" name="album" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Audio</label>
                <input type="file" class="form-control" id="file" name="file" accept="audio/*" required>
            </div>
            <div class="mb-3">
                <label for="album_image" class="form-label">Imagen del Álbum</label>
                <input type="file" class="form-control" id="album_image" name="album_image" accept="image/*" required>
            </div>
            <button type="submit" class="btn spotify-btn">Subir</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
