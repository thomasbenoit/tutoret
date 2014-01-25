<?php
	include_once('../class/Auth.php');
	session_start();


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Acceuil</title>
</head>
<body>
<h2>PAGE D'Administration</h2>
<?php

		if(Auth::islog()){ 

			echo 'Bonjour, '.$_SESSION['Auth']->getPseudo().'<a href="logout.php"> Deconnexion</a></br>';
			if(Auth::isAdmin()){
				
			}
		}
		else{
			echo '<a href="connexion.php">Se connecter</a>';
		}
?>

</body>
</html>