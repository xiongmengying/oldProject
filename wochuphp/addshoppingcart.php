<?php
@header('content-type:text/html;charset=UTF8');  //现对php进行编码；
@header("Access-Control-Allow-Origin:*");        //开放端口访问权限

//$var_connect = mysql_connect("localhost","root","root"); //利用用户名，密码，链接到指定位置； 
//mysql_select_db("1702",$var_connect);//在服务器找到数据库；

$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//利用用户名+密码链接到指定的位置
mysql_select_db("bdm27571847_db",$var_connect);//在指定的位置找到指定的数据库

$var_userId = $_GET['userId'];
$var_goodId = $_GET['goodId'];
$var_num = $_GET['num'];
$var_goodName = $_GET['goodName'];
$var_goodPrice = $_GET['goodPrice'];
$var_oldPrice = $_GET['oldPrice'];
$var_goodSrc = $_GET['goodSrc'];



/*$var_userId = 1;
$var_goodId = 1;
$var_num = 1;
$var_goodName ="Red dream lover 女式 新款真皮坡跟凉鞋欧美风防水台高跟夏季水钻休闲凉鞋CZ708";
$var_goodPrice = 298;
$var_goodSrc = "CZ708_017_1.JPG";*/

//判断如果商品已经存在则在原来基础上，数量增加，如果不存在，就要更新数据库，添加商品信息。
if(goodIsexistByUserId($var_userId,$var_goodId)){//如果有则更新

$u_sql= "update wochu_usercart set num =num+1 where userId ='$var_userId'  and goodId = '$var_goodId'";
//$u_sql= "update wochu_usercart set num =num+1 where strcmp(userId,'$var_userId')  and strcmp(goodId,'$var_goodId')";

mysql_query("set character set 'utf8'");//设置针对数据库设置编码uft-8
$var_result = mysql_query($u_sql);//在数据库中执行mysql语句
$var_count = mysql_affected_rows();

if($var_count){
echo 1;
}else{
    echo 2;
}

}else{
$var_mysql = "INSERT into wochu_usercart (userId,goodId,num,goodName,goodPrice,oldPrice,goodSrc)VALUES('$var_userId','$var_goodId','$var_num','$var_goodName','$var_goodPrice','$var_oldPrice','$var_goodSrc')";

mysql_query("set character set 'utf8'");//设置针对数据库设置编码uft-8
$var_result = mysql_query($var_mysql);
$var_count = mysql_affected_rows();
if($var_count){
echo 3;
}else{
    echo 2;
}
}


//通过userId判断商品是否已经存在：
function  goodIsexistByUserId($userid,$goodid){ //判断该用户的商品是否存在购物车中
$var_sql = "SELECT count(*) from wochu_usercart where userId ='$userid' and goodId ='$goodid'";
mysql_query("set character set 'utf8'");//设置针对数据库设置编码uft-8
$var_result = mysql_query($var_sql);
$list= mysql_fetch_row($var_result);
$count =$list[0];
if ($count) {
   return true;
}else{
return false;
}
}



?>