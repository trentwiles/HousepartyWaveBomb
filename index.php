<?php

$token = $_GET["token"];

if(! $token)
{
  die("oops, you are going to need a token");
}


$url = 'https://api2.thehousepartyapp.com/me/relationships';
 
$ch = curl_init($url);
 
$customHeaders = array(
    'authorization: Bearer ${token}'
);
 
curl_setopt($ch, CURLOPT_HTTPHEADER, $customHeaders);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 
$result = curl_exec($ch);

$friends = json_decode($result, true);

foreach($friends as $friend)
{
  echo $friend["users"]["id"];
}
