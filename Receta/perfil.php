<?php

require_once "Sesion.php";
require_once "Database.php";

$ses = Sesion::getInstance();

if (!$ses->checkActiveSession())
    $ses->redirect("index.php");

$usr = $ses->getUsuario();

require_once "navbar.php";

if (!empty($_POST)) :

    $ema = $_POST["email"];
    $nom = $_POST["nombre"];
    $ape = $_POST["apellidos"];


    try {
        $pdo = new PDO("mysql:host=localhost;dbname=receta", "root", "");
    } catch (PDOException $e) {
        die("ERROR:: " . $e->getMessage());
    }

    $sql = "UPDATE usuario set Correo = :ema ,NomUsu = :nom, ApeUsu = :ape ";
    $sql .= " where IdUsu = $usr->IdUsu  ; ";

    $sqlp = $pdo->prepare($sql);

    $sqlp->bindValue(":ema", $ema, PDO::PARAM_STR);
    $sqlp->bindValue(":nom", $nom, PDO::PARAM_STR);
    $sqlp->bindValue(":ape", $ape, PDO::PARAM_STR);
    //$usr = $ses->relogin();



    if (!$sqlp->execute())
        $error = "Se ha producido un error en la modificación del usuario";

    else {
        class usu
        {
            private $usur;
            public function actualizacion(): bool
            {
                $ses = Sesion::getInstance();
                $usr = $ses->getUsuario();

                $db = Database::getInstance("root", "", "receta");

                $sql = "SELECT * FROM usuario WHERE IdUsu='$usr->IdUsu' ;";

                if ($db->query($sql)) :

                    $this->usur = $db->getObject("Usuario");
                    return true;

                endif;

                return false;
            }
        }
       // usu::actualizacion();

       // $ses->setUsuario($usur);

        
    }


    $pdo = null;

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
                        <h1>Perfil</h1>
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
                    <input class="form-control" type="email" name="email" value="<?= $usr->Correo ?>" required />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" value="<?= $usr->NomUsu ?>" name="nombre" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <label class="col-form-label" for="apellidos">Apellidos:</label>
                    <input class="form-control" type="text" value="<?= $usr->ApeUsu ?>" name="apellidos" />
                </div>
            </div>

            <!-- registro -->
            <div class="row form-group">
                <div class="col-md-4 mx-auto">
                    <button class="btn btn-outline-success w-100" type="submit">Modificar</button>
                </div>
            </div>
        </form>



    </div>

    <br />

</body>

</html>