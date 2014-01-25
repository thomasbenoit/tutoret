<?php
	session_start();
	require('../class/auth.php');
	require_once('../databaseco.php');
	
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
			echo ' Vous etes connecté en tant que '.$_SESSION['Auth']['pseudo'].' <a href="../logout.php">Deconnexion</a></br>';
			if(Auth::isAdmin()){
				echo "<a href=\"GererUser.php\"> Gerer les utilisateurs</a>";
				$sql='SELECT id,pseudo,password,email,groupe from users';
				$req=$cnx->prepare($sql);
				$req->execute();
				$res=$req->fetchAll();
				  echo "<FORM action=\"GererUser.php\" method=\"POST\">";
				  echo "<SELECT name=\"id\" size=\"1\">";
				foreach ($res as $key) {

    				echo "<OPTION value=\"".$key['id']."\">".$key['pseudo'];
				}
				echo "<input type=\"submit\" name=\"submit\" value=\"Gerer\"/>";  echo "</FORM>";
				
				if(isset($_POST) && !empty($_POST) && isset($_POST['id'])){
	
					$q=array('id'=>htmlentities($_POST['id']));
					$sql='SELECT pseudo,password,email,groupe from users where id=:id';
				$req=$cnx->prepare($sql);
				$req->execute($q);
				$res=$req->fetchAll();
					  echo "<form action=\"ModifierUser.php\" method=\"POST\">";
    							echo "<label for=\"pseudo\">Pseudo:</label></br>";
						        echo" <input type=\"text\" name=\"pseudo\" value=\"".$res[0]['pseudo']."\"/></br>";
						        echo"<label for=\"email\">Email :</label></br>";
						    	echo"<input type=\"email\" name=\"email\" value=\"".$res[0]['email']."\"/></br>";
						           
						       echo" <label for=\"password\">Password:</label></br>";
						       echo" <input type=\"password\" name=\"password\" value=\"default\"/></br> la valeur est ici default</br> ";
						            
								echo"<label for=\"password\">Password:</label></br>";
						       echo" <input type=\"password\" name=\"repeatpassword\" value=\"default\"/>
						    </br>la valeur est ici default</br>";

						        
								echo"<input type=\"submit\" name=\"submit\" value=\"modifier\"/>";
						echo"</form>";
				}
			
			}
			else{
				session_destroy();
				header('Location:../index.php');
			}
		}
		else {
				header('Location:../index.php');
		}
?>

</body>
</html>


