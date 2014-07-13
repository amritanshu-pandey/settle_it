<?php
$conn=mysql_connect("localhost","root","");
mysql_selectdb("studies",$conn);
$name=mysql_real_escape_string($_GET['name']);
$gender=mysql_real_escape_string($_GET['gender']);
$email=mysql_real_escape_string($_GET['email']);
$mobile=mysql_real_escape_string($_GET['mobile']);
echo "Name : $name<br>Gender : $gender<br>";
$query=mysql_query("insert into users(id,name,gender,email,mobile) values('$name','$gender','$email','$mobile');");
if($query){
	echo $query;
	echo "Insertion succesfull";
}
else{
	echo "Insertion Unsuccesfull";
}
?>