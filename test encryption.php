<?php
$encryption_key_256bit = base64_encode(openssl_random_pseudo_bytes(32));

function my_encrypt($data, $key) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // Generate an initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
    return base64_encode($encrypted . '::' . $iv);
}

function my_decrypt($data, $key) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

$password_plain =array('message'=>'hi',
    'name'=>'kero',
    'emial'=>'kero@gmail.com');
$data = json_encode($password_plain);


echo $data . "<br>";

//our data being encrypted. This encrypted data will probably be going into a database
//since it's base64 encoded, it can go straight into a varchar or text database field without corruption worry
$password_encrypted = my_encrypt($data, $encryption_key_256bit);
echo $password_encrypted . "<br>";

//now we turn our encrypted data back to plain text
$password_decrypted = my_decrypt($password_encrypted, $encryption_key_256bit);
echo $password_decrypted . "<br>";