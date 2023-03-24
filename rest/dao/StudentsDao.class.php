<?php

class StudentsDao{

    private $conn;

    /**
    * Class constructor used to establish connection to db
    */
    public function __construct(){
        try {
          $servername = "localhost";
          $username = "root";
          $password = "80sarajevo";
          $schema = "web-project-2";
          $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
          // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
    * Method used to get all students from database
    */
    public function get_all(){
        $stmt = $this->conn->prepare("SELECT * FROM students");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
    * Method used to get student by id from database
    */
    public function get_by_id($id){
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll();
    }

    /**
    * Method used to get add student to database
    * string $first_name: First name is the first name of the student
    */
    public function add($student){
        $stmt = $this->conn->prepare("INSERT INTO students (first_name, last_name) VALUES (:first_name, :last_name)");
        $stmt->execute($student);
        $student['id'] = $this->conn->lastInsertId();
        return $student;
    }

    /**
    * Method used to get update student from database
    */
    public function update($student, $id){
        $student['id'] = $id;
        $stmt = $this->conn->prepare("UPDATE students SET first_name = :first_name, last_name=:last_name WHERE id=:id");
        $stmt->execute($student);
        return $student;
    }

    /**
    * Method used to get delete student from database
    */
    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id = :id");
        $stmt->bindParam(':id', $id); #prevent SQL injection
        $stmt->execute();
    }
}



 ?>
