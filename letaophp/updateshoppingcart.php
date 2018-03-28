<?php
@header("content-type:text/html;charset = 'utf-8'"); //对整个文档设置utf-8编码；
@header("Access-Control-Allow-Origin:*");    //对所有需求开放端口；

//$var_connect = mysql_connect("localhost" , "root" , "root");
//mysql_select_db("1702", $var_connect);


$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//利用用户名+密码链接到指定的位置
mysql_select_db("bdm27571847_db",$var_connect);//在指定的位置找到指定的数据库

$var_num = $_GET["num"];
$var_id = $_GET["id"];

$var_sql = "UPDATE usercart set num = $var_num where id=$var_id";
mysql_query("set character set 'utf8'");
$var_result = mysql_query($var_sql);//在数据库中执行mysql语句

$var_count = mysql_affected_rows();

if($var_count){
echo true;
}else{
    echo false;
}
?>