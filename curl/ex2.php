<?php
require_once 'lab1/Date.php';
$yearToSearch = $argv[2];
$valuteToSearch = $argv[1];
$date = new Date(1, 1, (int) $yearToSearch);
$dateStr = $date->format('ru');
$days = 1;
$valuteArray = [];
while ($dateStr != "31/12/{$yearToSearch}") {
    $cbrSite = "https://www.cbr.ru/scripts/XML_daily.asp?date_req={$dateStr}";

    $cbrCurl = curl_init($cbrSite);

    curl_setopt($cbrCurl, CURLOPT_HEADER, false);
    curl_setopt($cbrCurl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cbrCurl, CURLOPT_SSL_VERIFYPEER, false);

    $babkixml = curl_exec($cbrCurl);

    $babki = new SimpleXMLElement($babkixml);



    foreach ($babki->Valute as $a) {
        if ($a->CharCode == $valuteToSearch) {
            file_put_contents('USD.txt', file_get_contents('USD.txt') . $a->Value . "\t\t\t" . $dateStr . "\n");
        }
    }

    curl_close($cbrCurl);
    $days++;
    $dateStr = $date->plusDays($days, 'ru');
}