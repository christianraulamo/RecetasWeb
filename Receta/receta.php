<?php

class Receta
{

	private $IdRec;
	private $NomRec;
	private $Receta;
	private $Ingredientes;
	private $Tiempo;
	private $Raciones;
	private $Temporada;
	private $IngredientePrincipal;
	private $Metodo;
	private $Clase;
	private $Uso;
	private $Otros;
	private $Posicion;
	private $Tipo;

	public function __construct()
	{ }

	public function getIdRec()
	{
		return $this->IdRec;
	}

	public function setIdRec($IdRec)
	{
		$this->IdRec = $IdRec;

		return $this;
	}

	public function getNomrec()
	{
		return $this->NomRec;
	}

	public function setNomRec($NomRec)
	{
		$this->NomRec = $NomRec;

		return $this;
	}

	public function getReceta()
	{
		return $this->Receta;
	}

	public function setReceta($Receta)
	{
		$this->Receta = $Receta;

		return $this;
	}

	public function getIngredientes()
	{
		return $this->Ingredientes;
	}

	public function setIngredientes($Ingredientes)
	{
		$this->Ingredientes = $Ingredientes;

		return $this;
	}

	public function getIngredientePrincipal()
	{
		return $this->IngredientePrincipal;
	}

	public function setIngredientePrincipal($IngredientePrincipal)
	{
		$this->IngredientePrincipal = $IngredientePrincipal;

		return $this;
	}

	public function getTipo()
	{
		return $this->Tipo;
	}

	public function setTipo($Tipo)
	{
		$this->Tipo = $Tipo;

		return $this;
	}

	public function getTiempo()
	{
		return $this->Tiempo;
	}

	public function setTiempo($Tiempo)
	{
		$this->Tiempo = $Tiempo;

		return $this;
	}

	public function getRaciones()
	{
		return $this->Raciones;
	}

	public function setRaciones($Raciones)
	{
		$this->Raciones = $Raciones;

		return $this;
	}

	public function getTemporada()
	{
		return $this->Temporada;
	}

	public function setTemporada($Temporada)
	{
		$this->Temporada = $Temporada;

		return $this;
	}

	public function getMetodo()
	{
		return $this->Metodo;
	}

	public function setMetodo($Metodo)
	{
		$this->Metodo = $Metodo;

		return $this;
	}

	public function getClase()
	{
		return $this->Clase;
	}

	public function setClase($Clase)
	{
		$this->lase = $Clase;

		return $this;
	}

	public function getUso()
	{
		return $this->Uso;
	}

	public function setUso($Uso)
	{
		$this->Uso = $Uso;

		return $this;
	}

	public function getOtros()
	{
		return $this->Otros;
	}

	public function setOtros($Otros)
	{
		$this->Otros = $Otros;

		return $this;
	}

	public function getPosicion()
	{
		return $this->Posicion;
	}

	public function setPosicion($Posicion)
	{
		$this->Posicion = $Posicion;

		return $this;
	}
}
