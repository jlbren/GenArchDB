#!/bin/bash --

table_name=$1

sqlite3 -batch genarch.db <<EOF
.separator ","
.import $1 results
EOF