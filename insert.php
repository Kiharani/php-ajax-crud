<?php
require_once 'dbc.php';
require_once 'function.php';

if(isset($_POST["operation"])){
	if($_POST["operation"] == "Add"){
		$img = '';
		if($_FILES["uimg"] != ''){
			$img = uploadImage();
		}else{
			$img = 'noimage.jpg';
		}

		$stmt = $dbc->prepare("INSERT INTO user (ufname, ulname, uimg) VALUES(:fname, :lname, :uimg)");
		$result = $stmt->execute(
			array(
				':fname' => $_POST["fname"],
				':lname' => $_POST["lname"],
				':uimg'  => $img
			)
		);
		if(!empty($result)){
			echo "Data Insert Success!";
		}
	}

	if($_POST["operation"] == "Edit"){
		$img = '';
		if($_FILES["uimg"] != ''){
			$img = uploadImage();
		}else{
			$img = $_POST["hidden_uimg"];
		}

		$stmt = $dbc->prepare("UPDATE user SET ufname = :fname, ulname = :lname, uimg = :uimg
			WHERE uid = :uid");
		$result = $stmt->execute(
			array(
				':fname' => $_POST["fname"],
				':lname' => $_POST["lname"],
				':uimg'  => $img,
				':uid'   => $_POST["uid"]
			)
		);
		if(!empty($result)){
			echo "Data Update Success! <br>";
			echo $_POST["hidden_uimg"];
		}
	}
}
?>
