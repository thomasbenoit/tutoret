<?php
		require_once'databaseco.php';
?>

<?php


	if(isset($_GET) && !empty($_GET)){
		if(isset($_GET['salle'])){
			$nomsalle=htmlentities($_GET['salle']);
			$q=array(':nomsalle' => $nomsalle);
			$sql='SELECT nom FROM salle WHERE nom=:nomsalle';
			$req=$cnx->prepare($sql);
			$req->execute($q);		
			$count=$req->rowCount($sql);
			if($count==1){
				$affichage=$nomsalle;	
				if(isset($_POST)){
					if(!empty($_POST)){
						print_r($_POST);
					}
				}
			}

			else{
				$erreurarg='La salle n\'existe pas';
			}
		}else{
			$erreurarg='Aucune salle n\'a ete choisi';
		}
	}
	else{

			$erreurarg='Aucune salle n\'a ete choisi';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
  <title>Ma première page avec du style</title>

</head>

<body>


<?php

	if(isset($erreurarg))echo $erreurarg;
	if(isset($affichage)){

		$sql="select s1.id from salle s1 where s1.nom='".$affichage."'";
		$req=$cnx->prepare($sql);
		$req->execute();
		$idsalle=$req->fetchAll();

		$idsalle=$idsalle[0]['id'];
		$sql="select numordi from ordinateur where id_salle='".$idsalle."'";
		$req=$cnx->prepare($sql);
		$req->execute();	
		$result=$req->fetchAll(PDO::FETCH_ASSOC);
		echo '</br></br></br></br>';
		echo '<form method="post" action="post_salle.php?salle='.$affichage.'"">';
		echo "Cocher/décocher tout <input onclick=\"CocheTout(this, '".$affichage."[]');\" type=\"checkbox\"><br/>";
		$cpt=0;
			foreach ($result as $key) {
				$cpt++;
				echo '<div id="image">';
				echo '<INPUT type="checkbox" name="'.$affichage.'[]" value="'.$affichage.'-'.$key['numordi'].'">'.$affichage.'-'.$key['numordi'];
				echo '</div>';
				if($cpt%5 == 0)echo  "</br>";
			}
		echo '<input type="submit" value="Envoyer" /></form>';
		

	}

?>
<script type="text/javascript">

function CocheTout(ref, name) {
	var form = ref;
 
	while (form.parentNode && form.nodeName.toLowerCase() != 'form'){ 
		form = form.parentNode; 
	}
 
	var elements = form.getElementsByTagName('input');
 
	for (var i = 0; i < elements.length; i++) {
		if (elements[i].type == 'checkbox' && elements[i].name == name) {
			elements[i].checked = ref.checked;
		}
	}
}
</script>

</body>
</html>