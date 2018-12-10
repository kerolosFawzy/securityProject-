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

    //to get new key
    public function init()
    {
        $res = openssl_pkey_new($this->config);
        openssl_pkey_export($res, Encryption::$privateKey);
        Encryption::$publicKey = openssl_pkey_get_details($res);
        Encryption::$publicKey = Encryption::$publicKey["key"];
    }


    //to encrypt @param ARRAY , and the key
    public function encryptData($data, $PublicKey)
    {
        openssl_public_encrypt($data, $encrypted, $PublicKey);
        return $encrypted;
    }


    //to decrypt @param JSON , and the key return ARRAY
    public function decryptData($encryptedData, $PrivateKey)
    {
        openssl_private_decrypt($encryptedData, $decrypted, $PrivateKey);
        return $decrypted;
    }

}