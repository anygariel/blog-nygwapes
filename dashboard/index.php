<?php

session_start();
require_once "database.php";

$newsel = $db->readAll();


?>
<!DOCTYPE html>
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
            <h1 class="fw-bold m-0">DASH NY-G</h1>
        </div>
        <div class="p-3">
            <a class="btn btn-dark fw-bold" href="create">Buat</a>
            <a class="btn btn-dark fw-bold" href="draf">Draf</a>
        </div>
        <div class="px-3">
            <?php
            
            krsort($newsel);
            foreach ($newsel as $row){
            
            
            if($row['status'] == "Publish"){
            ?>
            <div class="card-g mb-3">
                <div style="display:flex;justify-content:center;align-items:center;">
                        <style>
                            .cad-img img{
                                width: 100%;
                                height: 390px;
                                object-fit: cover;
                            }
                        </style>
                        <div class="col-4 cad-img">
                            <img src="<?php echo $baseurl_ny; ?>image/<?= $row['gambar']; ?>" alt="" />
                        </div>
                        <div class="col-8 p-3">
                            <h2><?=  substr($row['judul'],0,49); ?>..</h2>
                            <div class="my-2">
                                Ny-gwapes | <?=  $row['waktu']; ?>
                            </div>
                            <div class="mb-2">
                                <?=  substr($row['deskripsi'],0,80); ?>
                            </div>
                            <div class="mb-2">
                                <a class="text-decoration-none fw-bold text-dark" href="<?php echo $baseurl; ?>draf/<?php echo $row['id']; ?>">Draf</a>
                                
                                | 
                                
                                                                <a class="text-decoration-none fw-bold text-dark" href="<?php echo $baseurl_ny; ?>page/<?php echo $row['id']; ?>/<?php echo $row['link']; ?>">Lihat</a>

                            </div>
                        </div>
                    </div>
            </div>
            
            <?php 
            }
            }
            ?>
        </div>
    </body>
</html>