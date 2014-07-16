<?php
include('functions.php');
$conn=mysql_connect("localhost","root","");
mysql_selectdb("studies",$conn);
$json='';
if(empty($_GET['gid'])){
	$json = array("status" => 0, "msg" => "Group ID not define");
}
else
{
	$result=array();
	$uid=isset($_GET['gid'])?mysql_real_escape_string(test_input($_GET['gid'])):"1";
	$query=mysql_query("select gid,gname from groups where gid=$uid;");
	if($r=mysql_fetch_array($query)){
		extract($r);
		$result[]=array("id"=>$gid,"gname"=>$gname);
		$json=array("status"=>1,"info"=>$result);
	}
	elseif(empty($result)){
			$json=array("status" => 0, "msg" => "Group ID not present in the table");
		}
}
@mysql_close($conn);
header('Content-Type: application/json');

echo json_encode($json);
?>