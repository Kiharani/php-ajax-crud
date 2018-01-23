<?php
function getAll(){
	require 'dbc.php';
	$stmt = $dbc->prepare("SELECT * FROM user");
	$stmt->execute();

	return $stmt->rowCount();
}

function getUser($id){
	require 'dbc.php';
	$stmt = $dbc->prepare("SELECT * FROM user WHERE uid = :uid");
	$stmt->execute(array(':uid' => $id));
	return $stmt->fetch();
}

function uploadImage(){
	if(isset($_FILES['uimg'])){
		$ext = explode(".", $_FILES['uimg']['name']);
		$new_name = date('d-m-Y-').rand(1001, 9999).".".$ext[1];
		$destination = './uploads/'.$new_name;
		move_uploaded_file($_FILES['uimg']['tmp_name'], $destination);
	}else{
		$new_name = 'noimage,jpg';
	}
	return $new_name;
}