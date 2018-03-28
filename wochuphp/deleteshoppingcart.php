<?php
@header("content-type:text/html;charset:'utf8'");
@header("Access-Control-Allow-Origin:*");

//$var_connect = mysql_connect("localhost" , "root" , "root");
//mysql_select_db("1702",$var_connect);


$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//利用用户名+密码链接到指定的位置
mysql_select_db("bdm27571847_db",$var_connect);//在指定的位置找到指定的数据库

//$var_id = $_GET['id'];//id userId goodId num ...因为数据库中的顺序为 id userId goodId num goodName ...，所以此处的id为索引
//$my_sql = "delete from wochu_usercart where id = '$var_id'";


$var_userId = $_GET["userId"];
$var_goodId = $_GET["goodId"];
$my_sql = "delete from wochu_usercart where userId='$var_userId' and goodId = '$var_goodId'";

mysql_query("set character set 'utf8'");
$var_result = mysql_query($my_sql);
$var_count = mysql_affected_rows();
if($var_count){
	echo true;
}else{
	echo false;
}
?>