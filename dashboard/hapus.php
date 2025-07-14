<?php
require_once "database.php";
$id = $_GET['hapus'];
$db->delete($id);
header('Location: '.$baseurl.'draf');
