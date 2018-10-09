<?php

use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;
use Slim\Http\Response;
use Slim\Http\Request;
use Slim\Container;
use Slim\Views\PhpRenderer;


class RegistrationModel
{
   
    public static function registerNewUser($request, $container)
    {    


        $request_clean = $request->getParsedBody();
        $user_name = strip_tags($request_clean['user_name']);
        $user_email = strip_tags($request_clean['user_email']);       
        $user_password = $request_clean['user_password'];
       

       
         $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

       
         $return = true;

        if (UserModel::doesEmailAlreadyExist($user_email,$container)) { 
            
            $return = false;
        }

       if (!$return) return false;

        $user_activation_hash = sha1(uniqid(mt_rand(), true));
    
        if (!self::writeNewUserToDatabase($user_name, $user_password_hash, $user_email, time(), $user_activation_hash,$container)) {
            
            return false; // no reason not to return false here
        }

       
         return true;
    }

   
 
   
    public static function writeNewUserToDatabase($user_name, $user_password_hash, $user_email, $user_creation_timestamp, $user_activation_hash,$container)
    { 
        
         $db = $container['db'];   //var_dump($db['host']); die('ok3');
         $connect = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['dbname']);
        // write new users data into database
         $sql = "INSERT INTO users (user_name, user_password_hash, user_email, user_creation_timestamp, user_activation_hash, user_provider_type)
                    VALUES ('$user_name', '$user_password_hash', '$user_email', '$user_creation_timestamp', '$user_activation_hash', '$user_provider_type')";
       
        
        $res = mysqli_query($connect,$sql);
     
        if ( $res) {

           LoginModel::setSuccessfulLoginIntoSession($user_name, $user_email);

            return true;
        }

        return false;
    }

    
}
