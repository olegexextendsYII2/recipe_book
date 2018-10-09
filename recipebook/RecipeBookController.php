<? 
//namespace recipe;

use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;
use Slim\Http\Response;
use Slim\Http\Request;
use Slim\Container;
use Slim\Views\PhpRenderer;
//use RecipeBook;


//require 'RecipeBook.php';
 

class RecipeBookController 
{     
     protected $auth;
     protected $view;
     protected $container;
     protected $recipe_book;

  
   public function __construct(ContainerInterface $container) {
       $this->container = $container; 
       $this->recipe_book = new RecipeBookModel($container);
       $this->view = new PhpRenderer("../templates/");
       $this->auth = new Auth();
         // $this->recipe_book = new RecipeBook();
      
   }
 

    public function showRecipe(Request $request,Response $response) { 


    	

    	       $test_auth = $this->auth->check();
             $recipes = $this->recipe_book->getAll(); 
         
    	      
             return $this->view->render($response ,"test.php",[ "recipes" => $recipes,
         														"test_auth" => $test_auth]);
    
   }


    public function authorОffice(Request $request,Response $response) {
		              
         if (!$this->auth->check()) {
             return $response->withRedirect('/', 301);
            }  

		    return $this->view->render($response ,"author_office.php");
		       
		   }



    public function addRecipe(Request $request,Response $response) {         

		   $this->recipe_book->save($request);

		  return $response->withRedirect('/', 301);

		   }



    public function deleteRecipe(Request $request,Response $response,$args) {  

       if (!$this->auth->check()) {
             return $response->withRedirect('/', 301);
            }         

		   $this->recipe_book->remove((int)$args['id']);

		   return $response->withRedirect('/', 301);

		   }

     public function updateRecipe(Request $request,Response $response,$args) {   

          if (!$this->auth->check()) {
             return $response->withRedirect('/', 301);
            }  
            

		   $recipe = $this->recipe_book->getAllById((int)$args['id']);

		   return $this->view->render($response ,"author_update_office.php",[ "recipe" => $recipe]);

		   }


     public function update(Request $request,Response $response,$args) {         

		   $recipe = $this->recipe_book->update((int)$args['id'],$request);

		   
           return $response->withRedirect('/', 301);
		   }




}  
// $name = $request->getAttribute('name');
              // $response->getBody()->write("office");
//Request $request,