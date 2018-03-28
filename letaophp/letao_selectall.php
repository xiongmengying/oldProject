<?php
@header("content-type:text/html;charset=UTF8");//
@header("Access-Control-Allow-Origin: *");

//$var_connect = mysql_connect("localhost","root","root");
//mysql_select_db("1702",$var_connect);//在指定的位置找到指定的数据库



//$var_connect = mysql_connect("bdm278630530.my3w.com","bdm278630530","fankanghenku3991");//利用用户名+密码链接到指定的位置
//mysql_select_db("bdm278630530_db",$var_connect);//在指定的位置找到指定的数据库


$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//利用用户名+密码链接到指定的位置
mysql_select_db("bdm27571847_db",$var_connect);//在指定的位置找到指定的数据库


$var_sql = "select * from productintroduce";//设置在数据库中要执行的语句


mysql_query("set character set 'utf8'");//设置针对数据库设置编码uft-8
$var_result = mysql_query($var_sql);//在数据库中执行mysql语句

$var_list = array();
while($var_array = mysql_fetch_row($var_result)){
    $var_list[] = $var_array;
}
echo json_encode($var_list);
?>