<?php
@header('content-type:text/html;charset=UTF8');//���������ĵ��ı���Ϊutf8
@header("Access-Control-Allow-Origin: * ");//����������⣬�˿ڶ����е����󿪷�Ȩ�ޣ�

//$var_connect = mysql_connect("localHost","root","root");
//mysql_select_db("1702",$var_connect);

$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//�����û���+�������ӵ�ָ����λ��
mysql_select_db("bdm27571847_db",$var_connect);//��ָ����λ���ҵ�ָ�������ݿ�

$var_userId= $_GET["userId"];
$var_sql = "select * from wochu_usercart where userId = '$var_userId'";//����userid��ѯ���е���Ϣ��

mysql_query("set character set 'utf8'");//����������utf8 ���룬
$var_result = mysql_query($var_sql);
$var_list = array();
while ($var_array = mysql_fetch_row($var_result)) {//���н������ݼ�����Դ��//��ÿһ�е����ݷŵ�һ������ȥ�� 
    # code...
    $var_list[]=$var_array;  //�ٽ�����ŵ����涨��ļ�����ȥ
}
echo  json_encode($var_list);
?>