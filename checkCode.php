<?php

include './db.php';

$json = file_get_contents('php://input');
$obj = json_decode($json,true);

$code = $obj['code'];

$sql = "select * from department where department_code like '$code'";
$result = $conn->query($sql);

$MSG=false;
$dataj = array();

if(mysqli_num_rows($result)>0){
  	while ( $row = $result->fetch_assoc())  {
	$dataj[]=$row;
  }
  $MSG=$dataj;
}

$data=json_encode($MSG);
echo $data;

?>