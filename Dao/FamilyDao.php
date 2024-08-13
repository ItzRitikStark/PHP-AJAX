<?php
require_once ('connection.php');
require_once (realpath($_SERVER["DOCUMENT_ROOT"]) . '/PHP_AJAX/Core/Family.php');
class FamilyDao
{
    function viewFamily($id)
    {
        global $con;
        $View_sql = "SELECT * FROM `test_1` Where `id` = '$id'";
        $View_result = $con->query($View_sql);
        while ($row = $View_result->fetch_assoc()) {
            $family[] = new Family($row['id'], $row['first_name'], $row['last_name'], $row['hometown'], $row['age'], $row['job']);

        }
        return $family;
    }
    function getAll()
    {
        global $con;
        $View_sql = "SELECT * FROM `test_1`";
        $View_result = $con->query($View_sql);
        while ($row = $View_result->fetch_assoc()) {
            $family[] = new Family($row['id'], $row['first_name'], $row['last_name'], $row['hometown'], $row['age'], $row['job']);

        }
        return $family;
    }

    function getAllName()
    {
        global $con;
        $View_sql = "SELECT * FROM `test_1`";
        $View_result = $con->query($View_sql);
        while ($row = $View_result->fetch_assoc()) {
            $name[] = new Family(
                $row['id'],
                $row['first_name'],
                $row['last_name'],
                $row['hometown'],
                $row['age'],
                $row['job']
            );
        }
        return $name;
    }

    function addFamily($obj)
    {
        global $con;
        $id = $obj->getId();
        $first_name = $obj->getfirst_name();
        $last_name = $obj->getlast_name();
        $hometown = $obj->gethometown();
        $age = $obj->getage();
        $job = $obj->getjob();

        $sql = "INSERT INTO `test_1`(`id`, `first_name`, `last_name`, `hometown`,`age`,`job`) VALUES ('$id','$first_name','$last_name','$hometown','$age','$job')";
        $result = $con->query($sql);
        return $result;
    }

    function UpdateFamily($obj){
        global $con;
        $id = $obj->getId();
        $first_name = $obj->getfirst_name();
        $last_name = $obj->getlast_name();
        $hometown = $obj->gethometown();
        $age = $obj->getage();
        $job = $obj->getjob();

        $sqlUpdate = "UPDATE `test_1` SET `id`='$id',`first_name`='$first_name',`last_name`='$last_name',`hometown`='$hometown',`age`='$age',`job`='$job' WHERE `id` = '$id'";
        $result = $con->query($sqlUpdate);

        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
function DeleteFamily($id) {
    global $con;
        $delete = "DELETE FROM `test_1` WHERE `id` = '$id'";
        if (!empty($delete)) {
            $result = $con->query($delete);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

}

function searchBYName($name){
    global $con;
    $family = null;
    $sqlSearch = "SELECT * FROM `test_1` WHERE `first_name` LIKE '%$name%'";
    $resultSearch = $con->query($sqlSearch);
    while ($row = $resultSearch->fetch_assoc()) {
        $family[] = new Family(
            $row['id'],
            $row['first_name'],
            $row['last_name'],
            $row['hometown'],
            $row['age'],
            $row['job']
        );
    }
    
    return $family;

} 

}

?>