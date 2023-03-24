<?php
require "../vendor/autoload.php";
require "dao/StudentsDao.class.php";

Flight::register('student_dao', "StudentsDao");

Flight::route("/", function(){
   echo "Hello from / route";
});

Flight::route("GET /students", function(){
   //echo "Hello from /students route";
   //$student_dao = new StudentsDao();
   //$results = Flight::student_dao()->get_all();
   //print_r($results);
   Flight::json(Flight::student_dao()->get_all());
});

Flight::route("GET /student_by_id", function(){
   Flight::json(Flight::student_dao()->get_by_id(Flight::request()->query['id']));
});

Flight::route("GET /students/@id", function($id){
   //echo "Hello from /students route";
   //$student_dao = new StudentsDao();
   //$results = $student_dao->get_by_id($id);
   //print_r($results);
   Flight::json(Flight::student_dao()->get_by_id($id));
});

Flight::route("DELETE /students/@id", function($id){
   //echo "Hello from /students route";
   //$student_dao = new StudentsDao();
   Flight::student_dao()->delete($id);
   Flight::json(['message' => "Student deleted successfully"]);
});

Flight::route("POST /student", function(){
   //echo "Hello from /students route";
  //$student_dao = new StudentsDao();
   $request = Flight::request()->data->getData();
   //$response = $student_dao->add($request);
   Flight::json(['message' => "Student added successfully",
                 'data' => Flight::student_dao()->add($request)
                ]);
});

Flight::route("PUT /student/@id", function($id){
   //echo "Hello from /students route";
   //$student_dao = new StudentsDao();
   $student = Flight::request()->data->getData();
   //$response = $student_dao->update($student, $id);
   Flight::json(['message' => "Student edit successfully",
                 'data' => Flight::student_dao()->update($student, $id)
                ]);
});

Flight::route("GET /students/@name", function($name){
   echo "Hello from /students route with name= ".$name;
});

Flight::route("GET /students/@name/@status", function($name, $status){
   echo "Hello from /students route with name = " . $name . " and status = " . $status;
});

Flight::start();
?>
