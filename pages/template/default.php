<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/belha/belgo4.png">

      <!-- basic stylesheet with skins imported -->
      <link rel="stylesheet" type="text/css" href="assets/mighty/src/css/mightyslider.starter-plugin.css"/>

    <title><?php echo \App\app::getInstance()->title;?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container-fluid">
      <header>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="index.php?p=home" class="navbar-brand">  Bel AYITI</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?p=home">Accueil</a></li>
                <li><a href="index.php?p=mur">Galerie</a></li>
                <li><a href="index.php?p=contact">Contactez-nous</a></li>
                <!-- <li><a class="visible" id="click">se connecter</a></li> -->
                <li>
                  <a href="index.php?p=con"> <span class="glyphicon glyphicon-log-in"></span> Connexion</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <!-- ajout de l'image -->
        <div class="row" >
          <img src="assets/img/chant.jpg" alt="Image d'accueil" class="img-responsive img1">
        </div>
        <span class=" col-md-6 col-md-offset-3 text-center glyphicon glyphicon-triangle-bottom Fleche"></span>

      </header>

      <!-- ici on affichera notre variable -->
      <div class="container">
        <?= $content ?>
      </div>

    </div>

    <footer class="basdepage modal-footer bottom ">
        <div class="row">
            <div class="container">
                <div class="col-xs-6">
                    <p>Ce site web a ete code avec beaucoup d'amour par le groupe <a href="index.php?p=contact">Thinkers</a></p>
                </div>
                <div class="col-xs-6">
                    <p class="basPage">Suivez nous sur : </p>
                    <ul class="icon-bar basPage">
                        <li>
                           <span class="fa-stack fa-lg">
                               <i class="fa fa-circle fa-stack-2x"></i>
                               <i class="fa fa-facebook fa-stack-1x"></i>
                            </span>
                        </li>
                        <li class="glyphicon glyphicon-camera"></li>
                        <li class="glyphicon glyphicon-camera"></li>
                    </ul>

                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster 
    <script src="essets/bootstrap/js/bootstrap.min.js"></script>-->
    <script>window.jQuery || document.write('<script src="assets/bootstrap/jquery.js"><\/script>')</script>
    <script src="../public/assets/bootstrap/js/jquery.js"></script>
    <script src = "assets/bootstrap/js/script.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->   
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

  <!--slider insertion -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Main slider JS script file -->
    <script type="text/javascript" src="mightyslider/src/js/mightyslider.starter-plugin.min.js"></script>
  </body>
</html>
