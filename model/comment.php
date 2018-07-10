<?php

class Comment 
{
	private $_id;
	private $_id_billet;
	private $_auteur;
	private $_date_creation;
	private $_nb_signalement;
	private $_contenu; 

	public function __construct($_id, $_id_billet, $_auteur, $_date_creation, $_contenu, $_titre)
	{
		$this->setId($_id);
		$this->setId_billet($_id_billet);
		$this->setAuteur($_auteur);
		$this->setDate_creation($_date_creation);
		$this->setContenu($_contenu);
		$this->setTitre($_titre);
	}
//getters

	public function id()
	{
		return $this->_id;
	}

	public function id_billet()
	{
		return $this->_id_billet;
	}

	public function auteur()
	{
		return $this->_auteur;
	}

	public function date_creation()
	{
		return $this->_date_creation;
	}

	public function nb_signalement()
	{
		return $this->_nb_signalement;
	}

	public function contenu()
	{
		return $this->_contenu;
	}

//setters

	public function setId($id)
	{
		$id = (int) $id; // conversion en entier si ce n'est pas déjà le cas
		if ($id > 0) 
		{
			$this->_id = $id; //la valeur est assigné à l'attribut correspondant
		}
	}

	public function setId_billet($id_billet)
	{
		$id_billet = (int) $id_billet; 
		if ($id_billet > 0) 
		{
			$this->_id_billet = $id_billet; 
		}	
	}

	public function setAuteur($auteur)
	{
		if (is_string($auteur)) //si la valeur est une chaine de caractères
		{
			$this->_auteur = $auteur;
		}
	}

	public function setDate_creation($date_creation)
	{
		$this->_date_creation = $date_creation;
	}

	public function setNb_signalement($nb_signalement)
	{
		$nb_signalement = (int) $nb_signalement; 
		if ($nb_signalement > 0) 
		{
			$this->_nb_signalement = $nb_signalement; 
		}	
	}

	public function setContenu ($contenu)
	{
		if (is_string($contenu))
		{
			$this->_contenu = $contenu;
		}
	}

}