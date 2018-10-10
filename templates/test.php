<? require 'header.php'; ?>

 
     <div class="back-top" id="back-top">
      <a href="/" class="btn btn-block btn-lg btn-danger">рецепты</a>
    </div>

 <? 

		 foreach ($recipes as  $value) {
			$value['image'];
		}
		foreach ($recipes as  $value)
			{
				echo $value['title']. '<br>';
				echo $value['recipe'].'<br>';

				echo $value['id'].'<br>';
				echo '<img src = "uploads/'.$value['image'].'" width = 200 />'.'<br><br><br>';
		if($test_auth){
				echo '<a href = "/delete_recipe/'.$value['id'].'">удалить</a> '.'<br>';
				echo '<a href = "/update_recipe/'.$value['id'].'">редaктировать</a> '.'<br>';
				}
		}

		if($test_auth){
			echo '<a href = "/author_office'.'">добавить</a> '.'<br>';
		}else{
			
			echo '<a href = "/register'.'">регистрация</a> '.'<br>';
		    echo '<a href = "/login'.'">авторизация</a> '.'<br>';
		}

		require 'footer.php'; 