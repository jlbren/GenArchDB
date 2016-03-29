#!/bin/bash --


sqlite3 -batch genarch.db <<EOF
UPDATE results
SET en_r2 = $1 
WHERE ensid = $2 and tissue = $3 ; 
EOF
