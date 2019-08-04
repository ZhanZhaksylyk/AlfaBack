<?php

include './db.php';

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$department_id = $obj['department_id'];

$sql = "insert into users(department_id) values('$department_id')";
$conn->query($sql);
$sql = 'select last_insert_id() as id';
$result = $conn->query($sql);


$MSG='Something went wrong';

if(mysqli_num_rows($result)>0){
	$MSG =$result->fetch_all();
}

$data=json_encode($MSG);
echo $data;

?>