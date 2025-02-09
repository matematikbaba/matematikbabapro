<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Admin</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>


<div class="logo">
<img src='images/logogiris.png'>
</div>
</br>
</br>

<form class='form' action='denetim.php' method='POST'>
<div class='girisbg'></br>
<label>Kullanıcı Adı :</label> 
</br><input type='text' class='inputbg' name='kadi'></br>
<label>Şifre :</label> 
</br><input type='password' class='inputbg' name='sifre'></br></br>
<input type='submit' class='girisyap' value=""></br></br></br></br></br>
<?php
$ip = getenv("REMOTE_ADDR");
$hostadresi = gethostbyaddr($ip);
echo "<div class='ip'>İp Adresiniz : $ip </div></br></br>"; 
?>
</form>
</div>


</body>
</html>
