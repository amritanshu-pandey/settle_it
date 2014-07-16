<?php
include('functions.php');
$conn=mysql_connect("localhost","root","");
mysql_selectdb("studies",$conn);
$name=mysql_real_escape_string(test_input($_GET['name']));
$gender=mysql_real_escape_string(test_input($_GET['gender']));
$email=mysql_real_escape_string(test_input($_GET['email']));
$mobile=mysql_real_escape_string(test_input($_GET['mobile']));
$query=mysql_query("insert into users(name,gender,email,mobile) values('$name','$gender','$email','$mobile');");
if($query){
	$json=array('status'=>1,'info'=>$query);
}
else{
	$json=array("status" => 0, "msg" => "Insertion Unsuccesfull");
}
@mysql_close($conn);
header('Content-Type: application/json');
echo json_encode($json);
?>