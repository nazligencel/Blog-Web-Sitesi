<?php
include "config/db.php";
error_reporting(0);
    $baglanti=$baglan->prepare("SELECT * FROM blog WHERE id=?");
    $baglanti->execute(array(1));
    $sonuc=$baglanti->fetch(PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>Siteme Hoşgeldiniz :) </title>
    <meta name="description" content="<?=$sonuc->description;?>" />
    <meta name="keywords" content="<?=$sonuc->keywords;?>" />
    <meta name="author" content="<?=$sonuc->author;?>" />
    <link rel="stylesheet" href="assets/css/stil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="page">
<div class="ust">
  <ul class="ortala" style="margin-left: 100px;">
   
        <li><a href="hakkimda.php">Hakkımda</a></li>
        <li><a href="deneyimler.php">Deneyim</a></li>
        <li><a href="egitimler.php">Eğitimler</a></li>
        <li><a href="yetenekler.php">Yetenekler && Tasarım Becerileri</a></li>
        <li><a href="projeler.php">Projeler</a></li>
        <li><a href="etkinlikler.php">Etkinlikler && Konferanslar</a></li>
        <li><a href="iletisim.php">İletişim</a></li>
    </ul>
</div>



<div class="icerik"  style="margin-top:135px;" id="projeler">
    <h2 align="center" class="yanson">$ Projeler</h2>
    <p><?=$sonuc->proje;?></p>
</div>



</body>
</html>