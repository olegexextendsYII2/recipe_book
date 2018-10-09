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
 

class AdapterConteiner
{     
     
   
              
	  protected $container;

	

	
   public function __construct(ContainerInterface $container) {
       $this->container = $container; 
      
  	  
   }
 

    public function set() { 
    	
       
   }


    public function get() {

      return  $this->container;
		              


		    
		       
		   }



    

}  
// $name = $request->getAttribute('name');
              // $response->getBody()->write("office");
//Request $request,