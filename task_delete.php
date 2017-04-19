<?php
include_once('database.php');

$taskID = $_GET["taskID"];

if($taskID != false) {
    $query = "DELETE FROM tasks WHERE ID = :task_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":task_id", $taskID);
    $success = $statement->execute();
    $statement->closeCursor();
}

//redirect to home page
header('Location: todo_list.php');
?>