<?php
error_reporting(0); 
$gosterim=20;
$sayfa=@$_GET['sayfa'];   
if(empty($sayfa) || !is_numeric($sayfa)){$sayfa=1;}

$k_sayisi=mysql_num_rows(mysql_query("Select * From ziyaretcidefteri where onay=1"));

$s_sayisi=ceil($k_sayisi/$gosterim);

$ilk_kayit=($sayfa*$gosterim)-$gosterim;
 
$al=mysql_query("Select * From ziyaretcidefteri where onay=1 Order By id Desc Limit
$ilk_kayit,$gosterim");

while($yazdir=mysql_fetch_array($al)){
    
    extract($yazdir);
	// küfür spamı yaptım amk .
	$pilav = $mesaj;
	# gülmezseniz sikerim.
	$pilav = str_replace(":D","<img src='hahaha.png'></img>",$pilav);
    $pilav = str_replace(":)","<img src='hahaha.png'></img>",$pilav);
	# güldüm oç :D
	$pilav = str_replace("yarrak","y****k",$pilav);
	$pilav = str_replace("amcık","a***k",$pilav);
	$pilav = str_replace("göt","g*t",$pilav);
	$pilav = str_replace("sik","s*k",$pilav);
	$pilav = str_replace("mal","m*l",$pilav);
	$pilav = str_replace("gerizekalı","g*r**e*a*ı",$pilav);
	// küfür spamı bitti amk.
    echo "<div class='avatar'><img src='system/$avatar'></div>";
    echo "<div class='mesaj'><div class='mesajbaslik'>Yazan : $nick - Tarih : $tarih</div><div id='mesajicerik'>$pilav</div></div></div></div></div></br></br></br></br></br></br>";

}
    echo '<div class="sayfabg"></br>';
if($sayfa!=1){
    echo "";
    echo " ";
}
for($i=1;$i<=$s_sayisi;$i++){
echo "<a  class='sayfalama' href='index.php?sayfa={$i}'>$i</a> - ";

}
if($sayfa!=$s_sayisi){
    echo "";
    echo " ";
}

?>
