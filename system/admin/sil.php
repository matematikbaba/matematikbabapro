<?php
include("../../ayar.php");
@session_start();
 
if(!isset($_SESSION["giris"]))
{
 
echo "Bu sayfayý görüntüleme yetkiniz yoktur.<br>";
echo "<a href=index.php>Giriþ sayfasý</a>";
 
}
else
 
{
?>
<style type="text/css">body { background-image: url("images/bg.png"); }</style>
<?php

include("../../baglan.php");

$id=$_REQUEST["id"];
mysql_query("DELETE FROM ziyaretcidefteri WHERE id='$id'");
echo '<font style="color:green;"><center><h3><font style="white";>Mesaj Silindi.</font>';
echo '<meta http-equiv="refresh" content="3;url=onaybekleyen.php">';




}
?>

