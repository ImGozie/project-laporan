<?php

if (!function_exists('decrypting')) {
    function decrypting($encryptedArgument)
    {
        $decrypted = openssl_decrypt(
            base64_decode($encryptedArgument),
            'AES-128-ECB',
            'secret-key',
            OPENSSL_RAW_DATA
        );

        return $decrypted;
    }
}

if (!function_exists('encrypting')) {
    function encrypting($argument)
    {
        $encrypted = openssl_encrypt(
            $argument,
            'AES-128-ECB',
            'secret-key',
            OPENSSL_RAW_DATA
        );

        return base64_encode($encrypted);
    }
}
