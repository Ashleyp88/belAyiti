<?php

	namespace App;

	/*
	*	la classe UserManager va nous permettre de
	*	la gestion de tous les operations des persoonnes
	*	qui sont sont deja inscris et d'autre qui en voudrons bien faire 
	*	partie de notre communauter
	*/
	/**
	* 
	*/
	class UserManager
	{
		
		//declaration de la variable qui aura l'instance de PDO
		private $_db;

		
		function __construct($db)
		{
			# code...
			$this->_db = $db;

		}

		//pour ajouter une personne a la base de donner
		public function add(User $usr)
		{

			$req = $this->_db->prepare('INSERT INTO tempUser (	pseudo, 
																password, 
																mail, 
																phone, 
																date_inscription)
														VALUE(  :pseudo,
																:password,
																:mail,
																:telephone,NOW())',$usr->getSettings());

			$usr->setId($this->_db->lastId());

		}

		//pour charger un participant dans la communauter
		public function loadUser($id)
		{

			$req = $this->_db->query1('SELECT * FROM tempUser WHERE id ='.$id);

			return $user = new User($req);


		}

	

		//pour en supprimer un participant de notre base
		public function delete(User $usr)
		{

			$this->_db->exec('DELETE FROM user WHERE id = '.$usr->getId());

		}

		//pour les mise ajours des differentes informations des membres
		public function update(User $usr, $attribute)
		{

			$req = $this->_db->prepare($statemet);

			$req->execute($attribute);

			return $req;
		}

		//methode pour changer de base de donner
		public function setDb(PDO $bd)
		{

			$this->_db = $bd;

		}





	}
