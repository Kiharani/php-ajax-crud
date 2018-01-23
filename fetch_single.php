<?php
require_once 'dbc.php';
require_once 'function.php';

if(isset($_POST["uid"])){
	$op = array();
	$stmt = $dbc->prepare("SELECT * FROM user WHERE uid = :uid LIMIT 1");
	$stmt->execute(array(':uid' => $_POST["uid"]));
	$user = $stmt->fetch();
	$op['fname'] = $user->ufname;
	$op['lname'] = $user->ulname;

	if($user->uimg != ''){
		$op['uimg'] = '
		  <img src="./uploads/'.$user->uimg.'" class="rounded-circle" width="50" height="35">
		  <input type="hidden" name="hidden_uimg" value="'.$user->uimg.'">
		';
	}else{
		$op['uimg'] = '<input type="hidden" name="hidden_uimg" value="">';
	}
	echo json_encode($op);
}

?>