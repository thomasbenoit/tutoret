<?php
$server='localhost';
$user='root';
$pass='';
$bdd='tuto';
$port='3306';
try{
	$cnx=new PDO('mysql:host='.$server.';port='.$port.';dbname='.$bdd,$user,$pass);
}
catch(PDOException $e){
	echo $e->getMessage();
}


?>