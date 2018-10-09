<?php


class LoginModel
{
   
    public static function login($user_name, $user_password,$container)
    {


         
      
        if (empty($user_name) OR empty($user_password)) {
           
            return false;
        }

        

       
        $result = self::validateAndGetUser($user_name, $user_password,$container);

       
        if (!$result) {
            
            return false;
        }   
        
       self::setSuccessfulLoginIntoSession($result['user_name'], $result['user_email']);

       
        return true;
    }

   
    private static function validateAndGetUser($user_name, $user_password,$container)
    {
       
        $result = UserModel::getUserDataByUsername($user_name,$container);

       
        if (!$result) {

          
            return false;
        }

        
        if (!password_verify($user_password, $result['user_password_hash'])) {
            
            return false;
        }

       

        return $result;
    }


    
    public static function logout()
    {
        Session::init();

        

        Session::destroy();
       
    }

   
     


    public static function setSuccessfulLoginIntoSession( $user_name, $user_email)
    {
        Session::init();

       
        session_regenerate_id(true);
        $_SESSION = array();

        
        Session::set('user_name', $user_name);
        Session::set('user_email', $user_email);
       

        
        Session::set('user_logged_in', true);

       
       

    }


    public static function isUserLoggedIn()
    {
        return Session::userIsLoggedIn();
    }
}
