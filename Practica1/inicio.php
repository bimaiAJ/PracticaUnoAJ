<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Botón</title>
    <link rel="stylesheet" href="css/Caratula.css" media="screen" />
    <style>
        /* Estilo base de la imagen */
        img {
            width: 400px;
            height: 300px;
            transition: transform 0.3s ease; /* Animación suave */
        }

        /* Efecto cuando el cursor pasa sobre la imagen */
        img:hover {
            transform: scale(1.1); /* Escalar al 120% del tamaño original */
        }
    </style>
</head>
<body>
    
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdwM9t4UpuMQBnElgU1ejgq0i8dw68GnJFxA&s" alt="imagen colegio" width="400" height="300">

    <h1>Bienvenido al COLEGIO LOS SAUCES</h1>
    <p>Haz clic en el botón para ir iniciar el control:</p>

    <button onclick="window.location.href='portadaE.php'">Ir a Control</button>
</body>
</html>
