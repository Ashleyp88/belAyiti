<?php
	session_start();
	//chargement de l'autoloader pour la gestion automatique des class

	define('ROOT', dirname(__DIR__));
	require ROOT.'/app/App.php';


	\App\App::load();
	//definition d'une variable pour stocker la base de donner
	$bd = \App\App::getInstance()->getDatabase();

	//definition d'une instancce de la classe manager
	$usM = new App\UserManager($bd);

	$user;



	/*
	*
	*la gestion de la variable $p
	*pour gere plusieurs pages
	*ainsi la gestion en php est
	*100 plus pratique que jamais
	*/

	if(isset($_GET['p']))
	{
		//si notre variable est defini on la met dans une autre
		$p = $_GET['p'];
	}
	else
	{
		//dans le cas contraire on initialise la page d'aceuille par defaut
		$p = 'home';
	}


	//ob_start pour executer la pages comme dans la variable
	ob_start();

	//un switch pour tout controle dans notre index.php
	switch ($p)
	{
		case 'home':
			# code...
			require('../pages/home.php');
			break;

		case 'log':
			# code...
			require('../pages/inscription.php');
			break;

		case 'signOut':
			# coode...
			//require('..pages/logOut.php');
			break;
		case 'checkup':
				# code...
			require('../pages/validation.php');
				break;
		case 'membre':
			# code...
			//require('..pages/member.php');
			break;
		case 'produit':
			# code...
			require('../pages/saler.php');
			break;

		case 'stockage':
			# code...
			require('../pages/stock.php');
			break;

		case 'con':
			require('../pages/connexion.php');
			break;

	default:
			# code...
			require('../pages/404.php');
			break;
	}


	//ob_clean pour terminer le processus dans la variable
	$content = ob_get_clean();

	//defini le template pour executer la page courrante
	if(empty($usr->id))
		require('../pages/template/default.php');
	else
		require('../pages/template/default-membre.php');

