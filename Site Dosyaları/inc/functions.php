<?php

function sayfala($adet){

    $limit= @intval(strip_tags(trim($_GET['s'])));
    $basla=$limit*$adet;
    $yeni=$basla-$adet;
    if($limit!="" or $limit!=null){



      $veri="SELECT ip,isim,mesaj,tarih,id,(SELECT COUNT(likes.dislikes) from likes WHERE likes.mid=defter.id) AS dislike1 ,(SELECT COUNT(likes.likes) from likes WHERE likes.mid=defter.id) AS like1 from defter WHERE onay=1 order by id desc limit $yeni,$adet";
 }
else{

    $veri="SELECT ip,isim,mesaj,tarih,id,(SELECT COUNT(likes.dislikes) from likes WHERE likes.mid=defter.id) AS dislike1 ,(SELECT COUNT(likes.likes) from likes WHERE likes.mid=defter.id) AS like1 from defter WHERE onay=1 order by id desc limit 0,$adet";

}

return $veri;

}

function sayfalar($onay){

    $say=mysql_query("SELECT id from defter where onay=$onay");
    $toplam= mysql_num_rows($say);
    return $toplam;
}

$sayfalar= ceil(sayfalar(1)/5);

$sor= mysql_query(sayfala(5));

?>
