<?php
include('functions.php');
$conn=mysql_connect("localhost","root","");
mysql_selectdb("studies",$conn);
$gname=mysql_real_escape_string(test_input($_GET['gname']));
$query=mysql_query("insert into groups(gname) values('$gname');");
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