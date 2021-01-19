<?php
include "../config/db.php";
include "fonksiyonlar.php";


if($_POST)
{

    $title=checkInput($_POST['title']);
    $description=checkInput($_POST['description']);
    $keywords=checkInput($_POST['keywords']);
    $author=checkInput($_POST['author']);
    $hakkimda=$_POST['hakkimda'];
    $deneyimler=$_POST['deneyimler'];
    $egitimler=$_POST['egitimler'];
    $yetenekler=$_POST['yetenekler'];
    $projeler=$_POST['projeler'];
    $etkinlikler=$_POST['etkinlikler'];
    $linkedin=checkInput($_POST['linkedin']);
    $twitter=checkInput($_POST['twitter']);
    $instagram=checkInput($_POST['instagram']);
    $email=checkInput($_POST['email']);

    if (kayitlimi(1))
    {
        $kontrol=$baglan->prepare("UPDATE blog SET title=? , description=?,keywords=?, author=?,hakkimda=?,deneyim=?,egitim=?,yetenek=?,proje=?,etkinlik=?,linkedin=?,twitter=?,instagram=?,email=? WHERE id=?");
        $kontrol->execute(array($title,$description,$keywords,$author,$hakkimda,$deneyimler,$egitimler,$yetenekler,$projeler,$etkinlikler,$linkedin,$twitter,$instagram,$email,1));
        $error=$kontrol->errorInfo();
        if(empty($error[2]))
        {
            $uyari="Güncelleme başarıyla tamamlandı";
        }
        else
        {

            $uyari= "Güncelleme işlemi sırasında hata:".$error[2];
        }
    }
    else
    {
        $kontrol=$baglan->prepare("INSERT INTO blog(title,description,keywords,author,hakkimda,deneyim,egitim,yetenek,proje,etkinlik,linkedin,twitter,instagram,email) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $kontrol->execute(array($title,$description,$keywords,$author,$hakkimda,$deneyimler,$egitimler,$yetenekler,$projeler,$etkinlikler,$linkedin,$twitter,$instagram,$email));
        $error=$kontrol->errorInfo();
        if(empty($error[2]))
        {
            $uyari="Kayıt işlemi başarıyla tamamlandı";
        }
        else
        {
            $uyari= "Kayıt işlemi sırasında hata:".$error[2];
        }
    }
    echo $uyari;
}
?>