<?php
include_once('database.php');

$taskID = $_GET["taskID"]; // assigns the taskID from the URL

if($taskID != false) {
    $query = "DELETE FROM tasks WHERE Id = :task_id ";
    $statement = $db->prepare($query);
    $statement->bindValue(":task_id", $taskID);
    $success = $statement->execute(); // execute the prepared query
    $statement->closeCursor(); // close off database
}

// redirect to index page
header('Location: todo_list.php');

?>