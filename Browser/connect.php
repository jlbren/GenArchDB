<?php
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

echo 'Database connection established.';
include 'search.php';
exit();
?>
