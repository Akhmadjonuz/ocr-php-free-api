<?php

# Ushbu kod Ahmadjon Dadabayev tomonidan qaytadan yozib chiqarildi. uitc.uz platformasi uchun bajarildi 
# Mualliflik huquqi saqlansin!
# dadabayev.uz
# +998902224311
# @Akhmadjon

# This code was rewritten by Ahmadjon Dadabayev. Done for the uitc.uz platform
# Copyright reserved!
# dadabayev.uz
# +998902224311
# @Akhmadjon

# Этот код был переписан Ахмаджоном Дадабаевым. Сделано для платформы uitc.uz
# Авторские права защищены!
# dadabayev.uz
# +998902224311
# @Akhmadjon

error_reporting(0);
$image      = new CURLFILE("image.jpg"); // image location
$api        = 'donotstealthiskey3589';
$language   = 'ar'; 
$mode       = ( $language == 'ar' ) ? $lang = 'ara' : 'eng';
Function ocr($image, $api, $mode)
{
   $url  = 'https://api8.ocr.space/parse/image';
   $ch   = curl_init($url);
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   curl_setopt($ch, CURLOPT_POST, 1);
   $headers    = array();
   $headers[]  = 'accept: application/json, text/javascript, */*; q=0.01';
   $headers[]  = 'content-type: multipart/form-data';
   $headers[]  = 'origin: https://ocr.space';
   $headers[]  = 'referer: https://ocr.space/';
   $headers[]  = 'apikey: ' . $api;
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // u can replace these chose to your choise user-agent
   curl_setopt($ch, CURLOPT_POSTFIELDS, ["file" => $image, "url"=> "null", "language"=> $mode, "isOverlayRequired"=> "true", "FileType"=> ".Auto", "IsCreateSearchablePDF"=> "false", "isSearchablePdfHideTextLayer"=> "true", "detectOrientation"=> "false", "isTable"=> "false", "scale"=> "true", "OCREngine"=> "1", "detectCheckbox"=> "false", "checkboxTemplate"=> "0"]);
   $response = curl_exec($ch);
   curl_close($ch);
   echo $response;
}
echo ocr($image, $api, $mode);
