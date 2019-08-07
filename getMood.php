<?php

include './db.php';

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$user_id = $obj['user_id'];
$cycle=$obj['cycle'];
$day=$obj['day'];

$sql = "select mood_rate as mood, mood_comment as comment,time(mood_created) as time, DATE(mood_created) as date from mood where user_id = '$user_id' and mood_cycle = '$cycle' and DATE(mood_created)=curdate()-'$day'";
$result = $conn->query($sql);
$data = array();

while ( $row = $result->fetch_assoc())  {
	$data[]=$row;
}
$data=json_encode($data);
echo $data;
?>