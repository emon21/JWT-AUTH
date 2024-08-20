<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class Token
{


   public static function CreateToken($userEmail)
   {

      $key = env('JWT_SECRET');
      $payload = [
         'iss' => 'laravel-token',
         'iat' => time(),
         'exp' => time() + 60 * 60,
         'userEmail' => $userEmail
      ];
      //Token Generate
      $jwt = JWT::encode($payload, $key, 'HS256');
      return $jwt;
   }

   function VerifyToken($token)
   {
      try {
         $key = env('JWT_SECRET');
         $decoded = JWT::decode($token, new Key($key, 'HS256'));
         return $decoded->userEmail;
      } catch (Exception $e) {
         return 'unauthorized';
      }
   }
}
