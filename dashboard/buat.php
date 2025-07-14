<?php
session_start();
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Dany-g Panel</title>
        <link rel="stylesheet" href="../ny-g/bootstrap.min.css" type="text/css" media="all" />
        <style>
            *{
                border-box: box-sizing;
                padding: 0px;
                margin: 0px;
            }
            body{
                max-width: 768px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="p-3 bg-dark text-white">
            <h1 class="fw-bold m-0" style="font-size:18px;">DASH NY-GWAPES</h1>
        </div>
        <div class="p-3">
            <a class="btn btn-dark fw-bold" href="home">Kembali</a>
        </div>
        <div class="p-3 mb-4">
            <div class="my-2">
                <h2>Buat</h2>
                Buat artikel dengan mengisi formulir.
            </div>
            <?php
            if($_SESSION['success']){
                echo $_SESSION['success'];
            }
            unset($_SESSION['success']);
            ?>
            <form action="prosess-buat.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label for="Photo" class="fw-bold mb-2">Foto</label>
                    <input type="file" name="fotos" id="foto" class="form-control"/>
                </div>
                <div class="form-group mb-2">
                    <label for="Judul" class="fw-bold mb-2">Judul</label>
                    <input type="text" name="judul" id="judul" placeholder="Judul Artikel" class="form-control p-2"/>
                </div>
                <div class="form-group mb-2">
                    <label for="Link" class="fw-bold mb-2">Link</label>
                    <input type="text" name="link" id="link" placeholder="Link Artikel" class="form-control p-2"/>
                </div>
                <div class="form-group mb-2">
                    <label for="Waktu" class="fw-bold mb-2">Waktu</label>
                    <input type="text" name="waktu" id="waktu" value="<?php echo date('H:i M d Y'); ?>" class="form-control p-2"/>
                    <br>
                    <input type="text" name="sitemap" id="sitemap" value="<?php echo date('c'); ?>" class="form-control p-2"/>
                </div>
                <div class="form-group mb-2">
                    <label for="Deskripsi" class="fw-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id=deskripsi rows="5" cols="40" class="form-control" placeholder="Deskripsi"></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="Hashtag" class="fw-bold mb-2">Hashtag</label>
                    <input type="text" name="hashtag" id="hashtag" placeholder="#Hashtag" class="form-control p-2"/>
                </div>
                <div class="form-group mb-2">
                    <label for="Photo Caption" class="fw-bold mb-2">Foto Caption</label>
                    <input type="text" name="caption" id="caption" value="pictures-by@ny-gwapes" class="form-control p-2"/>
                </div>
                <div class="form-group mb-2">
                    <label for="Tulis Artikel" class="fw-bold mb-2">Tulis Artikel</label>
                    <textarea name="write" id=write rows="14" cols="40" class="form-control" placeholder="Tulis Artikel"></textarea>
                </div>
                <button type="submit" class="btn btn-dark" name="publik">Publikasi</button>
            </form>
        </div>
    </body>
</html>