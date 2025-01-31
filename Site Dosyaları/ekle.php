<?php
include_once ("config.php");
if($_POST){

$isim=trim(strip_tags($_POST['isim']));
$mail=trim(strip_tags($_POST['mail']));
$msg=trim(strip_tags($_POST['msg']));
$cvp=@trim(strip_tags($_POST['cvpid']));
$date= date("d/m/Y");
$ip= getenv("REMOTE_ADDR");
$onay=0;


if($isim!='' && $mail!='' && $msg!=''){
    if(isset($cvp) && $cvp!=""){
    $ekle= mysql_query("INSERT INTO defter (mesaj,mail,isim,ip,tarih,onay,cevap) values ('$msg','$mail','$isim','$ip','$date','$onay','$cvp') ");
    if($ekle){
        echo 'ok';


    }
    }else{
        $ekle= mysql_query("INSERT INTO defter (mesaj,mail,isim,ip,tarih,onay) values ('$msg','$mail','$isim','$ip','$date','$onay') ");
    if($ekle){
        echo 'ok';


    }


    }


}


}

$cvp=NULL;

?>
