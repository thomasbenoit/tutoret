#!/bin/bash

if [[ $# -eq 1 ]]; then
listepc=$1
fin=${#listepc}
pos=0
esp=" "
vir=","
res=""
sep=":"
posfin=1
while [[ $posfin -lt $(($fin-1)) ]]; do
posfin=$(expr index "$listepc" "$sep")
pc=${listepc:$pos:$(($posfin-1))}
listepc=${listepc:$posfin}
fin=${#listepc}
posfin=0
allumer=$(ping $pc -c 1 -q > /dev/null 2>&1 && echo 1 || echo 0)
qui=$(ssh $pc who | grep -e tty7 | cut -d ' ' -f1)
infopc=$pc$vir$allumer$vir$qui$esp
res=$res$infopc

done

echo $res
else
echo " Nombre d'argument incorrect"
fi