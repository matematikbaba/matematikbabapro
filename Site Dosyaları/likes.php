<?php
include_once ('config.php');
function getLikes($no,$whichlike){
    $begeni= mysql_query("SELECT COUNT($whichlike) AS result from likes WHERE (mid='".$no."')");
    if($begeni){
        $fetch= mysql_fetch_array($begeni);
        
      $out=isset($fetch["result"])?'('.$fetch["result"].')':"";
      return $out;
       
    }
}

$islem= strip_tags($_GET['islem']);
$id= strip_tags(intval($_GET['id']));
$ip= getenv("REMOTE_ADDR");
if( isset($id)){
if($islem=='like'){
    $lvarmi= mysql_query("SELECT id,ip,mid from likes WHERE (mid='".$id."' AND ip='".$ip."')");
     $lsay= mysql_num_rows($lvarmi);
if($lsay<1){
    $like= mysql_query("INSERT INTO likes (ip,likes,mid) VALUES ('$ip',1,'$id') ");
     if($like){
         echo 'like1';
        }else{ echo 'like0';}
            }else{
         echo "zatenl";

     }
}
 else if($islem=="dislike"){
     $dvarmi= mysql_query("SELECT id,mid,ip from likes WHERE (mid='".$id."' AND ip='".$ip."')");
     $dsay= mysql_num_rows($dvarmi);
     if($dsay<1){

     $dislike= mysql_query("INSERT INTO likes (ip,dislikes,mid) VALUES ('$ip',1,'$id') ");
     if($dislike){
         echo'dislike1';
        }else{ echo'dislike0';}
     }else{
         echo "zatend";

     }
 }
     else if($islem=="showlikes"){
         echo "<small>".getLikes($id,"likes")."</small>";

     }
     else if($islem=="showdislikes"){
         echo "<small>".getLikes($id,"dislikes")."</small>";

     }

      else if($islem=="vazgec"){
         $cvarmi= mysql_query("SELECT likes from likes WHERE (mid='".$id."' AND ip='".$ip."')");
         $csay= mysql_num_rows($cvarmi);
         if($csay>0){
         $sil= mysql_query("DELETE from likes WHERE (mid='".$id."' AND ip='".$ip."')");
         if($sil){

             echo'v1';
         }else{
             echo "v0";
             }
         }
     }
}
?>
