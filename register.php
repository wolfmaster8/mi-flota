<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/all.css">
    <title>Regístrate</title>
</head>
<body>
<div id="login-container" class="container d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-center text-white h3">Regístrate</h1>
    <div class="card card-container">
        <div class="row d-flex justify-content-center">
            <form id="addUser" class="formulario-inicio-sesion" method="POST">
                <div class="form-group d-flex justify-content-center flex-column">
                    <label class="text-center" for="name">Nombre</label>
                    <input id="name" autofocus name="name" type="text" class="form-control" placeholder="Wilmer">
                </div>
                <div class="form-group d-flex justify-content-center flex-column">
                    <label class="text-center" for="lastName">Apellido</label>
                    <input id="lastName" name="lastName"  class="form-control" type="text" placeholder="Montealegre">
                </div>

                <div class="form-group d-flex justify-content-center flex-column">
                    <label class="text-center" for="cc">Número de documento</label>
                    <input type="text" id="cc" class="form-control" placeholder="10xxxxxxxx" name="cc" maxlength="10">
                </div>

                <div class="form-group d-flex justify-content-center flex-column">
                    <label class="text-center" for="email">Email</label>
                    <input id="email" name="email" placeholder="wilmer@ejemplo.com" type="email" class="form-control">
                </div>
                <div class="form-group d-flex justify-content-center flex-column">
                    <label class="text-center" for="password">Contraseña</label>
                    <input id="password" name="password"  type="password" class="form-control">
                </div>

                <button  name="submit" class="btn btn-primary submit btn-block btn-inicio-sesion submit">Enviar</button>

            </form>
            <a href="index.php" class="clave-olvidada">
                ¿Ya tienes cuenta?
            </a>
        </div>
    </div>
</div>

<?php
include_once 'components/footer.php';
renderFooter()
?>


<script>
    sendAjaxPost('api/users/create.php',
            '#addUser',
            '.submit',
        );
</script>

</body>

</html>