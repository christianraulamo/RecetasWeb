<?php

require_once "Sesion.php";
require_once "Database.php";

$ses = Sesion::getInstance();

if (!$ses->checkActiveSession())
	$ses->redirect("index.php");

$usr = $ses->getUsuario();

require_once "navbar.php";
?>

<?php

if (!empty($_POST)) :

	$nom = $_POST["Nombre"];
	$pos = $_POST["Posicion"];
	$clas = $_POST["Clase"];
	$tem = $_POST["Temporada"];
	$ingrprin = $_POST["IngredientePrincipal"];
	$met = $_POST["Metodo"];
	$tipo = $_POST["Tipo"];
	$uso = $_POST["Uso"];
	$otros = $_POST["Otros"];
	$tiempo = $_POST["Tiempo"];
	$rac = $_POST["Raciones"];
	$ingr = $_POST["Ingredientes"];
	$rec = $_POST["Receta"];

	try {
		$pdo = new PDO("mysql:host=localhost;dbname=receta", "root", "");
		//redirigimos la pagina
		header('Location: nuevaReceta.php');
	} catch (PDOException $e) {
		die("ERROR:: " . $e->getMessage());
	}

	$sql = "INSERT INTO receta (NomRec,Ingredientes,Receta,Tiempo,Raciones,Temporada,IngredientePrincipal) ";
	$sql .= "VALUES (:nom, :ingr, :rec, :tiempo, :rac, :tem, :ingrprin) ;";

	$sqlp = $pdo->prepare($sql);

	$sqlp->bindValue(":nom", $nom, PDO::PARAM_STR);
	$sqlp->bindValue(":ingr", $ingr, PDO::PARAM_STR);
	$sqlp->bindValue(":rec", $rec, PDO::PARAM_STR);
	$sqlp->bindValue(":tiempo", $tiempo, PDO::PARAM_STR);
	$sqlp->bindValue(":rac", $rac, PDO::PARAM_STR);
	$sqlp->bindValue(":tem", $tem, PDO::PARAM_STR);
	$sqlp->bindValue(":ingrprin", $ingrprin, PDO::PARAM_STR);


	$sql2 = "INSERT INTO clase (NomClas) ";
	$sql2 .= "VALUES (:clas)";

	$sqlp2 = $pdo->prepare($sql2);

	$sqlp2->bindValue(":clas", $clas, PDO::PARAM_STR);

	$sql3 = "INSERT INTO posicion (Posicion) ";
	$sql3 .= "VALUES (:pos)";

	$sqlp3 = $pdo->prepare($sql3);

	$sqlp3->bindValue(":pos", $pos, PDO::PARAM_STR);

	$sql4 = "INSERT INTO metodo (Metodo) ";
	$sql4 .= "VALUES (:met)";

	$sqlp4 = $pdo->prepare($sql4);

	$sqlp4->bindValue(":met", $met, PDO::PARAM_STR);

	$sql5 = "INSERT INTO tipo (Tipo) ";
	$sql5 .= "VALUES (:tipo)";

	$sqlp5 = $pdo->prepare($sql5);

	$sqlp5->bindValue(":tipo", $tipo, PDO::PARAM_STR);

	$sql6 = "INSERT INTO uso (Uso) ";
	$sql6 .= "VALUES (:uso)";

	$sqlp6 = $pdo->prepare($sql6);

	$sqlp6->bindValue(":uso", $uso, PDO::PARAM_STR);

	$sql7 = "INSERT INTO otros (Otros) ";
	$sql7 .= "VALUES (:otros)";

	$sqlp7 = $pdo->prepare($sql7);

	$sqlp7->bindValue(":otros", $otros, PDO::PARAM_STR);

	if (!$sqlp->execute())
		$error = "Se ha producido un error en la creación de la receta";
	if (!$sqlp2->execute())
		$error = "Se ha producido un error en la creación de la receta2";

	if (!$sqlp3->execute())
		$error = "Se ha producido un error en la creación de la receta3";
	if (!$sqlp4->execute())
		$error = "Se ha producido un error en la creación de la receta4";
	if (!$sqlp5->execute())
		$error = "Se ha producido un error en la creación de la receta5";
	if (!$sqlp6->execute())
		$error = "Se ha producido un error en la creación de la receta6";
	if (!$sqlp7->execute())
		$error = "Se ha producido un error en la creación de la receta7";

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
						<h1>Agregar Receta</h1>
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
					<label class="col-form-label" for="Nombre">Nombre:</label>
					<input class="form-control" type="text" name="Nombre" required />
				</div>
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="Posicion">Posición:</label>
					<input class="form-control" type="text" name="Posicion" />
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="Clase">Clase:</label>
					<input class="form-control" type="text" name="Clase" />
				</div>
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="Temporada">Temporada:</label>
					<select id="inputState" class="form-control"  name="Temporada" >
						<option selected>Invierno</option>
						<option selected>Primavera</option>
						<option selected>Verano</option>
						<option selected>Otoño</option>
						<option selected></option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="IngredientePrincipal">Ingrediente Principal:</label>
					<input class="form-control" type="text" name="IngredientePrincipal" />
				</div>
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="Metodo">Método:</label>
					<input class="form-control" type="text" name="Metodo" />
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="Tipo">Tipó:</label>
					<input class="form-control" type="text" name="Tipo" />
				</div>
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="Uso">Usó:</label>
					<input class="form-control" type="text" name="Uso" />
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="Otros">Otrós:</label>
					<input class="form-control" type="text" name="Otros" />
				</div>
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="Raciones">Raciones:</label>
					<input class="form-control" type="number" name="Raciones" />
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<label class="col-form-label" for="Tiempo">Tiempo:</label>
					<input class="form-control" type="number" name="Tiempo" />
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-10 mx-auto">
					<label class="col-form-label" for="Ingredientes">Ingredientes y sus medidas:</label>
					<textarea class="form-control" type="text" name="Ingredientes" required></textarea>
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-10 mx-auto">
					<label class="col-form-label" for="Receta">Receta:</label>
					<textarea class="form-control" type="text" name="Receta" required></textarea>
				</div>
			</div>

			<!-- registro -->
			<div class="row form-group">
				<div class="col-md-4 mx-auto">
					<button class="btn btn-outline-success w-100" type="submit">Añadir</button>
				</div>
			</div>
		</form>
	</div>

	<br />

</body>

</html>