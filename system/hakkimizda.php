<?php 
include("../baglan.php"); 
include("../ayar.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Hakkımızda</title>
	<link rel="stylesheet" href="hakkimizda.css" />
	<link rel="stylesheet" href="stil.css"/>
</head>
<body>

<div class="logo"><a class='logocuk'><img src='resim/logo.png' alt='logo'></a></div>
	<ul id="minitabs">
    <li><a href="../index.php">Ana Sayfa</a></li>
    <li><a href="../deftereyaz">Deftere Yaz</a></li>
    <li><a id="current" href="hakkimizda.php">Hakkımızda</a></li>

</ul>
<hr>
</br>

<?php
echo '<div class="hkbg"> <div class="bas"></br>Hakkımızda!</div> <a href="#"></div></a> <div class="yazimsi">'.$hakkimizda.'</div>';
?>
</br></br>
<hr> 
<?php
echo '<div class="copyright">'.$copyright.'</div>';
?>
<hr> 
</body> 
</html>
