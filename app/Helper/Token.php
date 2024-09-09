<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class Token
{


   public static function CreateToken($userEmail, $userID)
   {

      $key = env('JWT_SECRET');
      $payload = [
         'iss' => 'laravel-token',
         'iat' => time(),
         'exp' => time() + 60 * 60,
         'userEmail' => $userEmail,
         'userID' => $userID
      ];
      //Token Generate
      $jwt = JWT::encode($payload, $key, 'HS256');
      return $jwt;
   }

   public static function VerifyToken($token): string|object
   {
      // try {
      //    $key = env('JWT_SECRET');
      //    $decoded = JWT::decode($token, new Key($key, 'HS256'));
      //    return $decoded->userEmail;
      // } catch (Exception $e) {
      //    return 'unauthorized';
      // }

      try {
         if ($token == null) {
            return 'unauthorized';
         } else {
            $key = env('JWT_SECRET');
            $decoded = JWT::decode(
               $token,
               new Key($key, 'HS256')
            );
            return $decoded;
         }
      } catch (Exception $ex) {
         return 'unauthorized';
      }
   }
}
