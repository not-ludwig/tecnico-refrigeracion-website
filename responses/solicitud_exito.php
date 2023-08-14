<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta Solicitud</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        main {
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 25px
        }

        h1 {
            font-weight: 900;
        }

        .return:visited {
            color: white;
        }

        .return {
            text-decoration: none;
            background: #0077b6;
            color white;
            padding: 25px;
            border-radius: 15px;
            color: white;
        }
    </style>

    <main>
        <h1>Su solicitud fue enviada con exito!</h1>
        <p>De ser aceptada, nos estaremos comunicando con usted via correo electronico de <strong>1-3 dias laborables</strong>.</p>
        <p>Pase buen dia!</p>
        <a class="return" href="../index.php">Volver al inicio</a>
    </main>
</body>
</html>