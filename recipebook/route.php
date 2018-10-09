<?

$app->get('/register', \RegisterController::class . ':index');
$app->post('/register_action', \RegisterController::class . ':registerAction');
$app->get('/login', \LoginController::class . ':index');
$app->post('/login_action', \LoginController::class . ':loginAction');
$app->get('/logout', \LoginController::class . ':logout');




$app->get('/', \RecipeBookController::class . ':showRecipe');
$app->post('/add_recipe', \RecipeBookController::class . ':addRecipe');
$app->get('/author_office', \RecipeBookController::class . ':authorОffice');
$app->get('/delete_recipe/{id}', \RecipeBookController::class . ':deleteRecipe');
$app->get('/update_recipe/{id}', \RecipeBookController::class . ':updateRecipe');
$app->post('/update/{id}', \RecipeBookController::class . ':update');