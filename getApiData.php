<?php
include_once 'Encryption.php';
$encryp = new Encryption();
$encryp->init();
$myid = "gdfgh";
$encryptedId = $encryp->encryptData($myid, Encryption::$publicKey);
$email = $_GET['userEmail'];
$service_url = 'https://supermarketsecurity.000webhostapp.com/api/user/readByEmail.php?id=' . $encryptedId
    . '&email=' . $email .'&key=' . Encryption::$privateKey;


//$curl = curl_init($service_url);
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//$curl_response = curl_exec($curl);
//if ($curl_response === false) {
//    $info = curl_getinfo($curl);
//    curl_close($curl);
//    die('error occured during curl exec. Additioanl info: ' . var_export($info));
//}
//curl_close($curl);
//$decoded = json_decode($curl_response);
//print_r($decoded);
//

header('location: https://supermarketsecurity.000webhostapp.com/api/user/readByEmail.php?id=1232&email=fsdgdeg&key=234234' );