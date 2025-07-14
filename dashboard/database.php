<?php
require_once "access.php";
date_default_timezone_set('Asia/Jakarta');
$baseurl = "http://localhost:8000/dashboard/";
$baseurl_ny = "http://localhost:8000/ny-g/";
$db = new Database('db/database.json');
$dbclone = new Database('db/database-2.json');