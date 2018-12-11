<?php

include_once 'Encryption.php';

$en = new Encryption();
$en->init();


$password_plain =array('message'=>'hi',
    'name'=>'kero',
    'emial'=>'kero@gmail.com');
$data = json_encode($password_plain);
$encrypted = $en->encryptData($data , Encryption::$publicKey);
echo $encrypted;
echo '<br><br><br>';

print_r( $en->decryptData($encrypted , Encryption::$privateKey));


echo '<br>'. Encryption::$privateKey ;