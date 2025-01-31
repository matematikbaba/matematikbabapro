<?php ob_start();
session_start();
include_once ('config.php');


$ayarcek=@mysql_query("SELECT * FROM ayarlar where id=1");
$ayarray=@mysql_fetch_array($ayarcek);
$cssyukle= isset($ayarray['tema'])?$ayarray['tema']:"main.css";
$limitcek= isset($ayarray['lmt'])?$ayarray['lmt']:10;
$_SESSION['limit']=$limitcek;
$_SESSION['temasec']=$cssyukle;

/* @var $sayfaAdet <type> */
function cevapAdet($rid){
    $cvar= mysql_query("SELECT $rid from defter where (cevap=$rid AND onay=1)");
    $tcvar= mysql_num_rows($cvar);
    if($tcvar>0){
        
        return $tcvar;
        
    }else{

        return 0;
    }
    
}


function sayfala($adet){

    $limit= @intval(strip_tags(trim($_GET['s'])));
    $basla=$limit*$adet;
    $yeni=$basla-$adet;
    if($limit!="" or $limit!=null){

      

      $veri="SELECT ip,isim,mesaj,tarih,id,(SELECT COUNT(likes.dislikes) from likes WHERE likes.mid=defter.id) AS dislike1 ,(SELECT COUNT(likes.likes) from likes WHERE likes.mid=defter.id) AS like1 from defter WHERE (onay=1 AND cevap IS  NULL) order by id desc limit $yeni,$adet";
 }
else{

    $veri="SELECT ip,isim,mesaj,tarih,id,(SELECT COUNT(likes.dislikes) from likes WHERE likes.mid=defter.id) AS dislike1 ,(SELECT COUNT(likes.likes) from likes WHERE likes.mid=defter.id) AS like1 from defter WHERE (onay=1 AND cevap IS  NULL) order by id desc limit 0,$adet";

}

return $veri;

}

function sayfalar($onay){
    
    $say=mysql_query("SELECT id from defter where onay=$onay");
    $toplam= mysql_num_rows($say);
    return $toplam;
}

$sayfalar= ceil(sayfalar(1)/$_SESSION['limit']);

$sor= mysql_query(sayfala($_SESSION['limit']));





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ziyaretçi Defteri Scripti</title>
<style type="text/css">
    .karart
    {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 999;
        margin: 0;
        padding: 0
}

    .cevapgoster
    {
     width: 600px;
     height: 400px;
     display: none;
     position: absolute;
     left: 350px;
     top:125px;
     background-color: whitesmoke;
     overflow: auto;
     padding: 15px;
     -moz-border-radius:12px;
     -webkit-border-radius:12px;
     border:3px double  #330014;

    }

    .cevapkapat
    {
      position: absolute;
      top: 5px;
      right: 20px;
      cursor: pointer
      
    }
</style>


<link rel="stylesheet" href="inc/<?=$cssyukle; ?>"></link>

<script type="text/javascript" src="inc/jq.js"></script>
<script type="text/javascript" src="inc/functions.js"></script>
<script>
$(document).ready(function(){
    
  var myuk=$(window).height();

$(".main").css("min-height",myuk);  
});


</script>

</head>

    <body bgcolor="whitesmoke">
        <div id="dene"></div>

<div class="main">
<div class="header">
    <ul><li><a id="sendeyaz" href="#" onclick="return formGoster()">Sizde yazın</a></li>
        <li><a id="sendeyaz" href="./">Anasayfa</a></li>
        <li><a id="sendeyaz" href="#">Forum</a></li>
        <li><a id="sendeyaz" href="#">Blog</a></li>
    
    </ul>


</div>
    <div class="cntnt">
 <?php

 while($sec= mysql_fetch_array($sor)):

     ?>
    <div class="mkapsa">
<div class="mesajlar">
    <div class="yazan">
        <div style="padding-left:10px;width:80%"><?php echo $sec['isim'];?> <small>tarafından <span style="position:absolute;right:0px">&nbsp;</span>
            <div class="vazgec"><span id="vazgec<?php echo $sec['id']; ?>"></span></div>
       <?php echo $sec['tarih'];?> tarihinde yazıldı.</small></div>
        <div class="likes">
            <div class="vazgec"><span id="vazgec<?php echo $sec['id']; ?>"><small></small></span></div>
            <div class="solspan"><span id="likes<?php echo $sec['id']; ?>"><small>(<?php echo $sec['like1']; ?>)</small></span></div>

            <img src="likes.png" width="24px" height="24px" onclick="Likes(<?php echo $sec['id']; ?>,'like',1)" />
            <img src="unlike.png" width="24px" height="24px" onclick="Likes(<?php echo $sec['id']; ?>,'dislike',0)" />
            <div class="sagspan"><span id="dislikes<?php echo $sec['id']; ?>"><small>(<?php echo $sec['dislike1']; ?>)</small></span></div>
        </div>
    </div>
 
<div class="msg">
<div class="icerik">

<?php echo $sec['mesaj'];?>


</div>
</div>
    <div class="cevapyaz">
        <?php
        $bunacevap=cevapAdet($sec['id']);
        if($bunacevap>0){echo "<a href='#' class='cevaplink' onclick='cevapGoster(".$sec['id'].")'>".$bunacevap." cevap var</a> | ";} ?>
        <a id="sendeyaz" href="#" class="cevaplink"  onclick="return formGoster(<?php echo $sec['id']; ?>)">
             Cevap yaz
        </a>

    </div>

</div>
</div>
<?php endwhile; ?>
<?php
if($sayfalar>1)
    echo '<div class="skapsa">';

{
    for($i=0;$i<$sayfalar;$i++)
             {
             if(($i+1)==@intval($_GET['s'])){
             echo '<div class="scurrent"><a   href="index.php?s='.($i+1).'">'.($i+1).'</a></div>';
            
             }else{echo '<div class="sother"><a     href="index.php?s='.($i+1).'">'.($i+1).'</a></div>';}
             }
             echo '<div id="temizle"></div></div><div id="temizle"></div>';

}

?>
</div>
</div>

        
        <div class="karart">

            <div id="kapsa">
    <div id="kapa" class="kapsakapat" onclick="kapa();">Kapat</div>
    <form action="ekle.php" method="POST" name="fpost" onsubmit="return false" id="fpost">

<div id="wind">
    <div id="baslik"></div>
<div style="clear:both"></div>
<div id="forms">
<div id="tsol">İsim</div><div style="float:left"><input type="text" name="isim"  id="texts" /></div><div id="temizle"></div>
<div id="tsol">Mail</div><div style="float:left"><input type="text" name="mail"  id="texts" /></div><div id="temizle"></div>
<div id="tsol">Mesaj</div><div style="float:left"><textarea name="msg" id="msg"></textarea></div><div style="clear:both;height:10px"></div>
<div id="tsol">&nbsp;</div><div style="float:left" id="yukleniyor"><span class="cvpbtn" onclick="return mesajGonder();" >Gönder</span> </div><div id="temizle"></div>
<div id="tsol">&nbsp;</div><div style="float:left" id="mcevap">&nbsp;</div><div id="temizle"></div>
</div>
<div id="temizle"></div>

</div>
    </form><div id="temizle"></div></div>

        <div class="cevapgoster">
            <div class="cevapkapat"><span onclick="return cevapKapat();">Kapat</span></div>
            <div id="cevapicerik" style="width:100%;height: 100%">
            <img src="loader.gif" style="margin:200px 300px" /></div>
        </div>
</div>
        <div class="copy"><a rel="nofollow" href="http://www.bilisimturk.org">BilisimTurk Tarafından Yapılmıştır.</a></div>

</body>
</html>

