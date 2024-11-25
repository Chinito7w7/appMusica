<?php include './assets/dbCon.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Spotify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        /* Estilos generales */
        body {
            background-color: #121212;
            font-family: 'Poppins', sans-serif;
            color: #FFFFFF;
        }

        .navbar {
            border-radius: 10px;
            padding-right:0;    
            padding-left:0;
            margin: 0;
            margin-top:10px;
            width: 100%;
            background-color: #272727;
        }



        .navbar-brand img {
            width: 40px;
        }

        .nav-link {
            color: #B3B3B3 !important;
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        .nav-link:hover, 
        .nav-link.active {
            color: #1DB954 !important;
        }

        .main {
            border-radius: 10px;
            padding:70px;
            background-color: #272727;
            display: flex;
            flex-wrap: wrap;
            gap: 2em;
            margin: 2em 0;
            justify-content: center;
        }

        .audio {
            width: 250px;
            height: 375px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0.5em;
            background-color: #272727;
            color: white;
            box-shadow: 1px 1px 20px 1px black;
            border-radius: 5px;
            text-align: center;
        }

        .audio img {
            width: 200px;
            height: 200px;
            margin: 0.5em;
            border-radius: 5px;
        }

        .audio h2 {
            font-weight: 500;
            font-size: medium;
            margin: 0.5em 0;
        }

        .audio p {
            font-size: small;
            font-weight: 300;
        }

        audio {
            width: 100%;
           
        }

        .btn-danger {
            margin-top: 10px;
            background-color: #B00020;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #8C0016;
        }
    </style>
</head>
<body>
    <div class="container-md">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/icons8-spotify-48.png" alt="Spotify Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="upload.php">Cargar canción</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="main">
            <?php
            $sql = "SELECT * FROM canciones ORDER BY uploaded_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='audio'>
                        <h2>{$row['titulo']}</h2>
                        <p>Artista: {$row['artista']} | Álbum: {$row['album']}</p>";
                    if ($row['album_image']) {
                        echo "<img src='./assets{$row['album_image']}' alt='Imagen del álbum'>";
                    }
                    echo "
                        <audio controls>
                            <source src='./assets{$row['file_path']}' type='audio/mpeg'>
                            Your browser does not support the audio element.
                        </audio>
                        <form method='POST' action='./assets/borrar_cancion.php'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit' class='btn btn-danger'>
                                <img src='assets/img/trash.png' alt='Eliminar' style='width: 16px; height: 16px;'>
                            </button>
                        </form>
                    </div>";
                }
            } else {
                echo "<p>No hay canciones cargadas.</p>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
