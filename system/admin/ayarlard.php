<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<style type="text/css">
	body { background-image: url("images/bg.png"); color:white; font-size:16px; margin-left:15px; font-family:Trebuchet MS; }
	</style>
</head>
<body>
<?php
include("../../ayar.php");
@session_start();
 
if(!isset($_SESSION["giris"]))
{
 
echo "Sen bilir kişimisin? Sen Uzmanmısın? Kimsin lan sen!<br>";
 
}
else
 
{
?>
<?php
error_reporting("0");
$baslik = $_POST["baslik"];
$aciklama = $_POST["aciklama"];
$etiketler = $_POST["etiket"];
$copyright = $_POST["copyright"];
$hakkimizda = $_POST["hakkimizda"];
$adminpass = $_POST["adminpass"];
$kullanici = $_POST["kadi"];
  

echo '<h5>Anasayfadaki ayar.php dosyasını açınız ve şu kodları yazınız : </h5>';
?>
<textarea style="background-color:#bababa;margin-top:-16px;width:990px; height:500px;">
$kullanici = '<?php echo $kullanici; ?>';
$sifre = '<?php echo $adminpass; ?>';
$baslik = '<?php echo $baslik; ?>';
$aciklama = '<?php echo $aciklama; ?>';
$etiketler = '<?php echo $etiketler; ?>';
$copyright = '<?php echo $copyright; ?>';
$hakkimizda = '<?php echo $hakkimizda; ?>';
</textarea>
</body>
</html>
<?php } ?>