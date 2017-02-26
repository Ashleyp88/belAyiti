<?php

	namespace App;

	use \PDO; 

	/*********/

	class Database
	{

		private $db_name;

		private $db_user;
		
		private $db_pass;
		
		private $db_host;

		private $pdo;

		function __construct($db_name, $db_user = '', $db_pass = '', $db_host = 'localhost')
		{

			$this->db_name = $db_name;

			$this->db_user = $db_user;

			$this->db_pass = $db_pass;

			$this->db_host = $db_host;
		}

		private function getPDO()
		{
			if($this->pdo === null)
			{

				$pdo = new PDO('mysql:dbname=jouer_pour_gagner;host=localhost', 'root', '');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				$this->pdo = $pdo;

			}

			return $this->pdo;
		}


		public function query($statement)
		{

			$req = $this->getPDO()->query($statement);

			$data = $req->fetchAll(PDO::FETCH_OBJ);

			return $data;
		}

		public function query1($statement)
		{

			$req = $this->getPDO()->query($statement);

			return $data = $req->fetch(PDO::FETCH_ASSOC);
		}

		

		public function prepare($statement,$attribute)
		{

			$req = $this->getPDO()->prepare($statement);

			$req->execute($attribute);

			return $req;

		}

		public function lastId()
		{

			return $req = $this->getPDO()->LastInsertId();

		}
	}
