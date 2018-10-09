<?php


use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;
use Slim\Http\Response;
use Slim\Http\Request;
use Slim\Container;
use Slim\Views\PhpRenderer;



class RegisterController 
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


            return $this->view->render($response ,"register.php");
        }
    }

    
    public function registerAction(Request $request,Response $response)
    {

        


        $registration_successful = RegistrationModel::registerNewUser($request,$this->container);

        if ($registration_successful) {
            return $response->withRedirect('/', 301);
        } else {
            return $response->withRedirect('/register', 301);
        }
    }

    
   

   
}
