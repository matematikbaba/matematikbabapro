<?php
include("../../ayar.php");
ob_start();
@session_start();
 
if(!isset($_SESSION["giris"]))
{
echo '<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />';
echo "<font style='color:red; font-size:21px; font-family:Georgia;'><center><h4>Sen bilir kişimisin ! Sen uzmanmısın ! Kimsin lan Sen!<br></h4></font>";
 
}
else
 
{
include("../../baglan.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Site Ayarları</title>
	<style type="text/css">
	body { background-image: url("images/bg.png"); color:white; font-size:16px; margin-left:15px; font-family:Trebuchet MS; }
	</style>
</head>
<body>
<form action="ayarlard.php" method="POST">
	Kullanıcı Adı : </br><input style="background-color:#870f66; border:3px solid; width:260px; height:23px; " name="kadi"></br>
	Kullanıcı Şifresi : </br><input style="background-color:#870f66; border:3px solid; width:260px; height:23px; " name="adminpass"></br>
	Site Başlığı : </br><input type="text" style="background-color:#870f66; border:3px solid; width:260px; height:23px; " name="baslik"></br>
    Site Açıklaması : </br><input type="text" style="background-color:#870f66; border:3px solid; width:260px; height:23px; " name="aciklama"></br>
	Site Etiketleri : </br><input type="text" style="background-color:#870f66; border:3px solid; width:260px; height:23px; " name="etiket"></br>
  	Copyright Yazısı : </br><input type="text" style="background-color:#870f66; border:3px solid; width:260px; height:23px; " name="copyright"></br>
    Hakkımızda Sayfa Yazısı : </br><textarea style="background-color:#870f66; border:3px solid; width:260px; height:123px; " name="hakkimizda"></textarea></br>

	<input style="background-color:orange; margin-top:4px; color:white; border:2px solid;color:black;" type="submit" value="Bilgileri Güncelle">
	<input style="background-color:orange; margin-top:4px; color:white; border:2px solid;color:black;" type="reset" value="Formu Temizle.">
	
	</form>
</body>
</html>
<?php
}

?>