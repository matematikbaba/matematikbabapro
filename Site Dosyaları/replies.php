<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="inc/<?=$_SESSION['temasec']; ?>">
    <script type="text/javascript" src="inc/jq.js"></script>
    <script type="text/javascript" src="inc/functions.js"></script>
    <script>
//function cevapGoster(rid){
//    $(".cevapgoster").fadeIn(200);
//    $(".cevapgoster").load("replies.php?rid="+rid);
//}

</script>

  </head>
  <body style="width:60%">

      <?php
include_once ('config.php');
$id=@intval(strip_tags($_GET['rid']));
function cevapAdet($rid){
    $cvar= mysql_query("SELECT $rid from defter where (cevap=$rid AND onay=1)");
    $tcvar= mysql_num_rows($cvar);
    if($tcvar>0){

        return $tcvar;

    }else{

        return 0;
    }

}
if(isset($id)):
    $cek=mysql_query("SELECT ip,isim,mesaj,tarih,id,(SELECT COUNT(likes.dislikes) from likes WHERE likes.mid=defter.id) AS dislike1 ,(SELECT COUNT(likes.likes) from likes WHERE likes.mid=defter.id) AS like1 from defter WHERE (cevap=$id AND onay=1) order by id desc");
    if(mysql_num_rows($cek)>0):
        while($sec= mysql_fetch_array($cek)): ?>
              <div class="mkapsa">
<div class="mesajlar">
    <div class="yazan">
        <div style="padding-left:10px;width:80%"><?php echo $sec['isim'];?><span style="position:absolute;right:0px">&nbsp;</span>
            <div class="vazgec"><span id="vazgec<?php echo $sec['id']; ?>"></span></div>
       <small>tarafından <?php echo $sec['tarih'];?> tarihinde yazıldı.</small></div>
        <div class="likes">
            <div class="vazgec"><span id="vazgec<?php echo $sec['id']; ?>"></span></div>
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
        <a id="sendeyaz" href="#" class="cevaplink"  onclick="return cevapKapaFormAc(<?php echo $sec['id']; ?>)">
             Cevap yaz
        </a>

    </div>

</div>
              </div><div class="temizle"></div>

 

            <?php
        endwhile;

    endif;

endif;
?>

   <div id="kapsa">
    <div id="kapa" style="position:absolute;top:5px;right:10px;color:#330014;cursor: pointer" onclick="kapa();">Kapat</div>
    <form action="ekle.php" method="POST" name="fpost" onsubmit="return false" id="fpost">

<div id="wind">
    <div id="baslik"></div>
<div style="clear:both"></div>
<div id="forms">
<div id="tsol">İsim</div><div style="float:left"><input type="text" name="isim"  id="texts" /></div><div id="temizle"></div>
<div id="tsol">Mail</div><div style="float:left"><input type="text" name="mail"  id="texts" /></div><div id="temizle"></div>
<div id="tsol">Mesaj</div><div style="float:left"><textarea name="msg" id="msg"></textarea></div><div style="clear:both;height:10px"></div>
<div id="tsol">&nbsp;</div><div style="float:left" id="yukleniyor"><span style="width:30px;padding:8px;color:whitesmoke;background-color: #330014;cursor: pointer" onclick="return mesajGonder();" >Gönder</span> </div><div id="temizle"></div>
<div id="tsol">&nbsp;</div><div style="float:left" id="mcevap">&nbsp;</div><div id="temizle"></div>
</div>
<div id="temizle"></div>

</div>
    </form><div id="temizle"></div></div>

  </body>



