<?php
include "../config/db.php";
include "fonksiyonlar.php";
session_start();
!OturumAcikmi() ? header("Location: login") : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Paneline Hoşgeldiniz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/stil.css">
    <script src="../assets/ckeditor/ckeditor.js"></script>
</head>
<body class="admin_bg">

    <div class="container">
     <div class="row m-5">
         <div class="col-md-12 text-center">
             <h1>Yönetim Paneli</h1>
         </div>
         <div class="col-md-12 text-center">
             <a href="cikis.php" class="btn btn-info btn-sm">Çıkış Yap</a>
         </div>
     </div>

        <form id="admin-form">
            <h4>Bilgiler</h4>
            <hr>
            <?php
            if (kayitlimi(1))
            {
                $kontrol = $baglan->prepare("SELECT * FROM blog");
                $kontrol->execute(array());
                $sonuc = $kontrol->fetch(PDO::FETCH_OBJ);
                ?>
                <div class="form-group">
                    <label>Site Başlığı</label>
                    <input type="text" class="form-control" name="title" value="<?=$sonuc->title;?>">
                </div>
                <div class="form-group">
                    <label>Site Açıklaması</label>
                    <input type="text" class="form-control" name="description" value="<?=$sonuc->description;?>">
                </div>
                <div class="form-group">
                    <label>Site Anahtar Kelimeleri</label>
                    <input type="text" class="form-control" name="keywords" value="<?=$sonuc->keywords;?>">
                </div>
                <div class="form-group">
                    <label>Site Yazarı</label>
                    <input type="text" class="form-control" name="author" value="<?=$sonuc->author;?>">
                </div>

                <h4 class="ust_bosluk">Site İçerik Bilgileri</h4>
                <hr>


                <div class="form-group">
                    <label>Hakkımda</label>
                    <div class="textarea">
                        <textarea name="hakkimda">
                            <?=($sonuc->hakkimda);?>
                        </textarea></div>
                        <script>
                            CKEDITOR.replace("hakkimda");

                        </script>
                    </div>

                    <div class="form-group">
                        <label>Deneyimler</label>
                        <div class="textarea">
                            <textarea name="deneyimler">
                               <?=($sonuc->deneyim);?>
                           </textarea>
                       </div>
                       <script>
                        CKEDITOR.replace("deneyimler");
                    </script>
                </div>

                <div class="form-group">
                    <label>Eğitimler</label>
                    <div class="textarea"><textarea name="egitimler" ><?=($sonuc->egitim);?></textarea></div>
                    <script>
                        CKEDITOR.replace("egitimler");
                    </script>
                </div>

                <div class="form-group">
                    <label>Projeler</label>
                    <div class="textarea"><textarea name="projeler"><?=($sonuc->proje);?></textarea></div>
                    <script>
                        CKEDITOR.replace("projeler");
                    </script>
                </div>

                <div class="form-group">
                    <label>Etkinlikler ve Konferanslar</label>
                    <div class="textarea"><textarea name="etkinlikler"><?=($sonuc->etkinlik);?></textarea></div>
                    <script>
                        CKEDITOR.replace("etkinlikler");
                    </script>
                </div>

                <div class="form-group">
                    <label>Yetenekler ve Beceriler</label>
                    <div class="textarea"><textarea name="yetenekler"><?=($sonuc->yetenek);?></textarea></div>
                    <script>
                        CKEDITOR.replace("yetenekler");
                    </script>
                </div>


                <div class="form-group">
                    <label class="ust_bosluk font-weight-bold">İletişim Bilgileri</label>
                    <hr>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Linkedin</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="linkedin" value="<?=$sonuc->linkedin;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="twitter" value="<?=$sonuc->twitter;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">İnstagram</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="instagram" value="<?=$sonuc->instagram;?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email adresiniz</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" value="<?=$sonuc->email;?>">
                    </div>
                </div>

                <div class="form-group text-right ">
                    <button type="button" class="btn btn-primary btn-lg btn-block btnkaydet">Bilgileri Kaydet</button>
                </div>

                <div class="form-group text-center row d-none uyari">
                    <div class="col-md-3"></div>
                    <div class="alert alert-info col-md-6 text-center"></div>
                    <div class="col-md-3"></div>
                </div>

            <?php  }  else  {  ?>


             <div class="form-group">
                <label>Web Site Başlığı</label>
                <input type="text" class="form-control" name="title" placeholder="Bir  başlık giriniz">
            </div>
            <div class="form-group">
                <label>Web Site Açıklaması</label>
                <input type="text" class="form-control" name="description" placeholder="Bir açıklama giriniz">
            </div>
            <div class="form-group">
                <label>Web Site Anahtar Aelimeler</label>
                <input type="text" class="form-control" name="keywords" placeholder="Anahtar kelimeleri giriniz">
            </div>
            <div class="form-group">
                <label>Web site Author</label>
                <input type="text" class="form-control" name="author" placeholder="Author giriniz">
            </div>

            <h4 class="ust_bosluk">Site İçerik Bilgileri</h4>
            <hr>


            <div class="form-group">
                <label>Hakkımda</label>
                <div class="textarea"><textarea name="hakkimda"></textarea></div>
                <script>
                    CKEDITOR.replace("hakkimda");
                </script>
            </div>

            <div class="form-group">
                <label>Deneyimler</label>
                <div class="textarea"><textarea name="deneyimler"></textarea></div>
                <script>
                    CKEDITOR.replace("deneyimler");
                </script>
            </div>

            <div class="form-group">
                <label>Eğitimler</label>
                <div class="textarea"><textarea name="egitimler"></textarea></div>
                <script>
                    CKEDITOR.replace("egitimler");
                </script>
            </div>

            <div class="form-group">
                <label>Projeler</label>
                <div class="textarea"><textarea name="projeler"></textarea></div>
                <script>
                    CKEDITOR.replace("projeler");
                </script>
            </div>

            <div class="form-group">
                <label>Etkinlikler ve Konferanslar</label>
                <div class="textarea"><textarea name="etkinlikler"></textarea></div>
                <script>
                    CKEDITOR.replace("etkinlikler");
                </script>
            </div>

                <div class="form-group">
                    <label>Yetenekler ve Becerileri</label>
                    <div class="textarea"><textarea name="yetenekler"></textarea></div>
                    <script>
                        CKEDITOR.replace("yetenekler");
                    </script>
                </div>


            <div class="form-group">
                <label class="ust_bosluk font-weight-bold">İletişim Bilgileri</label>
                <hr>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Linkedin</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="linkedin" placeholder="Linkedin url giriniz">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Twitter</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="twitter" placeholder="Twitter url giriniz">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">İnstagram</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="instagram" placeholder="İnstagram url giriniz">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email adresiniz</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="email" placeholder="Email adresinizi giriniz">
                </div>
            </div>

            <div class="form-group text-right ">
                <button type="button" class="btn btn-primary btn-lg btn-block btnkaydet">Bilgileri Kaydet</button>
            </div>

            <div class="form-group text-center row d-none uyari">
                <div class="col-md-3"></div>
                <div class="alert alert-info col-md-6 text-center"></div>
                <div class="col-md-3"></div>
            </div>
        <?php     }  ?>
    </form>

</div>

<div class="bg-dark text-center" style="margin-top: 250px;">
    <div class="footer-copyright py-3 text-white">© 2021 Copyright:
        <a href="https://github.com/nergulkahya">Nazlı GENÇEL</a>
    </div>
</div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="../assets/js/js.js"></script>