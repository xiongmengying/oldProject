<?php
@header("content-type:text/html;charset=UTF8");//���������ĵ��ı���Ϊutf8
@header("Access-Control-Allow-Origin: *");

//$var_connect = mysql_connect("localhost","root","root");
//mysql_select_db("1702",$var_connect);//��ָ����λ���ҵ�ָ�������ݿ�

$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//�����û���+�������ӵ�ָ����λ��
mysql_select_db("bdm27571847_db",$var_connect);//��ָ����λ���ҵ�ָ�������ݿ�

$var_username = $_GET["username"];
$var_pwd = $_GET["pwd"];





/*$var_sql = "insert into userinfo(username,pwd) values('$var_username','$var_pwd')";//���������ݿ���Ҫִ�е����
mysql_query("set character set 'utf8'");//����������ݿ����ñ���uft-8
$var_result = mysql_query($var_sql);//�����ݿ���ִ��mysql���


$var_count = mysql_affected_rows();//Ӱ�����������Ӱ�����: 1 ʱ��: 0.004s

if($var_count){
echo true;
}else{
echo fales;
}*/


$var_sql1 = "SELECT username from userinfo where username like '$var_username'";//���������ݿ���Ҫִ�е����
mysql_query("set character set 'utf8'");//����������ݿ����ñ���uft-8
$var_result = mysql_query($var_sql1);//�����ݿ���ִ��mysql���

$var_list = mysql_fetch_row($var_result);
$username = $var_list[0];
if(!$username){
    $var_sql2 = "insert into userinfo(username,pwd) values('$var_username','$var_pwd')";//���������ݿ���Ҫִ�е����
    mysql_query("set character set 'utf8'");//����������ݿ����ñ���uft-8
    $var_result = mysql_query($var_sql2);//�����ݿ���ִ��mysql���

    $var_count = mysql_affected_rows();//Ӱ�����������Ӱ�����: 1 ʱ��: 0.004s

    if($var_count){
    echo true;
    }else{
    echo fales;
    }
}else {
    echo 2;
}

?>