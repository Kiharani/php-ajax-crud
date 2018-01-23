<?php
require_once 'dbc.php';
require_once 'function.php';
if(isset($_POST["uid"])){
	$user = getUser($_POST["uid"]);
	$file = "./uploads/".$user->uimg;
  unlink($file);
	$stmt = $dbc->prepare("DELETE FROM user WHERE uid = :uid");
	$result = $stmt->execute(array(':uid' => $_POST["uid"]));
	echo "User Delete Successful!";
}