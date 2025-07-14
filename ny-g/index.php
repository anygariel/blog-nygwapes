<?php 
require "database.php";
$newsel = $db->readAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Ny-g Wapes">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://ny-g.wapes.web.id/">
    <meta property="og:image" content="https://ny-g.wapes.web.id/image.jpg">
    <meta property="og:description" content="Escape for coding projects by ny-g and publish in hosted ubuntu.">
    <meta property="og:site_name" content="Saving Your Activity for Escape Blogging at Official">
    <meta property="og:locale" content="en_US">

    <!-- Optional: Twitter Card Tags -->
    <meta name="twitter:card" content="https://ny-g.wapes.web.id/image.jpg">
    <meta name="twitter:title" content="Saving Your Activity for Escape Blogging at Official">
    <meta name="twitter:description" content="Escape for coding projects by ny-g and publish in hosted ubuntu.">
    <meta name="twitter:image" content="https://ny-g.wapes.web.id/image.jpg">

    <link rel="stylesheet" href="<?= $baseurl_ny; ?>bootstrap.min.css" type="text/css" media="all" />
    <title>Ny-g Wapes | Saving Your Activity for Escape Blogging at Official</title>
        <style>
            * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            }
        </style>
    </head>
    <body style="max-width:768px;margin:0 auto;">
        <div class="navbar p-3 bg-white text-dark">
            <h1 class="fw-bold m-0">🧑‍🏫 NY-GWAPES</h1>
        </div>
        <div class="px-3">
            <a class="text-decoration-none text-dark fw-bold" href="home">🫠 Home</a> 
            <span class="mx-1 text-dark">~</span>
            <span class="text-decoration-none text-dark fw-bold">Blog Portal</span> 
        </div>
        <div class="p-3">
            <?php 
                foreach ($newsel as $row){
                    
            if($row['status'] === "Publish"){
            ?>
            <div class="card-gh">
                <h2 class="fw-bold"><?= $row['judul']; ?></h2>
              🌤️ Ny-gwapes  | <?= $row['waktu']; ?>
                <div class="my-2">
                    <?= substr($row['deskripsi'],0,152); ?>...
                    <br>
                    <?= $row['hashtag']; ?>
                </div>
                <div class="my-2">
                    <a class="text-dark" href="<?= $baseurl_ny; ?>page/<?= $row['id']; ?>/<?= $row['link']; ?>">Baca Selengkapnya</a>
                </div>
            </div>
            <?php
                }
                }
            ?>

            <div class="my-3">
                © 2025 NY-G Dev.
            </div>
        </div>
    </body>
</html>