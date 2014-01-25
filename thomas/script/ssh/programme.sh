count=$(ps aux| grep -e $1 |grep -e $2 |wc -l)

count=$(($count-2))

if [[ $count -ge 2 ]]; then

echo 1

else

echo 0

fi