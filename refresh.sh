#!/bin/bash
echo "> Ensuring permissions"
perm=$(stat -f '%A' data/)

if [ $perm -ne "777" ]
then
    chmod -R 777 data/
    echo -e "\033[0;32m> Changing permissions on data/ directory\033[0m"
else
    echo -e "\033[0;32m> Permissions are good!\033[0m"
fi

echo "> Refreshing Rift database (data/rift.db)"
FILE="data/rift.db"

sqliteLoc=`which sqlite3`
if [ -z "$sqliteLoc" ];
then
    echo -e "\033[0;31m!!! SQLite is required! (executable not found)\n\033[0m";
    exit;
fi

if [ -f $FILE ];
then
    rm data/rift.db;
    result=`$sqliteLoc data/rift.db < init.sql`;
    chmod -R 777 data/
fi
echo -e "\033[0;32m> DONE!"
echo -e "\033[0m"
