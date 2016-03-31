<?php


if (isset($_GET['addGene']))
{
  include 'addGene.html.php';
  exit();
}

try
{

  $pdo = new PDO('mysql:host=localhost;dbname=genarchdb', 'jbrenner', 'giraffe721');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server.';
  include 'error.html.php';
  exit();
}

if (isset($_POST['gname']))
{
  try
  {
    $sql = 'INSERT INTO genes SET
        GeneName= :GeneName,
        ENSID = :ENSID';
    $s = $pdo->prepare($sql);
    $s->bindValue(':GeneName', $_POST['gname']);
    $s->bindValue(':ENSID', $_POST['ENSID']);
    
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error adding submitted gene: ' . $e->getMessage();
    include 'error.html.php';
	echo $error; 
    exit();
  }

  header('Location: .');
  include 'displaydb.html.php';

  exit();
}

try
{
  $sql = 'SELECT * FROM genes';
  $result = $pdo->query($sql);
}
catch (PDOException $e)
{
  $error = 'Error fetching genes: ' . $e->getMessage();
  include 'error.html.php';
  echo $error; 
}

if (isset($_GET['deleteGene']))
{
  echo "set";
  try
  {
    $sql = 'DELETE FROM genes WHERE GeneName = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting gene: ' . $e->getMessage();
	echo $error;
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  include 'displaydb.html.php';

}


include 'displaydb.html.php';
