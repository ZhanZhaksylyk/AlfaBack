<?php

include './db.php';

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$comment = $obj['comment'];
$rate = $obj['rate'];
$cycle=$obj['cycle'];
$user_id=NULL;
$department_id=NULL;
if(isset($obj['user_id'])){
	$user_id=$obj['user_id'];
	$department_id=$obj['department_id'];
}

$sql="insert into mood(mood_comment,mood_rate,mood_cycle,user_id,department_id) values('$comment','$rate','$cycle','$user_id','$department_id')";

$result = $conn->query($sql);

$MSG ="Something went wrong";

if($result){
	$MSG='Sucessfully saved the response' ;
}

$data = json_encode(array('data' => $MSG), JSON_FORCE_OBJECT);
echo $data;

?>