<?php

/**
 * Plugin Name: JWT PLUGIN
 * Author: Rodrigo.
 */

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtPlugin
{
    public function __construct()
    {
        require_once plugin_dir_path(__FILE__).'/vendor/autoload.php';
    }

    public function createToken()
    {
        $key = 'example_key';
        $payload = [
            'iss' => 'http://example.org',
            'aud' => 'http://example.com',
            'iat' => 1356999524,
            'nbf' => 1357000000,
        ];

       
        $jwt = JWT::encode($payload, $key, 'HS256');
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        print_r($jwt);

        
        // $decoded = JWT::decode($jwt, new Key($key, 'HS256'), $headers = new stdClass());
        // print_r($headers);

       

        // $decoded_array = (array) $decoded;

        
        // JWT::$leeway = 60; // $leeway in seconds
        // $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
    }
}

$jwtPlugin = new JwtPlugin();

$jwtPlugin->createToken();