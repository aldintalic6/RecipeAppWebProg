<?php

require_once "../vendor/autoload.php";   

require_once ("services/UserService.php");
require_once ("services/RecipeService.php");

Flight::register("user_service", "UserService");
Flight::register("recipe_service", "RecipeService");

require_once "routes/UsersRoutes.php";
require_once "routes/RecipesRoutes.php";


Flight::start();    

?>
