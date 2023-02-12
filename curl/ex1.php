<?php
$token = '5888653587:AAF1h2Nlwp07UYPyaq8ro80pur0kj9Zr7Tg';

$cbrSite = 'https://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $argv[2] . '/' . $argv[3] . '/2022';

$cbrCurl = curl_init($cbrSite);
$valuteToSearch = $argv[1];
curl_setopt($cbrCurl, CURLOPT_HEADER, false);
curl_setopt($cbrCurl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cbrCurl, CURLOPT_SSL_VERIFYPEER, false);

$babkixml = curl_exec($cbrCurl);

$babki = new SimpleXMLElement($babkixml);

$usdText = '';
foreach ($babki->Valute as $a) {
    if ($a->CharCode == $valuteToSearch) {
        $usdText = $valuteToSearch . ' = ' . $a->Value;
    }
}

curl_close($cbrCurl);


$website = "https://api.telegram.org/bot" . $token;
$chatId = '795885407';
$params = [
    'chat_id' => $chatId,
    'text' => $usdText,
];

$curl = curl_init($website . '/sendMessage');

curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($curl);
curl_exec($curl);
echo $result;
curl_close($curl);