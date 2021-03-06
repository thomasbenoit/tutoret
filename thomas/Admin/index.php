<?php
	include_once('../class/Auth.php');
	session_start();
	if( !Auth::isAdmin()){
		header('Location:../index.php');
	}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Projet tuteuré</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../ico/favicon.png">
  </head>

  <body>
  	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Administration</a>
          <div class="nav-collapse collapse">


				<ul class="nav pull-right">
               	 <li class="dropdown">
                	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['Auth']->getPseudo();?><b class="caret"></b></a>
                	<ul class="dropdown-menu">
                 		<li><a href="../editprofil.php">Profil</a></li>
            	 		<li><a href="../logout.php">Déconnexion</a></li>
   
                	  	<li class="divider"></li>
                	  	<li><a href="index.php">Administration</a></li>
           		
                 	</ul>
              	 </li>
            	</ul>
             	<p class="navbar-text pull-right">Connecté en tant que</p>
     
           <ul class="nav">
                          <li class="active"><a href="index.php">Acceuil administration</a></li>
                          <li><a href="../index.php">retour au site</a></li>
                
                        </ul>
        
          </div><!--/.nav-collapse -->
        </div>

      </div>
    </div>

 <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Administration des utilisateurs</li>
              <li><a href="gerergroupe.php">Gerer les groupes</a></li>
              <li><a href="#">Gerer les utilisateurs</a></li>
              <li><a href="#">Activation des comptes</a></li>
              <li class="nav-header">Administration de la base</li>
      
               <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Ajouter une Salle<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Ajouter une Salle vide</a></li>
                            <li><a href="#">Ajouter salle et la remplir</a></li>
                        </ul>
                    </li>
              <li><a href="#">Ajouter un Post</a></li>
              <li class="nav-header">Administration des scripts</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h1>Bonjour et bienvenue sur la page d'administration du site</h1>
            <p>Cliquez sur le lien ci dessous pour acceder a la documentation de la zone d'administration</p>
            <p><a href="#" class="btn btn-primary btn-large">Documentation</a></p>
          </div>
          <div class="row-fluid">
            <div class="span12">
              <h3>Histrorique des derniers script utilise</h3>
           <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>script</th>
                <th>Utilisateur</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                    <span class="label label-info">Ping</span>
                </td>
                <td>
                  <p> thomas <p>
                </td>
                 <td>
                  <p> <span class="label">21-12-2013 11h55</span> <p>
                </td>
              </tr>
             
            </tbody>
          </table>
          
            </div>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.fluid-container-->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>

  </body>
</html>