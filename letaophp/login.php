<?php
@header("content-type:text/html;charset=UTF8");//设置整个文档的编码为utf8
@header("Access-Control-Allow-Origin: *");//后台解决跨域问题

//$var_connect = mysql_connect("localhost","root","root");
//mysql_select_db("1702",$var_connect);//在指定的位置找到指定的数据库

$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//利用用户名+密码链接到指定的位置
mysql_select_db("bdm27571847_db",$var_connect);//在指定的位置找到指定的数据库

$var_username = $_GET["username"];
$var_pwd = $_GET["pwd"];

//$var_username = "xiong";
//$var_pwd = "12345";



$var_sql = "select pwd,id from userinfo where username = '$var_username'";//设置在数据库中要执行的语句
mysql_query("set character set 'utf8'");//设置针对数据库设置编码uft-8
$var_result = mysql_query($var_sql);//在数据库中执行mysql语句

//$pwd = $var_list[0];
$list= mysql_fetch_row($var_result);
$pwd =  $list[0];

if (!$pwd) {
    echo 0;
}else if($pwd == $var_pwd){
    //echo 1;
    echo "1_".$list[1];
}else{
    echo 2;
}

?>