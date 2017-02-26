<?php

		namespace App;


		/**
		* la classe qui se chargera a charger notre tableau pour \
		*  
		*/
		class Config
		{

			//tableau pour enregistrer les infos sur notre base de donner
			private $settings = [];

			//variable static pour gere une instance de notre base
			private static $_instance;
			


			function __construct()
			{
				
				$this->settings = require dirname(__DIR__).'/config/config.php'; 
				//var_dump(dirname(__DIR__).'/config/config.php');
			}

			
			public static function  getInstance()
			{

				if(is_null(self::$_instance))
				{

					self::$_instance = new Config();

				}

				return self::$_instance;
			}



			public function get($key)
			{

				if (!isset($this->settings[$key])) {
					# code...
					return null;
				}

				return $this->settings[$key];

			}

			
		}