<?php
require_once 'dbc.php';
require_once 'function.php';

$query = '';
$op = array();

$query .= 'SELECT * FROM user ';
if(isset($_POST["search"]["value"])){
  $query .= 'WHERE ufname LIKE "%'.$_POST["search"]["value"].'%" ';
  $query .= 'OR ulname LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"])){
  $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else{
  $query .= 'ORDER BY uid DESC ';
}
if($_POST["length"] != -1){
  $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$stmt = $dbc->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();

$data = array();
$flrows = $stmt->rowCount();

foreach($result as $user){
	$img = '';
	if($user->uimg != ''){
		$img = '<img src="./uploads/'.$user->uimg.'" class="rounded-circle" width="50" height="35">';
	}else{
		$img = '<img src="./uploads/noimage.jpg" class="rounded-circle" width="50" height="35">';
	}

	$sub_array = array();
	$sub_array[] = $img;
	$sub_array[] = $user->ufname;
	$sub_array[] = $user->ulname;
	$sub_array[] = '<button type="button" name="update" id="'.$user->uid.'" class="btn btn-outline-success btn-sm update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$user->uid.'" class="btn btn-outline-danger btn-sm delete">Delete</button>';

	$data[] = $sub_array;
}

$op = array(
	"draw"            => intval($_POST["draw"]),
	"recordsTotal"    => $flrows,
	"recordsFiltered" => getAll(),
	"data"            => $data

);

echo json_encode($op);
?>
