<?php
require_once("rest/dao/StudentsDao.class.php");
$student_dao = new StudentsDao();

$type = $_REQUEST['type'];

switch ($type) {
    case 'add':
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $results = $student_dao->add($first_name, $last_name);
        print_r($results);
        break;
    case 'delete':
        $id = $_REQUEST['id'];
        $student_dao->delete($id);
        break;
    case 'update':
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $id = $_REQUEST['id'];
        $student_dao->update($first_name, $last_name, $id);
        break;
    case 'get':
    default:
        $results = $student_dao->get_all();
        print_r($results);
        break;
}



 ?>
