<?php

require_once("rest/dao/ProjectDao.class.php");
$dao = new ProjectDao();

$type = $_REQUEST['type'];

switch ($type) {
    case 'add':

        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $age = $_REQUEST['age'];
        $dao->insertData($firstName, $lastName, $age);
        break;

    case 'delete':

        $id = $_REQUEST['id'];
        $dao->deleteData($id);
        break;

    case 'update':

        $id = $_REQUEST['id'];
        $firstName = $_REQUEST['firstName'];
        $lastName = $_REQUEST['lastName'];
        $age = $_REQUEST['age'];
        $dao->updateData($id, $firstName, $lastName, $age);
        break;

    case 'get':

        default:                       // If we don't provide any parameter in URL get will execute
        $results = $dao->getAll();
        print_r($results);
        break;
        
}

?>