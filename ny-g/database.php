<?php
require_once "../dashboard/access.php";
date_default_timezone_set('Asia/Jakarta');
$baseurl_ny = "http://localhost:8000/ny-g/";
$db = new Database('../dashboard/db/database.json');
$dbdays = new Database('../dashboard/db/days.json');
$dbmonth = new Database('../dashboard/db/month.json');
$dbyears = new Database('../dashboard/db/years.json');



$datenow = date('d-m-Y');
$his = date('H:i:s');
$datefoo = $dbdays->findWaktu($datenow);

if($datefoo['waktu'] == $datenow){
    $nodays = [
        "waktu" => $datenow,
        "dilihat" => $datefoo['dilihat'] + 1
    ];
    $dbdays->updateWaktu($datenow,$nodays);
    if($his > "00:00:00" && $his < "23:59:00"){
        $monow = date('m-Y');
        $monowdate = $dbmonth->findWaktuMonth($monow);
        $view = $datefoo['dilihat'];
        if($monowdate['waktu'] === $monow){
            $nodays_ny = [
                "waktu" => $monow,
                "dilihat" => $monowdate['dilihat'] + 1
            ];
            $dbmonth->updateMonth($monow,$nodays_ny);
            if($his > "00:00:00" && $his < "23:59:00"){
                $yearsnow = date('Y');
                $yearsnow_ny = $dbyears->findWaktuYears($yearsnow);
                if($yearsnow_ny['waktu'] === $yearsnow){
                    
                    $nodays_ny2 = [
                        "waktu" => $yearsnow,
                        "dilihat" => $yearsnow_ny['dilihat'] + 1
                    ];
                    $dbyears->updateYears($yearsnow,$nodays_ny2);
                }else{
                    $nodays_ny2 = [
                        "waktu" => $yearsnow,
                        "dilihat" => $view
                    ];
                    $dbyears->insert($nodays_ny2);
                }
            }
        }else{
            $nodays_ny = [
                "waktu" => $monow,
                "dilihat" => $view
            ];
            $dbmonth->insert($nodays_ny);
        }
    }
}else{
    $nodays = [
        "waktu" => $datenow,
        "dilihat" => 1
    ];
    $dbdays->insert($nodays);
}