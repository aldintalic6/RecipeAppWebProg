<?php

require_once "../vendor/autoload.php";   
require_once ("dao/ProjectDao.class.php");

Flight::register("dao", "ProjectDao");

Flight::route("/", function() {

    echo "Hello world";
});

Flight::route("GET /users", function() {     // Get all users

    // dao = new ProjectDao() <- don't need this
    // $results = Flight::dao()->getAll();
    Flight::json(Flight::dao()->getAll());
 });

Flight::route("GET /user/@id", function($id) {     // Get users by id 

   Flight::json(Flight::dao()->getUserByID($id));
});

Flight::route("GET /user_by_id", function() {     // Get users by id with query

    $id = Flight::request() -> query['id'];
    Flight::json(Flight::dao()->getUserByID($id));
 });

Flight::route("DELETE /users/@id", function($id) {   // Delete user by id

    Flight::dao() -> deleteByID($id);
    Flight::json(["message" => "Student with id " . $id . " deleted successfully"]);
});

Flight::route("POST /user", function() {   

    $request = Flight::request()->data->getData();
    Flight::json(["message" => "Student added successfully", "data: " => Flight::dao() -> insertData($request)]);
});

Flight::route("PUT /user/@id", function($id) {   

    $request = Flight::request()->data->getData();
    // $request['id'] = $id;     Another way to show id         
    Flight::json(["message" => "Student updated successfully", "data: " => Flight::dao() -> updateData($request, $id)]);
});

Flight::start();    

?>
