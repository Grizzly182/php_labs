<?php
$token = '5888653587:AAF1h2Nlwp07UYPyaq8ro80pur0kj9Zr7Tg';

$website = "https://api.telegram.org/bot" . $token;
$chatId = '1380272965';
$params = [
    'chat_id' => $chatId,
    'text' => 'ДАААААААААААААААААААААААААААНННННННННИИИИИИИИИИИККККККККККККККК ППППППППРРРРРРРИИИИИИИИВВВВЕЕЕЕЕЕТТТТТТТТТТТТТТТ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!'
];

$curl = curl_init($website . '/sendMessage');

curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, ($params));
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($curl);
for ($i = 0; $i < 100; $i++) {
    curl_exec($curl);
}
echo $result;
curl_close($curl);