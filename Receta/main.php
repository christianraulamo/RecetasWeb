<?php

require_once "Receta.php";
require_once "Sesion.php";
require_once "Database.php";

define("MAX_COL", 3);
define("MAX_ITEM", 8);

$ses = Sesion::getInstance();

if (!$ses->checkActiveSession())
	$ses->redirect("index.php");

$usr = $ses->getUsuario();

require_once "navbar.php";
?>

<div class="content">

	<?php

	$db = Database::getInstance("root", "", "receta");

	$db->query("SELECT COUNT(*) AS total FROM receta ;");
	$item  = $db->getObject();
	$total = $item->total;

	$pag = isset($_GET["p"]) ? $_GET["p"] : 1;

	$ini = ($pag - 1) * MAX_ITEM;

	if (!$db->query("SELECT * FROM receta LIMIT $ini, " . MAX_ITEM . " ;")) :
		mostrarAlerta("No se han encontrado recetas en la base de datos", "danger");
	else :

		do {

			echo "<div class=\"row mb-3\">";
			$col = 0;
			while (($col < MAX_COL) && ($item = $db->getObject("Receta"))) :
				?>

				<div class="col col-lg-4">
					<div class="card mx-auto" style="width:22rem;">
						<h5 class="card-header"><?= $item->getNomRec() ?></h5>
						<div class="card-body">
							<h5 class="card-title">Ingrediente principal: <?= $item->getIngredientePrincipal() ?></h5>
							<p class="card-text">Temporada: <?= $item->getTemporada() ?></p>
							<a href="info.php?id=<?= $item->getIdRec() ?>" class="btn btn-success">Ver mas</a>
						</div>
					</div>

</div>

<?php
			$col++;

		endwhile;

		echo "</div>";
	} while ($item);

	$ant_cond = ($pag == 1);
	$sig_cond = (($pag * MAX_ITEM) >= $total);

	?>


<nav aria-label="paginación">
	<ul class="pagination justify-content-center">

		<li class="page-item <?= $ant_cond ? "disabled" : "" ?>">
			<a class="page-link" href="<?= $ant_cond ? "#" : "main.php?p=" . ($pag - 1) ?>">anterior</a>
		</li>

		<li class="page-item <?= $sig_cond ? "disabled" : "" ?>">
			<a class="page-link" href="<?= $sig_cond ? "#" : "main.php?p=" . ($pag + 1) ?>">siguiente</a>
		</li>
	</ul>
</nav>


<?php

endif;
?>

</div>

</div>

</body>

</html>