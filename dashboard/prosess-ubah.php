<?php

require_once "database.php";
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $link = $_POST['link'];
    $waktu = $_POST['waktu'];
    $sitemap = $_POST['sitemap'];
    $deskripsi = $_POST['deskripsi'];
    $hashtag = $_POST['hashtag'];
    $fotocaption = $_POST['caption'];
    $write = $_POST['write'];
    $fotos = $_POST['fotos'];

    $dataposts = [
        "id" => $id,
        "judul" => $judul,
        "link" => $link,
        "waktu" => $waktu,
        "sitemap" => $sitemap,
        "deskripsi" => $deskripsi,
        "hashtag" => $hashtag,
        "fotocaption" => $fotocaption,
        "artikel" => $write,
        "status" => "Draf",
        "gambar" => $fotos
    ];
    $db->update($id, $dataposts);

    session_start();
    $_SESSION['success'] = "<div class='alert fw-bold alert-success text-center'>Artikel, Berhasil di publikasikan!</div>";
    header('Location: '.$baseurl.'draf');
    exit;
}