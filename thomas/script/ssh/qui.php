<?php
include('Net/SSH2.php');
for($i=1;$i<32;$i=$i+1){
	if($i<10){
		$prefixe='info27-0';

	}
	else{
		$prefixe='info27-';
	}
	$lancer=0;
	if(shell_exec('bash ping.sh '.$prefixe.$i)==1){
		$ssh = new Net_SSH2($prefixe.$i);
		if(!$ssh->login('rangeard', 'cru4dire')){
   			exit('Login Failed');
		}
		$user='rangeard';
		$personne=$ssh->exec('who | grep -e tty7 | cut -d \' \' -f1');
		echo $personne.' ';
		$lancer=$ssh->exec('ps aux| grep -v ps |grep -v '.$user.' |grep -e firefox | grep -v color |wc -l');

		if($lancer>=1){
			echo $lancer.' firefox';
		}

		echo '</br>';
	}

}
?>