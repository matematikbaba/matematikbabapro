<?php
include("../../ayar.php");
@session_start();
if(!isset($_SESSION["giris"]))
{
echo '<meta http-equiv="refresh" content="3;url=index.php">'; 
echo '<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />';
echo "Bu sayfayý görüntüleme yetkiniz yoktur.<br>";
echo "<a href=index.php>Giriþ sayfasý</a>";
echo '';
 
}
else
 
{
?>
<?php

session_destroy();
echo '<meta http-equiv="refresh" content="1;url=index.php">'; 
echo "<center><h3>Cikis Yapildi.</h3>";
echo '';

}

?>