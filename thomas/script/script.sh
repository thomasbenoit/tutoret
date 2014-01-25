	#!/bin/bash/
	#prendre en argument un tableau de pc et un tableau d'application a tester
	#pour chaque ip tester le nom de lutilisateur , tester les programme 
	#retourne chaine du type  : nompc,Etatpc,nomtuilisateur,logiciel:etat,logicel:etat...  nompc,nomtuilisateur,logitiel:etat,logitel:etat... 
	qui=$(ssh $1  who| grep -e tty| cut -d' ' -f1)
	count=$(ssh $1 ps aux| grep -e $qui |grep -e $2 |wc -l)
	count=$(($count))
	if [[ $count -ge 1 ]]; then
		res=$2
	else
		res=0
	fi

	echo $qui $res
