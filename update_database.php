<?php
include_once('database.php');

$isAddition = filter_input(INPUT_POST, "isAddition");
$taskTask = filter_input(INPUT_POST, "TaskTextField");
$taskCompleted = filter_input(INPUT_POST, "CompletedField");

if($isAddition == "1") {
    $query = "INSERT INTO tasks (Task, Completed) VALUES (:task_task, :task_completed)";
    $statement = $db->prepare($query);
}
else {
    $taskID = filter_input(INPUT_POST, "IDTextField");
    $query = "UPDATE tasks SET NAME = :task_name, Completed = :task_completed WHERE Id = :task_id"; //SQL statement
    $statement = $db->prepare($query);
    $statement->bindValue(':task_id', $taskID);
}

$statement->bindValue('task_task', $taskTask);
$statement->bindValue('task_completed', $taskCompleted);
$statement->execute();  //Run on server
$statement->closeCursor(); //Close connection

header('Location: todo_list.php');
?>