<?php
session_start();
if(!empty($_SESSION['id'])){
    header("Location: dashboard.php?redirect=login");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>-->
    <link rel="stylesheet" href="style/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap" rel="stylesheet">
    <title>Mi Flota - Inicio de Sesión</title>
</head>

<body>
<div id="login-container" class="container d-flex align-items-center justify-content-center">
    <div class="card card-container">
        <img class="tarjeta-imagen-perfil" alt="perfil" src="img/login-driver.png" />
        <p class="tarjeta-nombre-perfil"></p>
        <form id="login" class="formulario-inicio-sesion" method="POST">
            <input type="email" value="jflobom@gmail.com" name="email" class="form-control" placeholder="juan@ejemplo.com" required
                   autofocus>
            <input type="password" value="123" name="password" class="form-control" placeholder="Contraseña" required>
            <button class="btn btn-lg btn-primary btn-block btn-inicio-sesion submit" type="submit">Iniciar sesión</button>
        </form>
        <a href="register.php" class="clave-olvidada">
            ¿No tienes cuenta?
        </a>
    </div>
</div>
<?php
include_once 'components/footer.php';
renderFooter()
?>

<script>
    sendAjaxPost('api/auth/login.php',
        '#login',
        '.submit',
        true,
        'dashboard.php'
    );
</script>
</body>
</html>