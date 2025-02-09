<?php include("ayar.php"); ?>
<?php
error_reporting("0");


$mysqlkadi = 'root'; // mysql veritabanı kullanıcı adınız
$mysqllocal = 'localhost'; // sunucu adresi
$vtadi = 'zd'; // mysql veritabanı adınız
$mysqlpass = ''; // mysql şifreniz


$baglan = mysql_connect($mysqllocal,$mysqlkadi,$mysqlpass) or die (mysql_error());
$db = mysql_select_db($vtadi, $baglan) or die (mysql_error());
 
?>