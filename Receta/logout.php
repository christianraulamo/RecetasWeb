<?php

	require_once "Sesion.php" ;

	$ses = Sesion::getInstance() ;

	$ses->close() ;

	$ses->redirect("index.php") ;
