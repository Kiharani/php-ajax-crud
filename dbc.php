<?php
$dbhost = 'localhost';
$dbname = 'webslesson';
$dbuser = 'root';
$password = '';
$dsn = 'mysql:host='.$dbhost.';dbname='.$dbname;
try{
	$dbc = new PDO($dsn, $dbuser, $password);
  $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  $dbc->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
}
catch (PDOException $e) {
  die("Error!: " . $e->getMessage() . "<br/>");
}

?>