<?php
@header('content-type:text/html;charset=UTF8');//设置整个文档的编码为utf8
@header("Access-Control-Allow-Origin: * ");//解决跨域问题，端口对所有的请求开放权限；

//$var_connect = mysql_connect("localHost","root","root");
//mysql_select_db("1702",$var_connect);

$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//利用用户名+密码链接到指定的位置
mysql_select_db("bdm27571847_db",$var_connect);//在指定的位置找到指定的数据库

$var_userId= $_GET["userId"];
$var_sql = "select * from wochu_usercart where userId = '$var_userId'";//根据userid查询所有的信息，

mysql_query("set character set 'utf8'");//对数据设置utf8 编码，
$var_result = mysql_query($var_sql);
$var_list = array();
while ($var_array = mysql_fetch_row($var_result)) {//逐行解析数据集（资源）//将每一行的数据放到一个集合去中 
    # code...
    $var_list[]=$var_array;  //再将结果放到上面定义的集合中去
}
echo  json_encode($var_list);
?>