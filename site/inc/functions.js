/* 
 * Tarih: 29/09/2012 17:05
 * Kodlama: Mustafa
 * Site : www.bilisimturk.org/forum
 * Lütfen kullanırken kaynak gösterin
 */






function kapa(){
    $("#hiddenval").remove();
    $("#kapsa").hide();
    $(".main").fadeTo("fast","1");
    $(".karart").fadeOut(0);

}



function mesajGonder(){
    var isim=document.fpost.isim.value;
    isim=jQuery.trim(isim);
    var mail=document.fpost.mail.value;
    mail=jQuery.trim(mail);
    var msg=document.fpost.msg.value;
    msg=jQuery.trim(msg);

    if(isim!="" && msg!="" & mail!=""){

        var veri=$("#fpost").serialize();

        
        $.ajax({
            beforeSend:function(){
                $("#yukleniyor").html("<img src='spinner.gif'> Lütfen bekleyin");
            },
            timeout:5000,
            type:"POST",
            url:"ekle.php",
            data:veri,
            success:function(sonuc){
                $("#hiddenval").remove();
                if(jQuery.trim(sonuc)=="ok"){
                    $("#fpost")[0].reset();
                    kapa();
                    $('#yukleniyor').html('<span style="width:30px;padding:8px;color:whitesmoke;background-color: #330014;cursor: pointer" onclick="return mesajGonder();" >Gönder</span> ');
                    $(".main").fadeTo("fast","0.3");
                    $('body').append("<div id='gecici' style='position:absolute;left:500px;top:250px;padding:20px;background-color:green;color:white'>Mesajınız eklendi..</div>");
                    setTimeout(function(){$("#gecici").remove(); $(".main").fadeTo("fast","1");},2000)
                }else{
                    alert('Bir hata meydana geldi');
                    $("#fpost")[0].reset();
                    kapa();
                }
            }
        });
    }else{
        hataVer();
    }

}

function hataVer(){

    var hatalar=new Array();
    var isim=document.fpost.isim.value;
    isim=jQuery.trim(isim);
    var mail=document.fpost.mail.value;
    mail=jQuery.trim(mail);
    var msg=document.fpost.msg.value;
    msg=jQuery.trim(msg);


    if(isim==''){
        hatalar[hatalar.length]='İsim alanı boş olamaz'
        }
    if(mail==''){
        hatalar[hatalar.length]='Mail alanı boş olamaz'
        }
    if(msg==''){
        hatalar[hatalar.length]='Mesaj alanı boş olamaz'
        }

    alert((hatalar.toString()).replace(/,/g,"!.\n")+"!.");
}

function Likes(id,likeordis){
    if(id!="" && likeordis!=""){

        var liketype=(likeordis=="like")?"likes":"dislikes";
        $.ajax({
            type:"GET",
            url:"likes.php",
            data:"islem="+likeordis+"&id="+id,
            success:function(out){
                if(jQuery.trim(out)=="like1") {
                    loadLike(id,liketype);

                    $("#vazgec"+id).html("Bunu beğendiniz.<a href='#vazgec' onclick='vazgec("+id+",1)'>Geri al</a>");
                }
                else if(jQuery.trim(out)=="dislike1"){

                    loadLike(id,liketype);
                    $("#vazgec"+id).html("Bunu beğenmediniz.<a href='#vazgec' onclick='vazgec("+id+",0)'>Geri al</a>");
                }
                else if(jQuery.trim(out)=="zatend"){
                    alert("Bu mesajı zaten değerlendirmişsiniz");
                }

                else if(jQuery.trim(out)=="zatenl"){
                    alert("Bu mesajı zaten değerlendirmişsiniz");
                }

            }


        });

    }


}

function vazgec(vid,ltype){
    if(vid!=""){

        var lyaz=(ltype=="1")?"likes":"dislikes";
        $.ajax({
            type:"GET",
            url:"likes.php",
            data:"islem=vazgec&id="+vid,
            success:function(cancl){
                if(jQuery.trim(cancl)=="v1"){
                    $("#vazgec"+vid).empty();
                    $("#"+lyaz+vid).load("likes.php?islem=show"+lyaz+"&id="+vid);

                }
                else  if(jQuery.trim(cancl)=="v1"){
                    $("#vazgec"+vid).html("");
                    $("#"+lyaz+vid).load("likes.php?islem=show"+lyaz+"&id="+vid);

                }

            }
        });

    }
}

function loadLike(likeid,liketype){
    var liketp=(liketype=='likes')?'likes':'dislikes';
    $("#"+liketp+likeid).load("likes.php?islem=show"+liketp+"&id="+likeid);


}

//$(document).ready(function(){
//    $("#sendeyaz").click(function(){
//
//
// });
//});

function formGoster(isReply)
{
    $(".karart").fadeIn(0);
    $(".main").fadeTo("fast","0.3");
    $("#kapsa").fadeIn(0);
    
    if(isReply){
        $("#fpost").append("<input type='hidden' name='cvpid' id='hiddenval' value='"+isReply+"'>");

    }
}

function cevapGoster(rid){
    $(".karart").fadeIn(0);
    $(".cevapgoster").fadeIn(0);
    $(".main").fadeTo("fast","0.3");
    $("#cevapicerik").load("replies.php?rid="+rid);

}

function cevapKapat(){
    $(".karart").fadeOut(0);
     $(".cevapgoster").hide();
    $(".main").fadeTo("fast","1");
    $("#cevapicerik").html("<img src='loader.gif' style='margin:200px 300px' />");

}
    $(document).ready(function(){
        var x=$(window).width();
        var y=$(window).height();
        $(".karart").css({"width":x-30,"height":y-30});
    });

    function cevapKapaFormAc(rid){
        cevapKapat();
        formGoster(rid);
    }




