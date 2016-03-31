<!DOCTYPE html>
<html lang="en">
<title>GenArchDBResults</title>
  <body>
    <p>
 <?php
$type = $_REQUEST["type"]; 
$query = $_REQUEST["query"]; 
if (!(isset($query) && isset($type))){
	$error = "Please enter a valid query!" ; 
	include 'error.html.php'; 
	
}



if (isset($query) && isset($type)){
	try
	{
	  $pdo = new PDO('mysql:host=localhost;dbname=genarchdb', 'jbrenner', 'giraffe721');
	  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  $pdo->exec('SET NAMES "utf8"');
	}
	catch (PDOException $e)
	{
	  $output = 'Unable to connect to the database server:'.$e;
	  include 'index.php';
	  exit();
	}
	if ($type=="Gene"){
		
		try
		{
			$sql = sprintf("SELECT * FROM results a, ucsc b  WHERE a.GeneName = '%s' AND a.GeneName = b.GeneName ",
					 $query);
			$result=$pdo->query($sql);
			$sizeResult = $result->columnCount();
			include 'results.html.php';
		}
		catch (PDOException $e)
		{
		  $error = 'Error finding results: ' . $e->getMessage();
		  #include 'error.html.php'; //todo add
		  echo "error";
		  exit();
		}
	}
	else if ($type=="Tissue"){
		
		try
		{
			$sql = sprintf("SELECT * FROM results a, ucsc b WHERE a.TissueName = '%s' AND a.GeneName = b.GeneName",
					 $query);
			$result=$pdo->query($sql);
			
			$sizeResult = $result->columnCount();
			include 'results.html.php';
		}
		catch (PDOException $e)
		{
		  $error = 'Error finding results: ' . $e->getMessage();
		  include 'error.html.php'; //todo add
		  echo "error";
		  exit();
		}
	}
	else if ($type=="ENSID"){
		
		
		try
		{
			$sql = sprintf("SELECT * FROM results a, ucsc b WHERE a.GeneName = (SELECT GeneName FROM genes WHERE ENSID = '%s' ) AND b.GeneName =a.GeneName ",
					 $query);
			$result=$pdo->query($sql);
			$sizeResult = $result->columnCount();
			include 'results.html.php';
		}
		catch (PDOException $e)
		{
		  $error = 'Error finding results: ' . $e->getMessage();
		  #include 'error.html.php'; //todo add
		  echo "errorENSID";
		  exit();
		}
	}

}
else echo "nay";
?>