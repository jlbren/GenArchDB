#GenArchDB README
 * A sqlite relational database containing data from {insert blurb} 
 * Dependencies: 
	 * [sqlite3](https://www.sqlite.org/ )
	 * [R](https://www.r-project.org/) *
		 * *database recreation or importing tables only 

 * All data is stored in a single table with the following schema: 

 
```SQL
TABLE results ( 
	gene CHAR(50) NOT NULL, 
	ensid CHAR(50) NOT NULL,
	tissue CHAR(200) NOT NULL
	h2_ci CHAR(20) NOT NULL, 
	pve FLOAT(24) NOT NULL, 
	pge FLOAT(24) NOT NULL, 
	en_r2 FLOAT(24),
);
``` 

* Open the database in a sqlite shell with the command `sqlite3 genarch.db` 
* Queries may be run in the shell using standard [sqlite syntax](https://sqlite.org/lang.html) following the above schema. 
  * e.g. to select all information for a given a query would take the form `select * from results where gene = <mygene> ` 

*Several example queries and their results are demonstrated below: 
```SQL 
select tissue,h2,h2_ci from results where gene = "ERAP2";
``` 
> Adipose-Subcutaneous_TS|0.096222|0.040389-0.152055  
DGN-WB|0.613414|0.569366-0.657462  
Adipose-Subcutaneous_TW|0.592066|0.530174-0.653958  
Artery-Tibial_TS|1.0e-06|-0.02978-0.029782  
Heart-LeftVentricle_TS|0.145736|0.064515-0.226957  
Lung_TS|0.39762|0.320352-0.474888  
Muscle-Skeletal_TS|0.369814|0.297937-0.441691  
Nerve-Tibial_TS|0.126296|0.06295-0.189642  
Skin-SunExposed(Lowerleg)_TS|0.065333|0.020804-0.109862  
Thyroid_TS|0.13429|0.072686-0.195894  
WholeBlood_TS|0.076627|0.033259-0.119995  
Artery-Tibial_TW|0.687438|0.633437-0.741439  
Heart-LeftVentricle_TW|0.711796|0.648476-0.775116  
Lung_TW|0.626352|0.567267-0.685437  
Muscle-Skeletal_TW|0.592087|0.53605-0.648124 
Nerve-Tibial_TW|0.650311|0.590983-0.709639  
Skin-SunExposed(Lowerleg)_TW|0.58839|0.528017-0.648763  
Thyroid_TW|0.678729|0.623665-0.733793  
WholeBlood_TW|0.610465|0.555838-0.665092  
Cross-Tissue|0.722502|0.684618-0.760386  
  
* View all unique tissues: 
```SQL
select tissue from results group by tissue ; 
``` 
> 
Adipose-Subcutaneous_TS  
Adipose-Subcutaneous_TW  
Artery-Tibial_TS  
Artery-Tibial_TW  
DGN-WB  
Heart-LeftVentricle_TS  
Heart-LeftVentricle_TW  
Lung_TS  
Lung_TW  
Muscle-Skeletal_TS  
Muscle-Skeletal_TW  
Nerve-Tibial_TS  
Nerve-Tibial_TW  
Skin-SunExposed(Lowerleg)_TS 
Skin-SunExposed(Lowerleg)_TW  
Thyroid_TS  
Thyroid_TW  
WholeBlood_TS  
WholeBlood_TW  
Cross-Tissue
  
* Count the total number of genes in the database: 
```SQL 
select count(gene) from results; 
``` 
> 334423  
  



 
	 
