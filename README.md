Readme for GenArch Database 

Data is housed in the genarch.db file as a full SQL database. This was generated from the raw data and scripts found in the Scripts directory, using a combination of Rscript, unix shell, and sqlite3. 

The database contains a single table with the following schema: 


TABLE results (
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

To query the database using sqlite, download sqlite3 (Linux executable included in Scripts) and move the executable into the same directory as the genarch.db file. Enter into the commandline 'sqlite3 genarch.db'. This will start a sqlite shell session which supports full SQL queries on the open database. 

Sample queries: 

List tissues in database:
select tissue from results group by tissue ; 

List all genes for a given tissue: 
select gene from results where tissue = '<tissue_name>' ; 
(note: select gene can be changed to select * to pull all information rather than just gene name) 

List all genes with multiple entries (i.e. more than one ensid) for each individual tissue: 
select gene, tissue from results
group by gene, tissue, having count(ensid) > 1 ; 

View entire databse (warning: large output) 
Select * from results; 
