<?php

if (!function_exists('generate_random_key')) {
    function generate_random_key($length = 32)
    {
        return bin2hex(random_bytes($length));  // Generate a random key of given length
    }
}

if (!function_exists('encrypting')) {
    function encrypting($data)
    {
        $key = generate_random_key();  // Generate a random key each time
        $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc')); // Generate a random IV
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
        
        // Encode the encrypted data, key, and IV into a string
        return base64_encode($encrypted . '::' . base64_encode($iv) . '::' . base64_encode($key));
    }
}

if (!function_exists('decrypting')) {
    function decrypting($data)
    {
        $data_parts = explode('::', base64_decode($data));

        // Retrieve the encrypted data, IV, and key
        $encrypted = $data_parts[0];
        $iv = base64_decode($data_parts[1]);
        $key = base64_decode($data_parts[2]);

        // Decrypt the data
        return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
    }
}
