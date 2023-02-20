<?php

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'https://favqs.com/api/qotd');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($curl);

curl_close($curl);
$decodedJson = json_decode($result);

echo $decodedJson->quote->body;