<?php
@header('content-type:text/html;charset=UTF8');  //�ֶ�php���б��룻
@header("Access-Control-Allow-Origin:*");        //���Ŷ˿ڷ���Ȩ��

//$var_connect = mysql_connect("localhost","root","root"); //�����û��������룬���ӵ�ָ��λ�ã� 
//mysql_select_db("1702",$var_connect);//�ڷ������ҵ����ݿ⣻

$var_connect = mysql_connect("bdm27571847.my3w.com","bdm27571847","bdm27571847");//�����û���+�������ӵ�ָ����λ��
mysql_select_db("bdm27571847_db",$var_connect);//��ָ����λ���ҵ�ָ�������ݿ�

$var_userId = $_GET['userId'];
$var_goodId = $_GET['goodId'];
$var_num = $_GET['num'];
$var_goodName = $_GET['goodName'];
$var_goodPrice = $_GET['goodPrice'];
$var_goodSrc = $_GET['goodSrc'];



/*$var_userId = 1;
$var_goodId = 1;
$var_num = 1;
$var_goodName ="Red dream lover Ůʽ �¿���Ƥ�¸���Ьŷ�����ˮ̨�߸��ļ�ˮ��������ЬCZ708";
$var_goodPrice = 298;
$var_goodSrc = "CZ708_017_1.JPG";*/

//�ж������Ʒ�Ѿ���������ԭ�������ϣ��������ӣ���������ڣ���Ҫ�������ݿ⣬�����Ʒ��Ϣ��
if(goodIsexistByUserId($var_userId,$var_goodId)){//����������

$u_sql= "update usercart set num =num+1 where userId =$var_userId  and goodId = $var_goodId";
mysql_query("set character set 'utf8'");//����������ݿ����ñ���uft-8
$var_result = mysql_query($u_sql);//�����ݿ���ִ��mysql���
$var_count = mysql_affected_rows();

if($var_count){
echo true;
}else{
    echo false;
}

}else{
$var_mysql = "INSERT into usercart(userId,goodId,num,goodName,goodPrice,goodSrc)VALUES($var_userId,$var_goodId,$var_num,'$var_goodName',$var_goodPrice,'$var_goodSrc')";
mysql_query("set character set 'utf8'");//����������ݿ����ñ���uft-8
$var_result = mysql_query($var_mysql);
$var_count = mysql_affected_rows();
if($var_count){
echo true;
}else{
    echo false;
}
}


//ͨ��userId�ж���Ʒ�Ƿ��Ѿ����ڣ�
function  goodIsexistByUserId($userid,$goodid){ //�жϸ��û�����Ʒ�Ƿ���ڹ��ﳵ��
$var_sql = "SELECT count(*) from usercart where userId =$userid and goodId =$goodid";
mysql_query("set character set 'utf8'");//����������ݿ����ñ���uft-8
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