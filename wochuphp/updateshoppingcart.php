<?php
@header("content-type:text/html;charset = 'utf-8'"); //�������ĵ�����utf-8���룻
@header("Access-Control-Allow-Origin:*");    //���������󿪷Ŷ˿ڣ�

//$var_connect = mysql_connect("localhost" , "root" , "root");
//mysql_select_db("1702", $var_connect);


$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//�����û���+�������ӵ�ָ����λ��
mysql_select_db("bdm27571847_db",$var_connect);//��ָ����λ���ҵ�ָ�������ݿ�

/*
$var_num = $_GET["num"];
$var_id = $_GET["id"];//��Ϊ���ݿ��е�˳��Ϊ id userId goodId num goodName ...�����Դ˴���idΪ����
$var_sql = "UPDATE wochu_usercart set num = '$var_num' where id='$var_id'";
*/
$var_num = $_GET["num"];
$var_userId = $_GET["userId"];
$var_goodId = $_GET["goodId"];
$var_sql = "UPDATE wochu_usercart set num = '$var_num' where userId='$var_userId' and goodId = '$var_goodId'";

mysql_query("set character set 'utf8'");
$var_result = mysql_query($var_sql);//�����ݿ���ִ��mysql���

$var_count = mysql_affected_rows();

if($var_count){
echo true;
}else{
    echo false;
}
?>