<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" href="res/css/style.css">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">
</head>
<body>  
    <form action="validar.php" method="post">
        <h1>Iniciar Sesion</h1>
        <p>Usuario</p>
        <input type="text" placeholder="ingrese su nombre" name="usuario" class="text">
        <p>Contraseña</p>
        <input type="password" placeholder="ingrese su contraseña" name="contraseña" class="text">

        <input type="submit" value="Ingresar" class="submit">
    </form>
    <form action="registrar.php" class="register">
        <input type="submit" value="registrarse" class="register">
    </form>
</body>
</html>