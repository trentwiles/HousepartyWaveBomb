<?php

$token = "YOUR_TOKEN_HERE";

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
//die($result);


$friends = json_decode($result, true);

$better = $friends["users"];

$list = array();

foreach($better as $betters)
{
        echo "Preparing to wave to friend ID " . $betters["id"] . " (" . $betters["username"] . ") \n";
        array_push($list, $betters["id"]);
}

function greet($id)
{
  $greet = 'https://api2.thehousepartyapp.com/users/${id}/greet';
  $ch = curl_init($greet);
  $post_data = array();

  $customHeaders = array(
    'authorization: Bearer ${token}'
  );

  curl_setopt($ch, CURLOPT_HTTPHEADER, $customHeaders);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); 
  $result = curl_exec($ch);
  return true;
}

greet("5eb71fc7eb641d4208858625");

foreach($list as $users)
{
  greet($user);
  sleep(1); // delay to prevent ratelimits
}
