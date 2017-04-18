<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 3/1/17
 * Time: 11:04 AM
 */
if (!function_exists('encriptar')) {
    function encriptar($cadena)
    {
//        $key = 'sistema_fedd';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
//        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
//        return $encrypted; //Devuelve el string encriptado
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = '!Q"W#E$R%T&Y/U(I)O=P';
        $secret_iv = '!QA"WS#ED$RF%TG&YH/UJ(IK)OL=PÑ';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);


            $output = openssl_encrypt($cadena, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);

        return $output;

    }
}
if (!function_exists('desencriptar')) {
    function desencriptar($cadena)
    {
//        $key = 'sistema_fedd';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
//        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
//        return $decrypted;  //Devuelve el string desencriptado

        $encrypt_method = "AES-256-CBC";
        $secret_key = '!Q"W#E$R%T&Y/U(I)O=P';
        $secret_iv = '!QA"WS#ED$RF%TG&YH/UJ(IK)OL=PÑ';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);


        $output = openssl_decrypt(base64_decode($cadena), $encrypt_method, $key, 0, $iv);

        return $output;
    }
}

