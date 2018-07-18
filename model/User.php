<?php

class User
{
	private $_id;
	private $_pseudo;
	private $_email;
	private $_pass;

	public function __construct(array $data)
	{
		if (isset($data['id'])) {
			$this->setId($data['id']);
		}
		if (isset($data['pseudo'])) {
			$this->setPseudo($data['pseudo']);
		}
		if (isset($data['email'])) {
			$this->setEmail($data['email']);
		}
		if (isset($data['pass'])) {
			$this->setPass($data['pass']);
		}
	}

//getters

	public function id()
	{
		return $this->_id;
	}

	public function pseudo()
	{
		return $this->_pseudo;
	}

	public function email()
	{
		return $this->_email;
	}

	public function pass()
	{
		return $this->_pass;
	}

//setters

	public function setId($id)
	{
		$id = (int) $id; 
		if ($id > 0) {
			$this->_id = $id; 
		}
	}

	public function setPseudo($pseudo)
	{
		if (is_string($pseudo)) {
			$this->_pseudo = $pseudo;
		}
	}

	public function setEmail($email)
	{
		if (is_string($email)) {
			$this->_email = $email;
		}
	}

	public function setPass($pass)
	{
		if (is_string($pass)) {
			$this->_pass = $pass;
		}
	}

}