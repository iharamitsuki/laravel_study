<?php
use GoogleTranslate\GoogleTranslate;

// チャックノリスAPIの呼び出し
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://api.chucknorris.io/jokes/random');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$chuckNorrisFact = json_decode($response, true);

// 結果を翻訳
$text = $chuckNorrisFact['value'];
$from = "en"; // English
$to   = "ja"; // 日本語
$st = new GoogleTranslate($text, $from, $to);
$result = $st->exec();
?>

<html>
    <body>
    <h2>翻訳前</h2>
    <p><?= $text ?></p>
    <h2>翻訳後</h2>
    <p><?= $result ?></p>
    </body>
</html>
