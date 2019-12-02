<?php
if (!empty($_POST)) :

    $ema = $_POST["email"];
    $nom = $_POST["nombre"];
    $ape = $_POST["apellidos"];
    $pas = $_POST["pass"];
    $con = $_POST["conf"];

    if ($pas == $con) :

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=receta", "root", "");
            //redirigimos la pagina
            header('Location: index.php');
        } catch (PDOException $e) {
            die("ERROR:: " . $e->getMessage());
        }

        $sql = "INSERT INTO usuario (Correo,NomUsu,ApeUsu,Contraseña) ";
        $sql .= "VALUES (:ema, :nom, :ape, md5(:pas)) ;";

        $sqlp = $pdo->prepare($sql);

        $sqlp->bindValue(":ema", $ema, PDO::PARAM_STR);
        $sqlp->bindValue(":pas", $pas, PDO::PARAM_STR);
        $sqlp->bindValue(":nom", $nom, PDO::PARAM_STR);
        $sqlp->bindValue(":ape", $ape, PDO::PARAM_STR);


        if (!$sqlp->execute())
            $error = "Se ha producido un error en la creación del usuario";

        $pdo = null;

    else :
        $error = "Las contraseñas no coinciden";
    endif;

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

        <div class="row">
            <div class="col-sd-12 mx-auto mb-5">
                <u style="color:#27AE60"><b>
                        <h1>Registro</h1>
                    </b></u>
            </div>
        </div>

        <?php
        if (isset($error)) :
            echo "<div class=\"alert alert-danger w-50 mx-auto\">";
            echo $error;
            echo "</div>";
        endif;
        ?>

        <form method="post">

            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="email">Correo electronico:</label>
                    <input class="form-control" type="email" name="email" placeholder="ejemplo@gmail.com" required />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" name="nombre" required />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="apellidos">Apellidos:</label>
                    <input class="form-control" type="text" name="apellidos" required />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="pass">Contraseña:</label>
                    <input class="form-control" type="password" name="pass" required />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="conf">Confirmación contraseña:</label>
                    <input class="form-control" type="password" name="conf" required />
                </div>
            </div>

            <!-- registro -->
            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <button class="btn btn-outline-success w-100" type="submit">Registrar</button>
                </div>
            </div>
        </form>

        <!-- volver atrás -->
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <a href="http://localhost/receta" style="color:#27AE60">Volver atrás</a>
            </div>
        </div>

    </div>

    <br />

</body>

</html>