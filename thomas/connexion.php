<?php
	require_once 'databaseco.php';
	require_once('class/Auth.php');
	require_once('class/User.php');
	session_start();
	
?>
<?php
if(!empty($_POST)){
	$pseudo=$_POST['pseudo'];
	$password=sha1($_POST['password']);
	$q=array(':pseudo' => $pseudo,':password'=>$password);
	$sql='SELECT pseudoUtilisateurs,mdpUtilisateurs FROM utilisateurs WHERE pseudoUtilisateurs=:pseudo and mdpUtilisateurs=:password';
	$req=$cnx->prepare($sql);
	$req->execute($q);
	$count=count($req);

	

	if($count==1){
		$sql='SELECT idUtilisateurs from utilisateurs where pseudoUtilisateurs=:pseudo and mdpUtilisateurs=:password and etatUtilisateurs=1';
		$req=$cnx->prepare($sql);
		$req->execute($q);
		$actif=$req->rowCount();
		$res=$req->fetchAll();
		if($actif==1){
		
			$_SESSION['Auth']=new User($res[0]['idUtilisateurs']);
			
			
			header('Location:index.php');
			
		}
		else{
			$error_actif='le compte a pas encore ete activer';
		}

	}
	else{
		$error_unknow='Le Pseudo ou mot de passe est incorrect';

	}
}
?>
<?php 
	header('Location:index.php');
?>