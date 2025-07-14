<?php
require_once "database.php";
if (isset($_POST['publik'])) {
    $judul = $_POST['judul'];
    // Link
    $link = $_POST['link'];
    $link = createSlug($link);
    $waktu = $_POST['waktu'];
    $sitemap = $_POST['sitemap'];
    $deskripsi = $_POST['deskripsi'];
    // Hashtag
    $hashtag = $_POST['hashtag'];
    $hashtag = createHashtag($hashtag);
    $fotocaption = $_POST['caption'];
    $write = nl2br(htmlspecialchars($_POST['write']));
    //image
    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif');
    $filefoto = $_FILES['fotos']['name'];
    $ukuran = $_FILES['fotos']['size'];
    $ext = pathinfo($filefoto, PATHINFO_EXTENSION);
    if(!in_array($ext,$ekstensi) ) {
    	session_start();
        $_SESSION['success'] = "<div class='fw-bold alert alert-danger text-center'>Artikel, Gagal di publikasikan!</div>";
        header('Location: '.$baseurl.'create');
        exit;
    }else{
        if ($ukuran < 1044070) {
            $xx = $rand.'_'.$filefoto;
		    move_uploaded_file($_FILES['fotos']['tmp_name'], '../ny-g/image/'.$xx);
            $data = [
                "id" => date('hisdmy'),
                "judul" => $judul,
                "link" => $link,
                "waktu" => $waktu,
                "sitemap" => $sitemap,
                "deskripsi" => $deskripsi,
                "hashtag" => "#".$hashtag,
                "fotocaption" => $fotocaption,
                "artikel" => $write,
                "status" => "Draf",
                "gambar" => $xx
            ];
            $dnins = $db->insert($data);
            if ($dnins) {
                $dbclone->insert($data);
                session_start();
                $_SESSION['success'] = "<div class='alert fw-bold alert-success text-center'>Artikel, Berhasil di publikasikan!</div>";
                header('Location: '.$baseurl.'draf');
                exit;
            } else {
                session_start();
                $_SESSION['success'] = "<div class='alert fw-bold alert-danger text-center'>Artikel, Gagal di publikasikan!</div>";
                header('Location: '.$baseurl.'create');
                exit;
            }
        }
    }
}
?>