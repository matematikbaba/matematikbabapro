<?php
include("../../ayar.php");
@session_start();
 
if(!isset($_SESSION["giris"]))
{
 
echo "<font style='color:red; font-size:21px; font-family:Georgia;'><center><h4>Sen bilir kişimisin ! Sen uzmanmısın ! Kimsin lan Sen!<br></h4></font>";
 
}
else
 
{
?>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<?php
include("../../baglan.php");

$id=$_REQUEST["id"];
mysql_query("update ziyaretcidefteri set onay=1 where id='$id'");
echo '<center><font color="green">Mesaj Onaylandi.</font>';
echo '<meta http-equiv="refresh" content="3;url=onaybekleyen.php">';




}
?>

