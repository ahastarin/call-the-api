<?php
ini_set("display_errors",1);
function getCurl($url){
    // menginisialisasi curl
    $curl = curl_init();

    $logged_user_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY3Mzk1Nzk5MCwiZXhwIjoxNjczOTYxNTkwLCJuYmYiOjE2NzM5NTc5OTAsImp0aSI6IjZYZGZFd1p6SWxJZHZIZUUiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.P9bNQ0uNwC-01D_SZe_jbA_CI7Bslsk0Ec-wQZB6P5I";

    $headers = array(
      "Content-Type: application/json; charset=utf-8",
      "Authorization: Bearer " . $logged_user_token 
    );

  // mengatur url api
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL, $url);
    //mengatur yang dikembalikan curl, jika tru mengembalikan text json
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // mengeksekusi curl
    $result = curl_exec($curl);
    echo $result;


    // menutup curl
    curl_close($curl);
    
    // decode file json yang telah diterima
    return $result;
}

$user =  getCurl('http://127.0.0.1:8000/api/user');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p>hallo nama saya adalah, <?= $user ?></p>
  
</body>
</html>
