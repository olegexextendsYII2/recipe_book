<?php

use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;
use Slim\Http\Response;
use Slim\Http\Request;
use Slim\Container;
use Slim\Views\PhpRenderer;

class LoginController 
{
   
     protected $view;
     protected $container;

    public function __construct(ContainerInterface $container)
    {
         $this->container = $container; 
         $this->view = new PhpRenderer("../templates/");



    }


    
    public function index(Request $request,Response $response)
    {
        
        if (LoginModel::isUserLoggedIn()) {
           return $response->withRedirect('/', 301);
        } else {
           return $this->view->render($response ,"login.php");
        }
    }

   
    public function loginAction(Request $request,Response $response)
    {

        $parsedBody = $request->getParsedBody();

       
      
        $login_successful = LoginModel::login($parsedBody['user_name'],$parsedBody['user_password'],$this->container
        );
            
        if ($login_successful) {
                return $response->withRedirect('/', 301);
            } else {
                return $this->view->render($response ,"login.php");
            }
        
    }

   public  function logout(Request $request,Response $response)
    {
        LoginModel::logout();
        return $response->withRedirect('/', 301);
        
    }
   
}
