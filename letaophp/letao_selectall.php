<?php
@header("content-type:text/html;charset=UTF8");//
@header("Access-Control-Allow-Origin: *");

//$var_connect = mysql_connect("localhost","root","root");
//mysql_select_db("1702",$var_connect);//��ָ����λ���ҵ�ָ�������ݿ�



//$var_connect = mysql_connect("bdm278630530.my3w.com","bdm278630530","fankanghenku3991");//�����û���+�������ӵ�ָ����λ��
//mysql_select_db("bdm278630530_db",$var_connect);//��ָ����λ���ҵ�ָ�������ݿ�


$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//�����û���+�������ӵ�ָ����λ��
mysql_select_db("bdm27571847_db",$var_connect);//��ָ����λ���ҵ�ָ�������ݿ�


$var_sql = "select * from productintroduce";//���������ݿ���Ҫִ�е����


mysql_query("set character set 'utf8'");//����������ݿ����ñ���uft-8
$var_result = mysql_query($var_sql);//�����ݿ���ִ��mysql���

$var_list = array();
while($var_array = mysql_fetch_row($var_result)){
    $var_list[] = $var_array;
}
echo json_encode($var_list);
?>