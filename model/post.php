<?php

class Post 
{
	private $_id;
	private $_date_creation;
	private $_contenu; 
	private $_titre;

	public function __construct($_id, $_date_creation, $_contenu, $_titre)
	{
		$this->setId($_id);
		$this->setDate_creation($_date_creation);
		$this->setContenu($_contenu);
		$this->setTitre($_titre);
	}

//getters

	public function id()
	{
		return $this->_id;
	}

	public function date_creation()
	{
		return $this->_date_creation;
	}

	public function contenu()
	{
		return $this->_contenu;
	}

	public function titre()
	{
		return $this->_titre;
	}

//setters

	public function setId($id)
	{
		$id = (int) $id; 
		if ($id > 0) 
		{
			$this->_id = $id; 
		}
	}

	public function setDate_creation($date_creation)
	{
		$this->_date_creation = $date_creation;
	}

	public function setContenu ($contenu)
	{
		if (is_string($contenu))
		{
			$this->_contenu = $contenu;
		}
	}

	public function setTitre ($titre)
	{
		if (is_string($titre))
		{
			$this->_titre = $titre;
		}
	}

}