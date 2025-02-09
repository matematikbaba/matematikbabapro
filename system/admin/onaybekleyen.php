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

<?php include("../../baglan.php"); ?>
<head>

<title>Onay Bekleyen Mesajlar</title>

<style type="text/css">
.bekle {
font-size:24px;
font-family:Comic sans ms;
color:red;
}
.silonayla {
font-size:19px;
margin-right:32px;
margin-bottom: 5px;

}
body { * margin:0; background-color:#d2d6d1; }
a {text-decoration:none;color:red;}
label { font-size:20px;color:white;font-family:georgia; }
input { border:2px solid; }
textarea { border:2px solid; }
</style>


</head>


<?php
echo '<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />';
echo '<center><div class="bekle">Onay Bekleyen Mesajlar</div></br>';


$gosterim=6;
$sayfa=@$_GET['sayfa'];   
if(empty($sayfa) || !is_numeric($sayfa)){$sayfa=1;}

$k_sayisi=mysql_num_rows(mysql_query("Select * From ziyaretcidefteri where onay=1"));

$s_sayisi=ceil($k_sayisi/$gosterim);

$ilk_kayit=($sayfa*$gosterim)-$gosterim;
 
$al=mysql_query("Select * From ziyaretcidefteri where onay=0 Order By id desc Limit

$ilk_kayit,$gosterim");
echo '<form action="onayla.php" method="post">';
while($yazdir=mysql_fetch_array($al)){

    extract($yazdir);
    echo '<hr></br>';
    echo "<label>Yazan : </label><br><input type='text' value='$nick'></br>";
    echo "<label>E-Mail : </label><br><input type='text' value='$email'></br>";
    echo "<label>Mesaj  :</label> </br><textarea rows='4' cols='50' value='Yazan : <br><input type='text' >$mesaj</textarea>";
    echo '<ul class="silonayla">';
    echo"<a href='onayla.php?id=$id'><img src='ok.png' widht='50' height='50' ></a>     ";
    echo"<a href='sil.php?id=$id'><img src='del.png'></a>";
    echo '</ul>';
 
}

if($sayfa!=1){
    echo "";
    echo " ";
}
for($i=1;$i<=$s_sayisi;$i++){
    echo "";
    echo "";
}
if($sayfa!=$s_sayisi){
    echo "";
    echo " ";
}
?>


<?php
} 
?>	
<hr>
