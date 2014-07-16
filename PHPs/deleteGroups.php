<?php
$conn=mysql_connect("localhost","root","");
mysql_selectdb("studies",$conn);
$id=mysql_real_escape_string($_GET['gid']);
if(empty($id)){
	$json = array("status" => 0, "msg" => "No user id provided");
}
else{
$query=mysql_query("delete from groups where gid=$id;");
if($query && mysql_affected_rows()>0){
	$json=array("status" => 1, "msg" => mysql_affected_rows()." rows deleted");
}
else{
	$json=array("status" => 0, "msg" => mysql_affected_rows()." row deleted");
}

}
@mysql_close($conn);
header('Content-Type: application/json');
echo json_encode($json);

?>