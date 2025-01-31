<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
        body{margin-top:150px;background-color: #800000}

        .mainform{
     width: 300px;
     height: 200px;
     margin: auto;
     padding: 50px;
     background-color: #660000;
     color: white
   
     
}

.clr{
    clear: both;
}

.text{
    width:150px;
    float:left;
}

.inputfield{
    width:120px;
    float:left;

}

.inputs{

    width:120px;
    height:25px;
    background-color: white;
    color: A30000


}

.kapsa{padding: 15px}

.lnk{visibility: hidden;position: fixed;top: 0px;left: 0px}


    </style>
  </head>
  <body>
      <form action="redirect.php" method="POST" >
  <div class="mainform">
      <div class="kapsa">
      <div class="text">
          Kullanıcı Adı :
      </div>
      <div class="inputfield">
          <input class="inputs" name="user" type="text">
      </div>
    
      </div>  <div class="clr"></div>
      <div class="kapsa">
   <div class="text">
          Şifre :
      </div>
      <div class="inputfield">
          <input class="inputs" name="pass" type="password">
      </div>
      </div><div class="clr"></div>
      <div class="kapsa">
      <div class="text">
          &nbsp;
      </div>
      <div class="inputfield">
          <input class="inputs"  type="submit" value="Giriş">
      </div>
  </div>
  </div>
        
</form>
  </body>
</html>
