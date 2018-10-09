<?php


class UserModel
{
    
  
    public static function doesEmailAlreadyExist($user_email,$container)
    {
        

 
         $db = $container['db'];   //var_dump($db['host']); die('ok3');
        
        $connect = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['dbname']);

        
        $sql = "SELECT user_id FROM users WHERE user_email = '$user_email' LIMIT 1" ;
        $res = mysqli_query($connect,$sql);
        $all = mysqli_fetch_assoc($res);



       if ($all == null) {
             return false;
        }
       
       
     return true;
    }

  
   
    public static function getUserDataByUsername($user_name,$container)
    {

        
        $db = $container['db'];   
        
        $connect = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['dbname']);

        $sql = "SELECT user_id, user_name, user_email, user_password_hash, user_active,user_deleted, user_suspension_timestamp, user_account_type,
                       user_failed_logins, user_last_failed_login
                  FROM users
                 WHERE (user_name = '$user_name')
                      
                 LIMIT 1";
        $db = $container['db'];   //var_dump($db['host']); die('ok3');
        
        $connect = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['dbname']);
        $res = mysqli_query($connect,$sql);
         $all = mysqli_fetch_assoc($res);


        // return one row (we only have one result or nothing)
        return  $all;
    }

   
}
