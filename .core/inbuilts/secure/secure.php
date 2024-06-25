<?php

// secure data by filtering
function secure_data ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to encrypt data
function encryptData($data, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

// Function to decrypt data
function decryptData($data, $key) {
    $parts = explode('::', base64_decode($data));
    $encrypted = $parts[0];
    $iv = $parts[1];
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
}