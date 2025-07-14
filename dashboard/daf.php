<?php
require_once "database.php";
$id = $_GET['daf'];
$newselid = $db->find($id);
$datanew = [
    "id" => $id,
    "judul" => $newselid['judul'],
    "link" => $newselid['link'],
    "waktu" => $newselid['waktu'],
    "sitemap" => $newselid['sitemap'],
    "deskripsi" => $newselid['deskripsi'],
    "hashtag" => $newselid['hashtag'],
    "fotocaption" => $newselid['fotocaption'],
    "artikel" => $newselid['artikel'],
    "status" => "Draf",
    "gambar" => $newselid['gambar'],
];

$newup = $db->update($id, $datanew);
header('Location: '.$baseurl.'draf');