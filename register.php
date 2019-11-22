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
            <form class="formulario-inicio-sesion" method="POST">
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
                    <label class="text-center" for="tel">Teléfono</label>
                    <input id="tel"  class="form-control" placeholder="(+57) 300-xxx-xxxx" name="tel" type="tel">
                </div>

                <div class="form-group d-flex justify-content-center flex-column">
                    <label class="text-center" for="birthDate">Fecha de Nacimiento</label>
                    <input id="birthDate" name="birthDate"  class="form-control" type="date">
                </div>

                <div class="form-group d-flex justify-content-center flex-column">
                    <label class="text-center" for="email">Email</label>
                    <input id="email" name="email" placeholder="wilmer@ejemplo.com" type="email" class="form-control">
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

                <button type="submit" class="btn btn-primary submit btn-block btn-inicio-sesion">Enviar</button>

            </form>
            <a href="index.php" class="clave-olvidada">
                ¿Ya tienes cuenta?
            </a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script>
    $(".submit").click(function(e){
        e.preventDefault();
        window.location.href = "pages/dashboard.html"
    });
</script>
</body>

</html>