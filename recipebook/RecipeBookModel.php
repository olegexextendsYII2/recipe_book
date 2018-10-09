<? 

  

use Slim\Http\UploadedFile;


 
class RecipeBookModel 
{
     
       

      protected $container;
  
       public function __construct($container) {
       $this->container = $container;  
     
  }
 
 
    public function getAll() {

        $db = $this->container['db'];
        
        $connect = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['dbname']);

        
        $sql = 'SELECT*FROM recipes ';
        $res = mysqli_query($connect,$sql);
        $recipes = [];
        while($all = mysqli_fetch_assoc($res))
          {
        $recipes[] = $all; 
          }
        return $recipes;
          
   }



    public function save($request) {  


  

         $directory = $this->container['upload_directory'];

         $uploadedFiles = $request->getUploadedFiles();
         $recipe_all = $request->getParsedBody();
       
        $uploadedFile = $uploadedFiles['image'];

        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
           $image = $this->moveUploadedFile($directory, $uploadedFile);
        
         }else{ $image = 'noimage.gif'; }
        
            


             $db = $this->container['db'];
        
            $connect = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['dbname']);

            $title = $recipe_all['title'];
            $recipe = $recipe_all['recipe'];

       $sql = "INSERT INTO recipes (title,recipe,image) VALUES ('$title','$recipe','$image')"; 

            
              $res = mysqli_query($connect,$sql);
          
  }

        public function update( $id , $request )
           {


             $db = $this->container['db'];
                
            $connect = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['dbname']);
           

                      $directory = $this->container['upload_directory'];
              
                       $uploadedFiles = $request->getUploadedFiles();
                       $recipe_all = $request->getParsedBody();
                    
                        $uploadedFile = $uploadedFiles['image'];
                       

                      if ($uploadedFile->getError() === UPLOAD_ERR_OK) {


                         $recipe_image = $this->getAllById($id);
                      
                  
                          if($recipe_image['image'] !== 'noimage.gif')
                          {
                          $file_name = $directory.$recipe_image['image'];
                          unlink($file_name); 
                          }
                         $image = $this->moveUploadedFile($directory, $uploadedFile);
                      }else{ 

                        $recipe_image = $this->getAllById($id);
                        $image = $recipe_image['image']; 
                           }

                    


                     $title = $recipe_all['title'];
                     $recipe = $recipe_all['recipe'];
                      //$image = $file['name']; 
                        $sql = "UPDATE recipes SET  title = '$title', recipe = '$recipe',image = '$image' WHERE id = '$id'";
                        mysqli_query($connect,$sql);
          }

  public function remove($id)
   {

 

           $db = $this->container['db'];
           $directory = $this->container['upload_directory'];
           $connect = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['dbname']);
          

          $recipe = $this->getAllById($id);
          if($recipe['image'] !== 'noimage.gif')
          {

          $file_name = $directory.$recipe['image'];
          unlink($file_name); 
          }
          $sql = "DELETE FROM recipes WHERE id='$id'";   
          mysqli_query($connect,$sql);
  }



  public function getAllById($id)
   {

 
            
          $db = $this->container['db'];
          $recipes_id = $id;

       
            $connect = mysqli_connect($db['host'],$db['user'],$db['pass'],$db['dbname']);

          $sql = "SELECT*FROM recipes WHERE id = '$id'";
          $res = mysqli_query($connect,$sql); 
          $all =  mysqli_fetch_assoc($res);
          return $all;
  }



  protected function moveUploadedFile($directory, UploadedFile $uploadedFile)
{
    

    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $basename = bin2hex(random_bytes(8)); 
    $filename = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

    return $filename;
  }
      

}
   

