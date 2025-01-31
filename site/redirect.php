<?php ob_start();
header("Content-type:text/html;charset=utf8");
session_start();
include_once ('config.php');
$user= trim(strip_tags(addslashes($_POST['user'])));
$pass= trim(strip_tags(addslashes($_POST['pass'])));

if($user!='' && $pass!=''){
     $exist= mysql_query("SELECT * FROM yonetim WHERE (isim='".$user."' AND  sifre='".$pass."') ");
     $nums= mysql_num_rows($exist);
     if($nums>0){
         $date=date("m F Y l , \S\a\a\\t  H:i");
            

        $fetch= mysql_fetch_array($exist);

         $ch=array("Monday"=>"Pazartesi","Tuesday"=>"Salı","Wednesday"=>"Çarşamba","Thursday"=>"Perşembe","Friday"=>"Cuma","Saturday"=>"Cumartesi","Sunday"=>"Pazar",
             "January"=>"Ocak","February"=>"Şubat","March"=>"Mart","April"=>"Nisan","May"=>"Mayıs","June"=>"Haziran","July"=>"Temmuz","August"=>"Ağustos",
                 "September"=>"Eylül","October"=>"Ekim","November"=>"Kasım","December"=>"Aralık");
        $_SESSION['login']=true;
        $_SESSION['id']=            $fetch['id'];
        $_SESSION['user']=          $fetch['isim'];
        $_SESSION['pass']=          $fetch['sifre'];
        $_SESSION['mail']=          $fetch['mail'];
        $_SESSION['lastvisit']=     $fetch['songiris'];
        $_SESSION['tarihbas']=      strtr( $_SESSION['lastvisit'],$ch);
        mysql_query("UPDATE yonetim SET songiris='".$date."'");
header("Location:admin.php");

     }else{
echo '<script>alert("Kullanıcı adı veya şifre yanlış !");history.go(-1);</script>';
}


}else{
echo '<script>alert("Tüm alanları doldurun ! ");history.go(-1);</script>';
}
?>
