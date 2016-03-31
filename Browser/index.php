<!DOCTYPE html>
<html>
<title>GenArchDBWelcome</title>

<body>
  
 <form method="post" action="search.php" >
 <div><label for = "type">Query Type:  
		<select name="type">
				<option value="<?php echo "Gene"?>"> <?php echo "Gene"?>
				</option>
				
				<option value= "<?php echo "ENSID" ?>"> <?php echo "ENSID"?>
				</option>
				
				<option value= "<?php echo "Tissue" ?>"> <?php echo "Tissue"?>
				</option>
				<option value= "<?php echo "H2" ?>"> <?php echo "Min. Global h2"?>
				</option>
	
			
		</select>
		</label>
		<input type="text" name="query" /><br>
		<!--<input type="checkbox" name="ucsc" value="ucsc"> Include UCSC Tracks<br> -->

	  </div>

<input type="submit"/>
</form>
<form action="updatedb.html.php">
    <input type="submit" value="Update">
</form>


</body>
</html>
