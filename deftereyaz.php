<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Mesaj</title>
	<link rel="stylesheet" href="images/deftereyaz.css" />

</head>
<body>
<div class="logo"><a class='logocuk'><img src='system/resim/logo.png' alt='logo'></a></div>
	<ul id="minitabs">
    <li><a href="index.php">Ana Sayfa</a></li>
    <li><a id="current" ref="deftereyaz">Deftere Yaz</a></li>
    <li><a href="system/hakkimizda.php">Hakkımızda</a></li>

</ul>
<hr>
</br>

    <form style="margin-left:350px;" action='system/ekle.php' method='POST'>
	<label>Nick</label> :
	</br><input class='inputnick' type='text' name='nick'></br>
	<label>Email</label> :
	</br><input class='inputemail' type='text' name='email'></br>
	<label>Mesaj</label> :
	</br><textarea class='mesaj' type='text' name='mesaj'></textarea></br><div class='gir'>Kodu Giriniz.</div>
        <img src="kod.php" alt="guvenlik" style="margin-left:95px;border: 1px solid #999999;"></br><input class='guvenlebana' type="text" name="security"/>
	<div class='cinsiyet'> Cinsiyetiniz</div>
<ul class='avatar'>
	<input  type="radio" name="avatar" value="resim/erkek.png"/>Erkek
	<input  type="radio" name="avatar" value="resim/bayan.png"/>Bayan
     </ul>
	<button type="submit" class='butonla' value='Gönder'>Gönder</button>
	<button type="reset" class='butonla' value='Temizle'>Temizle</button>
	</form>
	</br></br>
<hr>
<?php
include("ayar.php");
echo '<div class="copyright">'.$copyright.'</div>';
?>
<hr> 
</body> 
</html>
