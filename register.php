<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/all.css">
    <title>Regiístrate</title>
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


                <!--<br><h2>Datos del Vehiculo: </h2></br>
                <p>Placa:<input type="text" name="placa"> Linea <input type="text" name="linea"> Modelo <input type="text" name="Modelo">
                    Cilindrada CC <input type="text" name="Cilindrada"> Color <input type="color" name="Color">
                    Marca:<select name="" id="">
                        <option value="Toyota">Toyota</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <option value="Renault">Renault</option>
                        <option value="mazda">mazda</option>
                        <option value="Hiundai">Hiundai</option></select></p>

                <p>Servicio <input type="text" name="Servicio"> Clase de vehiculo <input type="text" name="Clase de vehiculo">
                    Tipo de Carroceria <input type="text" neme="Tipo de Carroceria"> Capacidad <input type="text" name="Capacidad" size="2"> Numero de Serie <input type="text" name="Numero de serie"> </p>



                </select></p>
                <p>
                    Deja un mensaje:
                    <textarea name="mensaje"></textarea>-->

                <button  name="submit" class="btn btn-primary submit btn-block btn-inicio-sesion submit">Enviar</button>

            </form>
            <a href="index.php" class="clave-olvidada">
                ¿Ya tienes cuenta?
            </a>
        </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.9/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="ajax/sendAjax.js"></script>

<script>
        enviarAjax('api/users/create.php',
            '#addUser',
            '.submit',
        );
        // window.location.href = "pages/dashboard.php"
</script>

</body>

</html>