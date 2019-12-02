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