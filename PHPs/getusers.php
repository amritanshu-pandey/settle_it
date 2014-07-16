<?php
include('functions.php');
$conn=mysql_connect("localhost","root","");
mysql_selectdb("studies",$conn);
$json='';
if(empty($_GET['id'])){
	$json = array("status" => 0, "msg" => "User ID not define");
}
else
{
	$result=array();
	$uid=isset($_GET['id'])?mysql_real_escape_string(test_input($_GET['id'])):"";
	$query=mysql_query("select id,name,gender,email,mobile from users where id='$uid';");
	if($r=mysql_fetch_array($query)){
		extract($r);
		$result[]=array("name"=>$name,"email"=>$email,"gender"=>$gender,"mobile"=>$mobile);
		$json=array("status"=>1,"info"=>$result);
	}
	elseif(empty($result)){
			$json=array("status" => 0, "msg" => "User ID not present in the table");
		}
}
@mysql_close($conn);
header('Content-Type: application/json');

echo json_encode($json);
?>