<?php
include_once('database.php');

$isAddition = filter_input(INPUT_POST, "isAddition");
$taskName = filter_input(INPUT_POST, "NameTextField"); //$_POST["NameTextField"];
$taskCompleted = filter_input(INPUT_POST, "CompletedTextField"); //$_POST["CompletedTextField"];

if($isAddition == "1") {
$query = "INSERT INTO tasks (Task, Description, Completed) VALUES (:task_name, :task_description, :task_completed)";
$statement = $db->prepare($query); // encapsulate the sql statement
}
else {
$taskID = filter_input(INPUT_POST, "IDTextField"); // $_POST["IDTextField"];
$query = "UPDATE tasks SET Task = :task_name, Description = :task_description, Completed = :task_completed WHERE Id = :task_id "; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->bindValue(':task_id', $taskID);

}

$statement->bindValue(':task_name', $taskName);
$statement->bindValue(':task_description', $taskDescription);
$statement->bindValue(':task_completed', $taskCompleted);
$statement->execute(); // run on the db server
$statement->closeCursor(); // close the connection

// redirect to index page
header('Location: todo_list.php');
?>
