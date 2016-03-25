#!/bin/sh

sqlite3 -batch genarch.db <<EOF
CREATE TABLE results (
	gene CHAR(50) NOT NULL,
	ensid CHAR(50) NOT NULL,	
	tissue CHAR(200) NOT NULL,
	h2 FLOAT(24) NOT NULL,
	h2_ci CHAR(20) NOT NULL,
	pve FLOAT(24) NOT NULL,
	pve_CI CHAR(20) NOT NULL,
	pge FLOAT(24) NOT NULL, 
	pge_CI CHAR(20) NOT NULL, 
	en_r2 FLOAT(24),
	PRIMARY KEY(ensid,tissue)
	
); 
EOF