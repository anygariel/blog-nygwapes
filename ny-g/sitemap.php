<?php
   header('Content-type: application/xml');
   include "database.php"; //nama file koneksi database Anda
   $query = $db->readAll();
   echo "<?xml version='1.0' encoding='UTF-8'?>"."\n";
   echo "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>"."\n";
   echo " ";
   foreach($query as $data){
       echo "<url>";
       echo "<loc>".$baseurl_ny."page/".$data['id']."/".$data['link']."</loc>";
       echo "<lastmod>".$data['sitemap']."</lastmod>";
       echo "<priority>1.00</priority>";
       echo "</url>";
   }
   echo "</urlset>";
?>