  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="inc/main.css">
    <script type="text/javascript" src="inc/jq.js"></script>
    <script type="text/javascript" src="inc/functions.js"></script>
    <script>


</script>

  </head>

<?php
include_once ('config.php');
$id=@intval(strip_tags($_GET['id']));
if(isset($id)):
    $cek=mysql_query("SELECT ip,isim,mesaj,tarih,id,(SELECT COUNT(likes.dislikes) from likes WHERE likes.mid=defter.id) AS dislike1 ,(SELECT COUNT(likes.likes) from likes WHERE likes.mid=defter.id) AS like1 from defter WHERE id=$id order by id desc");
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
   

</div>
              </div><div class="temizle"></div>



            <?php
        endwhile;

    endif;

endif;

?>
