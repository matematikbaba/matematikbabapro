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
<title>Admin Paneli</title>
<style type="text/css">
body { background-image: url("images/bg.png"); }
.menu , .menu ul {
	width:202px;
	margin:auto;
	padding:5px;
	margin-left:-4px;
	overflow:hidden;
}
.menu li {
	float:left;
	position:relative;
}
.menu li img {
	float:left;
	margin: 5px 0 0 5px;
	border:none;
}
.menu li a .name {
	float:left;
	width:166px;
	margin:0 0 0 5px;
	font-weight:bold;
	font-size:0.7em;
	cursor:pointer;
}
.menu li a:active, .menu li a:focus { 
	outline:0;
}
.menu li a .description{
	float:left;
	width:161px;
	margin:-5px 0 0 5px;
	font-weight:normal;
	font-size:0.7em;
	cursor:pointer;
}
.menu li a:link, .menu li a:visited {
	height:35px;
	font-size:1em;
	color:white;
	text-decoration:none;
	line-height:20px;
	display:block;
	font-weight:bold;
}
.menu li a:hover  {
	background:gray;
}
.tarih { margin-top:-140px;margin-left:810px;color:white; }
.adminabi { margin-left:810px;color:white; }
label { color:red; }
</style>


</head>

<ul class="menu"> 
<!-- Menu Begin  -->

<li>  
    <a href="../../index.php"> <img src="user.png" alt="user.png">
    <span class="name">Ana Sayfa</span>
    <span class="description">Anasayfa'a Git</span>
    </a> 
</li>

<li> 
	<a href="ayarlar.php"> <img src="comment.png" alt="comment.png"> 
    <span class="name">Genel Ayarlar</span>
    <span class="description">Site Ayarlari..</span>
    </a>
</li>

<li> 
	<a href="onaybekleyen.php"> <img src="print.png" alt="print.png"> 
    <span class="name">Onaysiz Mesajlar</span>
    <span class="description">Onay bekleyen mesajlar</span> 
    </a>
</li>

<li> 
	<a href="cikis.php"> <img src="cik.png" alt="cik.png"> 
    <span class="name">Cikis Yap</span>
    <span class="description">Cikis Yapmak icin tikla</span> 
    </a>
</li>


</ul> 
<!-- Menu End -->

<?php
function turkce_tarih($pul) { 
    $gunler = array('Pazar', 'Pazartesi', 'Sali', 'Carsamba', 'Persembe',  
                    'Cuma', 'Cumartesi'); 
    $aylar  = array('', 'Ocak', 'Subat', 'Mart', 'Nisan', 'Mayis', 'Haziran',  
                    'Temmuz', 'Agustos', 'Eylul', 'Ekim', 'Kasim', 'Aralik'); 

    return date("d ", $pul).$aylar[date("n", $pul)].date(" Y ", $pul). 
           $gunler[date("w", $pul)]; 
} 
echo '<div class="tarih"> Bugun ';
echo turkce_tarih(time());
echo '</div>'; 
?>
<div class="adminabi">Hosgeldin <label><strong><?php echo $kullanici; ?></label></div>

<?php
} 
?>	

