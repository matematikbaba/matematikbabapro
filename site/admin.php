<?php ob_start();
session_start();
include_once('config.php');

$ayarcek=@mysql_query("SELECT * FROM ayarlar where id=1");
$ayarray=@mysql_fetch_array($ayarcek);
$cssyukle= isset($ayarray['tema'])?$ayarray['tema']:"main.css";
$limitcek= isset($ayarray['lmt'])?$ayarray['lmt']:10;
$_SESSION['lmt']=$limitcek;
$_SESSION['css']=$cssyukle;



function sayfala($adet,$isAppr){

    $limit= @intval(strip_tags(trim($_GET['s'])));
    $basla=$limit*$adet;
    $yeni=$basla-$adet;
    if($limit!="" or $limit!=null){



      $veri="SELECT ip,mail,isim,mesaj,tarih,id,cevap from defter WHERE onay=$isAppr order by id desc limit $yeni,$adet";
 }
else{

    $veri="SELECT ip,mail,isim,mesaj,tarih,id,cevap from defter WHERE onay=$isAppr order by id desc limit 0,$adet";

}

return $veri;

}

function sayfalar($onay){

    $say=mysql_query("SELECT id from defter where onay=$onay");
    $toplam= mysql_num_rows($say);
    return $toplam;
}



function icerikcek($onaydurum,$limit=NULL){
    $sayfalar= ceil(sayfalar($onaydurum)/$_SESSION['lmt']);
    $sor= mysql_query(sayfala($_SESSION['lmt'],$onaydurum));
    $query=mysql_query("SELECT tarih,mesaj,isim,tarih,id,mail,ip,cevap from defter WHERE onay=".$onaydurum);
    $say=mysql_num_rows($query);
    $output=($onaydurum==0)?"onay bekleyen":"onaylanmış";
    $drm=($onaydurum==0)?"waiting":"approved";
    if ($say<1){
        echo '<div style="padding:10px;margin:10 0 0 10;background-color:whitesmoke;text-align:center;border-radius:5px;border:1px solid black">Henüz '.$output.' mesaj bulunmuyor.</div>';

    }
    else{
        while($sql= mysql_fetch_array($sor)){
            echo '<div class="pkapsa">
                <div class="kapsa">
                    <div class="isim">
                    '.$sql['isim'].'</div>
                        <div class="mail">
                        '.$sql['mail'].'</div>
                            <div class="mesaj">
                            '.$sql['mesaj'].'</div>
                                
                                <div class="tarih"><small>
                                '.$sql['tarih'].'</small></div>
                                    <div class="duzenle"><a href="admin.php?page=edit&id='.$sql['id'].'"><img src="edit.png"></a><span class="detay">Düzenle</span></div>';
            if($onaydurum==1){
                
                echo '<div class="onayla"><small>Onaylı</small></div>';
            }else{ echo '<div class="onayla"><a href="admin.php?page=approve&id='.$sql['id'].'"><img src="ok.png"></a><span class="detay">Onayla</span></div>';}
                                    
                              echo'      <div class="sil"><a href="admin.php?page=delete&id='.$sql['id'].'" onclick=\'return confirm("Bu mesajı silmek istediğinizden emin misiniz ? ");\'><img src="del.png" width="16" height="16"></a><span class="detay">Sil</span></div>
<div class="banla"><a href="admin.php?page=banned&ip='.$sql['ip'].'"><img src="ban.png"></a><span class="detay">Yasakla</span></div>
<div class="clr"></div></div>';

                              if(isset($sql['cevap']) && $sql['cevap']!=NULL){echo '<span class="cevap"><a href="tekil.php?id='.$sql['cevap'].'" target="_blank">Bu</a> mesaja cevaben</span>';}

                              echo '</div>';

        }
if($sayfalar>1)
   

{ echo '<div class="mkapsa">';
    for($i=0;$i<$sayfalar;$i++)
             {
             echo '<div style="float:left;padding:2px 6px 2px 6px;border-radius:5px;background-color:whitesmoke;margin-right:4px"><a class="sayfala" href="admin.php?page='.$drm.'&s='.($i+1).'">'.($i+1).'</a></div>';

             }

             echo '</div>';

}

echo '</div>';

    }

}

function ayarlar(){
echo'<form action="admin.php?page=ayarupdate" method="POST">
   <div class="editkapsa">
   <div class="editbirim">
   <div class="editsol">
   Her sayfada gösterilen mesaj sayısı :</div>
   <div class="editsag"><input type="text" name="msgcnt" class="stxt" value="'.$_SESSION['lmt'].'" ></div> <div class="clr"></div></div>
        <div class="editbirim">
   <div class="editsol">
   Kullanılan tema :</div>
   <div class="editsag"><select name="temasec" class="stxt"><option value="main.css">Default</option><option value="tema2.css">Old paper</option></select></div> <div class="clr"></div></div>
        
        
   <div class="editbirim">
   <div class="editsol">
   &nbsp;</div>
   <div class="editsag"><input type="submit" value="Kaydet" style="padding:10px;width:150px;background-color:whitesmoke;color:black"></div> <div class="clr"></div></div>
   </div></form>';

    

}


function yasakcek(){
    $ycek= mysql_query("SELECT * FROM banned ");
    $ynum= mysql_num_rows($ycek);
    if($ynum>0):
        $i=1;
        while($yasak= mysql_fetch_array($ycek)):
            echo'
<div class="bannedpkapsa">
<div class="bannedkapsa">
                <div class="kapsa">
                <div class="bannedid">'.$i.'</div>
                <div class="bannedip">'.$yasak['ip'].'</div>
                <div class="bannedsil"><a href="admin.php?page=removeban&ip='.$yasak['ip'].'"><img src="del.png"></a></div>
               <div class="clr"></div> </div></div></div>';
        $i++;
     endwhile;
     else :echo'<div class="pkapsa" style="text-align:center">Şu anda banlı ip bulunmamakta.</div>';
endif;

}

function about(){
    echo '<div class="pkapsa">Merhabalar.<br>Bu script BilisimTurk tarafından yazılmıştır.
     

';


}

function sifredegis(){
    echo '
   <form action="admin.php?page=changepassword" method="POST">
   <div class="editkapsa">
   <div class="editbirim">
   <div class="editsol">
   Kullanıcı Adı :</div>
   <div class="editsag"><input type="text" name="user" value="'.$_SESSION['user'].'" class="txt"></div> <div class="clr"></div></div>
        <div class="editbirim">
   <div class="editsol">
   Eski Şifre :</div>
   <div class="editsag"><input type="password" name="eski" class="txt"></div> <div class="clr"></div></div>
        <div class="editbirim">
   <div class="editsol">
  Yeni Şifre :</div>
   <div class="editsag"><input type="password" name="yeni1" class="txt"></div> <div class="clr"></div></div>
        <div class="editbirim">
   <div class="editsol">
   Yeni Şifre<sub><small>tekrar</small></sub> :</div>
   <div class="editsag"><input type="password" name="yeni2" class="txt"></div> <div class="clr"></div></div>
   <div class="editbirim">
   <div class="editsol">
   &nbsp;</div>
   <div class="editsag"><input type="submit" value="Şifre Değiştir" class="sub"></div> <div class="clr"></div></div>
   </div></form>';

    }
if($_SESSION['login']==true){
$page=@strip_tags($_GET['page']);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Ziyaretçi Defteri Scripti</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
        body{
            margin:0px;
          
           background-image: url('bg.gif');
        background-size:cover;


}

img{border:0}

        .home{
            width:90%;
            height: 90%;
            margin:0 auto 0 auto;
           


}

.top{
    width:100%;
    height:30px;
    background-color:whitesmoke;
    color:black;
    text-align: right;
    border-bottom: 1px solid black;
    position:relative;
    border-radius:5px;
    
}

.top a{


    color:    black;
    text-decoration: none

}

.top a:hover{
    color:    black;
    text-shadow:2px 2px 8px #330014;

}
.menu{
    width:20%;
    color:white;
    background-color: whitesmoke;
    float: left;
    margin-top:10px;
    border-radius:5px;
}

.icerik{
    width:80%;
    margin-right: -1px;
    padding-bottom: 10px;
    float:left;


}

.mkapsa{
    width:100%;
    padding:10px;

    margin-top:5px;
}

.pkapsa{
      padding:10px;
background-color:whitesmoke;
margin:0 0 10 0;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
border:1px solid gray;
margin:10 0 0 10;
position: relative
}

.pkapsa:hover{
    background-color: #CFCFCF;
     


}

.pkapsa span.cevap{
    display: none;
    position: absolute;
    bottom:-43px;
    left:0px;
    background-color: black;
    color: white;
    padding: 10px;
    z-index: 999;
    height: 25px
    

}

.pkapsa span.cevap a{
    
    color: white;
    text-decoration: underline


}

.pkapsa:hover span.cevap{display: block}

.kapsa{
    width:100%;
    display:block;
    background-color:inherit;
    font-family: Trebuchet MS,Georgia;
    font-size: smaller
   
}

.kapsa a{
    color:black;
    display:block;
    text-decoration: none
}

.kapsa a:hover{
     text-decoration: underline

}
.kapsa:hover{
   

}

.isim{

    width:12%;
    float:left;
    background-color:inherit
}

.mesaj{
    width:46%;
    float:left;
    background-color:inherit
}

.mail{
    width:18%;
    float:left;
    background-color:inherit
}

.sil{
    width:4%;
    float:left;
    background-color:inherit;
    text-align: center;
    position: relative
}


.sil:hover span.detay{
    display:block
}
.banla{
    width:4%;
    float:left;
    background-color:inherit;
    text-align: center;
    position: relative
}

.banla:hover span.detay{
    display: block
}

.onayla{
    width:4%;
    float:left;
    background-color:inherit;
    text-align: center;
    position: relative
}

.onayla:hover span.detay{
    display:block
}

.duzenle{
    width:4%;
    float:left;
    background-color:inherit;
    text-align: center;
    position: relative
}

.duzenle:hover span.detay{
    display: block
}
.tarih{
    width:8%;
    float:left;
    background-color:inherit;
    text-align: center;

}
.clr{
    clear: both
}

.editkapsa{
    padding:10px;

}

.editbirim{
    margin:10px
}

.editsol{
    width:30%;
    float:left;
    color:white;
    padding:10 0 10 0
}

.editsag{
    width:70%;
    float:left;
    color:white;
}

.editsag input.txt{
    width:300px;
    background-color: whitesmoke;
    padding: 10px;
    border-radius:5px;
    -moz-border-radius:5px;
-webkit-border-radius:5px;
}
.editsag input.sub{
    width:300px;
    background-color: whitesmoke;
    color:#330014;
    padding: 10px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
-moz-border-radius: 5px;

 
}



.editsag textarea{
    width:300px;
    height:200px;
    background-color: whitesmoke;
    border-radius:5px;
    font-family: Trebuchet MS,Georgia;
    padding: 10px;
}

.wrap{
    width:100%;
}

li a{
    color:    black;
    text-decoration: none;
    
        
}

ul{
    list-style-type: none;
   
    
}



li a:hover{
    color:black;
    text-decoration: none;
    text-shadow:2px 2px 8px black
}

.topsag{
    left:40px;
    position: absolute;

}

.topsol{
    right:100px;
    position:absolute
}

.sayfala{text-decoration: none;color:#330014;background-color: whitesmoke;}

span.detay{
    position:absolute;
    top:20;
    width:auto;
    display: none;
    background-color: black;
    color:whitesmoke;
    padding:1 5 1 5
    
}
.detay:hover{
    display: block
}

.bannedip{width:60%;float:left}
.bannedid{width:20%;float:left}
.bannedsil{width:20%;float:left}
.bannedpkapsa{width:25%;float:left}
.bannedkapsa{
    
    padding:10px;
background-color:whitesmoke;
margin:0 0 10 0;
border-radius:5px;
-moz-border-radius:5px;
-webkit-border-radius:5px;
border:1px solid gray;
margin:10 0 0 10;

}
.stxt{width:150px;padding: 10px}
.stxt option{padding: 10px}

.bannedkapsa:hover{
    background-color:  #CFCFCF;
}

.aboutlink{text-decoration: none;color:black;font-weight: bold}


    </style>

    <script language="javascript" src="jq.js"></script>
    <script language="javascript" type="text/javascript">
      

        
    
    </script>

</head>
<body>

      <div class="home">
          <div class="top">
              <span class="topsag">Hoşgeldiniz <B><?php echo $_SESSION['user']; ?></B>.  Son ziyaretiniz <?php echo $_SESSION['tarihbas']; ?> </span><span class="topsol"><a href="admin.php?page=changepass">Şifre Değiştir&nbsp; </a> |&nbsp; <a href="index.php" target="_blank">Defteri Görüntüle &nbsp; </a> | <a href="admin.php?page=logout">&nbsp;&nbsp;Çıkış Yap</a></span>

          </div> <div class="clr"></div>
          <div class="wrap">
          <div class="menu">
              <ul>
                  <li>
                      <a href="admin.php">Anasayfa</a>
                  </li>

                  <li>
                      <a href="#">Mesajlar</a> 
                      <ul>
                          <li>
                              <a href="admin.php?page=waiting">Onay Bekleyen (<?=sayfalar(0); ?>) </a>
                          </li>
                          <li>
                              <a href="admin.php?page=approved"> Onaylı (<?=sayfalar(1); ?>)</a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="admin.php?page=bannedlist">Yasaklı Listesi</a>
                  </li>

                  <li>
                      <a href="admin.php?page=settings">Ayarlar</a>
                  </li>
                  <li>
                      <a href="admin.php?page=about">Hakkında</a>
                  </li>

              </ul>

          </div>
          <div class="icerik">
<?php
if($page=='approved'){icerikcek(1);}
if($page=='waiting'){icerikcek(0);}
if($page=="bannedlist"){yasakcek();}
if($page=="changepass"){sifredegis();}
if($page=="settings"){ayarlar();}
if($page=="about"){about();}

if($page==''){echo '<div style="padding:10px;margin:10 0 0 10;background-color:whitesmoke;text-align:center;border-radius:5px;border:1px solid black">Lütfen sol menüden bir işlem seçin</div>';}
if($page=='edit'){
   $id=strip_tags(mysql_real_escape_string($_GET['id']));
    $idvarmi= mysql_query("SELECT * FROM defter WHERE id='".$id."'");
    $nmrow=mysql_num_rows($idvarmi);
    if($nmrow>0){
     $ftch= mysql_fetch_array($idvarmi);
     echo '
<form action="admin.php?page=update&id='.$id.'" method="POST">
<div class="editkapsa">
         <div class="editbirim">
         <div class="editsol">
         İsim :</div>
         <div class="editsag"><input type="text" class="txt" name="isim" value="'.$ftch['isim'].'"></div>
             <div class="clr"></div></div>
 <div class="editbirim">
             <div class="editsol">
         Mail :</div>
         <div class="editsag"><input type="text" class="txt" name="mail" value="'.$ftch['mail'].'"></div>
             <div class="clr"></div></div>
              <div class="editbirim">
             <div class="editsol">
         Mesaj :</div>
         <div class="editsag"><textarea name="mesaj">'.$ftch['mesaj'].'</textarea></div>
             <div class="clr"></div></div>
              <div class="editbirim">
             <div class="editsol">
         &nbsp;</div>
         <div class="editsag"><input type="submit" class="sub"  value="Güncelle"></div>
             <div class="clr"></div></div>
 <div class="editbirim">
             <div class="editsol">
         <input type="hidden" name="onay" value="'.$ftch['onay'].'"></div>
         <div class="editsag">Not : Eğer düzenlediğiniz mesaj onaylı değilse güncellediğiniz an onaylanmış olur.</div>
             <div class="clr"></div></div>
</div></form>';

    }
}

if($page=='ayarupdate'){
$limital=@strip_tags(trim($_POST['msgcnt']));
$temasec=@strip_tags(trim($_POST['temasec']));
if($limital!="" && $temasec!=""){
        $ayarup= mysql_query("UPDATE  ayarlar SET lmt='$limital',tema='$temasec'  where id=1");
        if($ayarup){
            $_SESSION['lmt']=$limital;
            $_SESSION['css']=$temasec;
            echo'<script>alert("Ayarlar değiştirildi");history.go(-1);</script>';
        }
        else{
            echo '<script>alert("Ayarlar değiştirilemedi.\n Lütfen tekrar deneyin");history.go(-1);</script>';
        }

}else{echo' <script>alert("Ayarlar değiştirilemedi.\n Lütfen tüm alanları doldurun");history.go(-1);</script>';}
    
}
?>
       </div>
              
              <div class="clr">&nbsp;</div>
          </div>
      </div>


  </body>
</html>

<?php
if($page=="approve"){
    $id=strip_tags(mysql_real_escape_string($_GET['id']));
    if (isset($id)):
        $onayla=mysql_query("UPDATE defter set onay=1 WHERE id='".$id."'");
        $redi=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"admin.php";
        if($onayla):
            header("Location:".$redi);
        endif;
    endif;
}

if($page=="delete"){
    $id=strip_tags(mysql_real_escape_string($_GET['id']));
    if (isset($id)):
        $onayla=mysql_query("DELETE FROM defter  WHERE id='".$id."'");
        $redi=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"admin.php";
        if($onayla):
            header("Location:".$redi);
        endif;
    endif;
}

if($page=="update"){
    $id=strip_tags(mysql_real_escape_string($_GET['id']));
      if (isset($id)):
         
            $isim=trim(strip_tags($_POST['isim']));
            $mail=trim(strip_tags($_POST['mail']));
            $mesaj=trim(strip_tags($_POST['mesaj']));
            $onay=trim(strip_tags($_POST['onay']));
            if($isim!='' && $mesaj!='' && $mail!=''){
                $app=($onay=="0")?",onay='1'":NULL;
                $loca=($onay=="0")?"waiting":"approved";
                $up= mysql_query("UPDATE defter SET isim='$isim',mail='$mail',mesaj='$mesaj'".$app." WHERE id='".$id."'");
                
                if($up):
                    
                    header("Location:admin.php?page=".$loca);
                else: echo'olmadı';
                endif;
                   
            }else{ echo'olmadı';}
           

            endif;
}

if($page=="banned"){
    $ip=strip_tags($_GET['ip']);
     $redi=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"admin.php";
    if(isset($ip)):
        $ban=mysql_query("INSERT INTO banned (ip) VALUES ('$ip') ");
        if($ban):
             echo'<script>alert("Seçtiğiniz kullanıcı yasaklandı.");history.back();</script>';
       
            
       
        endif;
    endif;


}

if($page=="removeban"){
     $ip=strip_tags($_GET['ip']);
     $redi=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"admin.php";
            if(isset($ip)):
            $bansor= mysql_query("SELECT * FROM banned WHERE ip='".$ip."'");
             $bvarmi=mysql_num_rows($bansor);
             if($bvarmi>0):
                 $bsil= mysql_query("DELETE from banned WHERE ip='".$ip."'");
                 if($bsil):
                     header("Location:".$redi);
                 endif;
             endif;
         endif;
}


if($page=="changepassword"){
    $user= trim(strip_tags($_POST['user']));
    $eski= trim(strip_tags($_POST['eski']));
    $yeni1=trim(strip_tags($_POST['yeni1']));
    $yeni2=trim(strip_tags($_POST['yeni2']));
    
    if($eski!='' && $yeni1!='' && $yeni2==$yeni1 && $user!=''):
        $eskisifre=mysql_query("SELECT * from yonetim WHERE id='".$_SESSION['id']."'");
        $arr= mysql_fetch_array($eskisifre);

        if($eski==$arr['sifre']):
            $upt= mysql_query("UPDATE yonetim SET sifre='$yeni1' WHERE id='".$_SESSION['id']."'");
            $_SESSION['user']=$user;
            if($upt):
                echo'<script>alert("Şifre değiştirildi.");history.back();</script>';
            else:echo'<script>alert("Şifre değiştirilemedi.");history.back();</script>';
            endif;
        else:echo '<script>alert("Eski şifreyle yeni şifre uyuşmuyor.");history.back();</script>';
        endif;
    else: echo'<script>alert("Tüm alanları doldurun.");history.back();</script>';
        endif;
        
        }


if($page=="logout"){
    $out= session_destroy();
    if($out):
        header("Location:login.php");
    endif;

}

}else{
    header("Location:login.php");

}

?>