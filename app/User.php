<?php

		namespace App;

		/**
		* classe qui gere les personnage qui sont connecter sur mon site
		*/
		class User
		{
			// definition des variables de font de notre application web
			private $pseudo;

			private $mail;

			private $telephone;

			private $password;

			private $id;

			private $dateInscription;

			private $settings = [];

			/*
			**definition du constructeur par defaut de notre application web
			*/ 
			function __construct( array $info)
			{
				# code...
				
				$this->hydrate($info);

				$this->settings = $info;	
				
			}


			/*
			*definition des getter de la classe
			*/
			public function getPseudo()
			{

				return $this->pseudo;

			}

			public function getMail()
			{

				return $this->mail;

			}

			public function getTelephone()
			{

				return $this->telephone;

			}

			public function getId()
			{

				return $this->id;

			}

			public function getDateInscription()
			{

				return $this->dateInscription;

			}

			public function getSettings()
			{

				return $this->settings;
				
			}


			/*
			 *definition des setter pour les memes buts
			 */
			public function setPseudo($pseudo)
			{

				$this->pseudo = $pseudo;

			} 

			public function setMail($mail)
			{

				$this->mail = $mail;

			}

			public function setTelephone($telephone)
			{

				$this->telephone = $telephone;

			}

			public function setId($id)
			{

				$this->id = $id;
				
			}

			/**
			*definiton de a fonction d'hydratation
			*pour charger automatiquement
			*la gestion de chargement et d'enregistrement
			*/
			private function hydrate(array $info)
			{

				foreach ($info as $key => $value) {
					# code...

					$method = 'set'.ucfirst($key);

					//on verifi si la ethode existe grace a la fonction methodd_exists
					if(method_exists($this, $method))
					{

						$this->$method($value);

					}

				}


			} 
		}