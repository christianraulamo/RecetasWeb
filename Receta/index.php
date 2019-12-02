<?php

// Antonio José Sánchez Bujaldón
// Desarrollo Web en Entorno Servidor
// curso 2019/20

require_once("Sesion.php");

// instanciamos la sesión
$ses = Sesion::getInstance();

// comprobamos si hay sesión activa
if ($ses->checkActiveSession())
    $ses->redirect("main.php");

// comprobar si hemos recibido información
// a través del formulario ($_POST)
if (!empty($_POST)) :

    $email = $_POST["email"];
    $pass  = $_POST["pass"];

    // intentamos loguearnos
    $ok  = $ses->login($email, $pass);

    // si el login se ha hecho con éxito
    // redirigimos al main
    if ($ok) $ses->redirect("main.php?p=1");

endif;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title></title>
    <meta charset="utf8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-sd-12 mx-auto">
                <img src="imagenes/logo.png" />
            </div>
        </div>
        <form method="post">

            <!-- correo -->
            <div class="row mt-5 form-group">
                <div class="col-md-12">
                    <input class="form-control w-25 mx-auto" type="text" name="email" value="ejemplo@gmail.com" placeholder="ejemplo@gmail.com" required />
                </div>
            </div>

            <!-- contraseña -->
            <div class="row form-group">
                <div class="col-md-12">
                    <input class="form-control w-25 mx-auto" type="password" name="pass" value="ejemplo" placeholder="contraseña" required />
                </div>
            </div>

            <?php
            if ((isset($ok)) && (!$ok)) :
                ?>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="alert alert-danger w-50" role="alert">
                            Usuario o contraseña incorrectas.
                        </div>
                    </div>
                </div>
            <?php
            endif;
            ?>

            <!-- botón LOGUEO -->
            <div class="row form-group">
                <div class="col-md-12 text-center">
                    <button class="btn btn-outline-success w-25" type="submit">Entrar</button>
                </div>
            </div>

        </form>

        <!-- acceso REGSISTRO -->
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="registro.php" style="color:#27AE60">Registrar</a>
            </div>
        </div>

    </div>
</body>

</html>