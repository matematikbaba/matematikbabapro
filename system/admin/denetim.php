<?php

include("../../ayar.php");
@session_start();
error_reporting("0");

if(($_POST["kadi"]==$kullanici) and ($_POST["sifre"]==$sifre))
{

$_SESSION["giris"] = "true";
$_SESSION["kullanici"] = $kullanici;
$_SESSION["sifre"] = $sifre;
echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=yonetim.php">';

}
else
{
echo '';
echo "Kullan�c� ad� veya �ifre Yanl��.<br>";
echo "<a href=index.php>Geri d�n</a>";

}

?>