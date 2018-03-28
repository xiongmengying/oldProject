<?php
@header("content-type:text/html;charset:'utf8'");
@header("Access-Control-Allow-Origin:*");

//$var_connect = mysql_connect("localhost" , "root" , "root");
//mysql_select_db("1702",$var_connect);


$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//利用用户名+密码链接到指定的位置
mysql_select_db("bdm27571847_db",$var_connect);//在指定的位置找到指定的数据库

$var_id = $_GET['id'];//id userId goodId num ...
//$var_id = 3 ;

$my_sql = "delete from usercart where id = $var_id";
mysql_query("set character set 'utf8'");
$var_result = mysql_query($my_sql);
$var_count = mysql_affected_rows();
if($var_count){
	echo true;
}else{
	echo false;
}
?>