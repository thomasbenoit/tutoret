<?php
	include_once('../class/Auth.php');
  require_once('../databaseco.php');
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
              <li class="active"><a href="gerergroupe.php">Gerer les groupes</a></li>
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
              <h3>Les groupes</h3>
                <?php 
                if(isset($_GET['groupe'])){
                  $groupe=htmlentities($_GET['groupe']);
                  $q=array(':groupe'=>$groupe);
                  $sql='SELECT idScripts,nomScripts,descriptionScripts FROM droitscripts natural join scripts WHERE idGroupes=:groupe';
                  $req=$cnx->prepare($sql);
                  $req->execute($q);
                  
                   $res=$req->fetchAll();
                  $count=$req->rowCount();
                  if($count>0){

                  echo "<h3>Liste des scripts autiriser par le groupe</h3>";
                  echo '<table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>script</th>
                        <th>Autorisé</th>
  
                      </tr>
                    </thead>'; 
                    foreach ($res as $key) {
  
                    extract($key);
              
              echo '
                  
                    <tbody>
                      <tr>
                        <td>
                            <span class="label label-info">'.$nomScripts.'</span>
                        </td>
                         <td>
                          <p> <span class="label label-success">Autorisé</span> <p>
                        </td>
                      </tr>';
                  }
            echo "</tbody>
          </table>";
                  

                 }
                 else{
                  echo "<h3>Aucun scripts autiriser par le groupe</h3>";

                 }
                   
                }
                  
                  $sql='SELECT idScripts,nomScripts FROM scripts';
                  $req=$cnx->prepare($sql);
                  $req->execute();
                   $res=$req->fetchAll();
                  $count=$req->rowCount();
                echo "<h3 class=\"form-signin-heading\">Ajouter un script au groupe</h3>";
   echo "<form class=\"form-inline\" action=\"ajouterscriptgroupe.php?groupe=$groupe\" method=\"POST\">";
   
             echo '<select>';
          foreach ($res as $key ) {
            extract($key);
            echo "<option value=\"$idScripts\">$nomScripts</option>";
          }
          echo  ' </select>';
              echo ' <button class="btn  btn-primary" type="submit" name="submit">Ajouter</button>
            </form>';
                ?>

                           
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