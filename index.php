<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>-->
    <link rel="stylesheet" href="style/all.css">
    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap" rel="stylesheet">
    <title>Mi Flota - Inicio de Sesión</title>
</head>

<body>
<div id="login-container" class="container d-flex align-items-center justify-content-center">
    <div class="card card-container">
        <img class="tarjeta-imagen-perfil" alt="perfil" src="img/login-driver.png" />
        <p class="tarjeta-nombre-perfil"></p>
        <form class="formulario-inicio-sesion" method="POST">
            <input type="email" value="admin@admin.com" id="email" class="form-control" placeholder="juan@ejemplo.com" required
                   autofocus>
            <input type="password" value="admin" id="password" class="form-control" placeholder="Contraseña" required>
            <button class="btn btn-lg btn-primary btn-block btn-inicio-sesion submit" type="submit">Iniciar sesión</button>
        </form>
        <a href="register.php" class="clave-olvidada">
            ¿No tienes cuenta?
        </a>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script>
    $(".submit").click(function(e){
        e.preventDefault();
        window.location.href = "pages/dashboard.php";
    });
</script>
</body>
</html>