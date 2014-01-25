
ping $1 -c 1 -q > /dev/null 2>&1 && co=1 || co=0

if [[ $co -ge 1 ]]; then

echo $(ssh -o StrictHostKeyChecking=no -q $1 who | grep -e tty7 | cut -d ' ' -f1)

fi
