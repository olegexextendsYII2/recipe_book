<?php


class Session
{
   
    public static function init()
    {
        // if no session exist, start the session
        if (session_id() == '') {
            session_start();
        }
    }

    
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];

            
            return $value;
        }
    }

   
    public static function add($key, $value)
    {
        $_SESSION[$key][] = $value;
    }

  
    public static function destroy()
    {
        session_destroy();
    }

   
    public static function userIsLoggedIn()
    {
        return (self::get('user_logged_in') ? true : false);
    }
}
