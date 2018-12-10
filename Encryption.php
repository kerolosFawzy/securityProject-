<?php

class Encryption
{
       private $config = array(
        "digest_alg" => "sha512",
        "private_key_bits" => 4096,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    );

    public static $publicKey;
    public static $privateKey;

    public function __construct()
    {
        if (!isset($publicKey)) {
            $res = openssl_pkey_new($this->config);
            openssl_pkey_export($res, Encryption::$privateKey);
            Encryption::$publicKey = openssl_pkey_get_details($res);
            Encryption::$publicKey = Encryption::$publicKey["key"];
        }

    }

    public function encryptData($data)
    {
        $dataJson = json_encode($data);
        openssl_public_encrypt($dataJson, $encrypted, Encryption::$publicKey);
        return $encrypted;
    }

    public function decryptData($encryptedData)
    {
        openssl_private_decrypt($encryptedData, $decrypted, Encryption::$privateKey);
        $dataArray = json_decode($decrypted);
        return $dataArray;
    }

}