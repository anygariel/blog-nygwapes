<?php 
require "database.php";
$id = $_GET['uid'];
$newsel = $db->find($id);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?= $newsel['judul']; ?> | Ny-g wapes">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://ny-g.wapes.web.id/">
    <meta property="og:image" content="https://ny-g.wapes.web.id/image/<?= $newsel['gambar']; ?>">
    <meta property="og:description" content="<?= $newsel['deskripsi']; ?>">
    <meta property="og:site_name" content="<?= $newsel['judul']; ?>">
    <meta property="og:locale" content="en_US">

    <!-- Optional: Twitter Card Tags -->
    <meta name="twitter:card" content="https://ny-g.wapes.web.id/image/<?= $newsel['gambar']; ?>">
    <meta name="twitter:title" content="<?= $newsel['judul']; ?>">
    <meta name="twitter:description" content="<?= $newsel['deskripsi']; ?>">
    <meta name="twitter:image" content="https://ny-g.wapes.web.id/image/<?= $newsel['gambar']; ?>">
    <link rel="stylesheet" href="<?= $baseurl_ny; ?>bootstrap.min.css" type="text/css" media="all" />
    <title><?= $newsel['judul']; ?> | Ny-g Wapes</title>
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
            <a class="text-decoration-none text-dark fw-bold" href="<?= $baseurl_ny; ?>home">🫠 Home</a> 
            <span class="mx-1 text-dark">~</span>
            <span class="text-decoration-none text-dark fw-bold">Blog Portal</span> 
        </div>
        <?php
        
        ksort($newsel);
        ?>
        <div>
            <div class="p-3">
                <h2 class="fw-bold">
                    <?= $newsel['judul']; ?>
                </h2>
                      🌤️ Ny-gwapes  | <?= $newsel['waktu']; ?>
              <div class="mt-2">
                    <?= $newsel['deskripsi']; ?>
              </div>
              </div>
            <style>
                  .cad-img img{
                      width: 100%;
                      height: 200px;
                      object-fit: cover;
                  }
                  @media (min-width:591px){
                      .cad-img img{
                          height: 370px;
                      }
                  }
              </style>
            <div class="cad-img">
                  <img src="<?= $baseurl_ny; ?>image/<?= $newsel['gambar']; ?>" alt="<?= $newsel['judul']; ?>" />
                  <div class="text-center py-1">
                      <small class="text-secondary">Image from <?= $newsel['fotocaption']; ?></small>
                  </div>
              </div>
            <div class="px-3">
                <div class="my-2">
                    <?= htmlspecialchars_decode($newsel['artikel']); ?>
                </div>
                <div class="my-2">
                    <?= $newsel['hashtag']; ?>
                </div>
            </div>
        </div>
                    <div class="m-3">
                        <div class="mb-2">
                            <b>Page Preview</b>
                            <?php
                            $nys = $dbdays->findWaktu($datenow);
                            $monow_nys = date('m-Y');
                            $yearsnow_nys = date('Y');
                            $nys_ny = $dbmonth->findWaktuMonth($monow_nys);
                            $nys_nys = $dbyears->findWaktuYears($yearsnow_nys);
                            ?>
                            <br>
                            <?= $nys['dilihat']; ?> One Days <span class="mx-2">|</span> <?= $nys_ny['dilihat']; ?> Monthly <span class="mx-2">|</span> <?= $nys_nys['dilihat']; ?> Yearsly
                        </div>
                🧸 <b>About Us</b><br><br />
                I'm Web Developers, I Freelancer from Indonesian. I to like Motivation and Inpirations for education, technology and programming. <br /><br>🍄 <b>Skill</b><br><br /> My skill in programming on lang PHP and Javascript, i can to making social media, tranding portal news, panel control scripting "bussiness, edu, e-commerce, database and admin panel, Linux Ubuntu, and blogging" so experince's for working a +7 years.
                <div class="my-2">
                    <a class="btn btn-dark fw-bold" href="mail-to:neilaffyofficial@gmail.com">🎭 Hire Me!</a>
                </div>
            </div>
        <?php  ?>
            <div class="m-3">
                © 2025 NY-G Dev.
            </div>
    </body>
</html>