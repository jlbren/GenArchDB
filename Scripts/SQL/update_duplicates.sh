#!/bin/bash


while read l;  do

	IFS=',' read -r -a array <<<  "$l"
	sqlite3 -batch genarch.db <<EOF
		UPDATE results
		SET en_r2 = "NA"
		WHERE gene = "${array[0]}" and tissue = "${array[1]}" ; 
EOF
done < $1 

