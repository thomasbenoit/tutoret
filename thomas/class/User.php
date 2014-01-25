<?php

	require_once('databaseco.php');
	
?>
<?php
	class User {

		private $id;
		private $nom;
		private $prenom;
		private $mdp;
		private $pseudo;
		private $email;
		private $groupe;

		public function __construct($id){
			global $cnx;
			$a=array(':id'=>$id);
			$sql='SELECT * from utilisateurs where idUtilisateurs=:id';
			$req=$cnx->prepare($sql);
			$req->execute($a);
			$res=$req->fetchAll();
			$count=count($req);
			if($count==1){	
				$this->id=$id;
				$this->pseudo=$res[0]['pseudoUtilisateurs'];
				$this->nom=$res[0]['nomUtilisateurs'];
				$this->prenom=$res[0]['prenomUtilisateurs'];
				$this->email=$res[0]['emailUtilisateurs'];
				$this->groupe=$res[0]['idGroupes'];
				$this->mdp=$res[0]['mdpUtilisateurs'];
			}

						
		}
		static function existPUser($pseudo){
			global $cnx;
			$a=array(':pseudo'=>$pseudo);
			$sql='SELECT * from utilisateurs where pseudoUtilisateurs=:pseudo';
			$req=$cnx->prepare($sql);
			$req->execute($a);
			$count=count($req);
			if($count==1){	
	    		return true;
	    	}
	    	else{
	    		return false;
	    	}
		}
	    static function existNPUser($nom,$prenom){
	    	global $cnx;
	    	$a=array(':nom'=>$nom,':prenom'=>$prenom);
			$sql='SELECT * from utilisateurs where nomUtilisateurs=:nom and prenomUtilisateurs=:prenom';
			$req=$cnx->prepare($sql);
			$req->execute($a);
			$count=count($req);
			if($count==1){	
	    		return true;
	    	}
	    	else{
	    		return false;
	    	}
	    }
	    static  function editUser($id){
	    	global $cnx;
			$a=array(':id'=>$id);
			$sql='SELECT * from utilisateurs where id=:id';
			$req=$cnx->prepare($sql);
			$req->execute($a);
			$count=count($req);
			if($count==1){	

				$a2=array(
					':nom'    =>htmlentities($_POST['nom']),
					':prenom' =>htmlentities($_POST['prenom']),
					':pseudo' =>htmlentities($_POST['pseudo']),
					':mdp'    =>sha1(htmlentities($_POST['password'])),
					':email'  =>htmlentities($_POST['email']),
					':etat'   =>htmlentities($_POST['etat']),
					':groupe' =>htmlentities($_POST['groupe'])




				);
				$sql2='UDATE utilisateurs SET nomUtilisateurs=:nom,prenomUtilisateurs=:prenom,pseudoUtilisateurs=:pseudo,mdpUtilisateurs=:mdp,emailUtilisateurs=:email,etatUtilisateurs=:etat,idGroupes=:groupe WHERE id=:id';
				$req=$cnx->prepare($sql2);
				$req->execute($a2);
			}

	    }
	    public function affiche(){
	    	return $this->pseudo;
	    }
	    public function getPseudo(){
	    	return $this->pseudo;
	    }
	    public function getMdp(){
	    	return $this->mdp;
	    }
	    public function getGroupe(){
	    	return $this->groupe;
	    }







	}




?>