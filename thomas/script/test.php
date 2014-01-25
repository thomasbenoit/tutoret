<?php

for($i=1;$i<17;$i=$i+1){
	if($i<10){
		$resultat=shell_exec('ssh -o StrictHostKeyChecking=no -q info21-0'.$i.' who | grep -e tty7 | cut -d \' \' -f1' );
echo $resultat;

	}
	else{
		$resultat=shell_exec('ssh -o StrictHostKeyChecking=no -q info21-'.$i.' who | grep -e tty7 | cut -d \' \' -f1' );
	echo $resultat;

	}
}

$resultat=shell_exec('ssh -o StrictHostKeyChecking=no -q info23-17 who | grep -e tty7 | cut -d \' \' -f1' );
	echo $resultat;
?>
