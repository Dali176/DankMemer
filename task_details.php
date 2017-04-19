<?php
include_once('database.php'); // include the database connection file

$taskID = $_GET["taskID"]; // assigns the taskID from the URL

if($taskID == 0) {
    $task = null;
    $isAddition = 1;
} else {
    $isAddition = 0;
$query = "SELECT * FROM tasks WHERE Id = :task_id "; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->bindValue(':task_id', $taskID);
$statement->execute(); // run on the db server
$task = $statement->fetch(); // returns only one record
$statement->closeCursor(); // close the connection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Details</title>
    <!-- CSS Section -->
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./Content/app.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Task Details</h1>
            <form action="update_database.php" method="post">
                <div class="form-group">
                    <label for="IDTextField" hidden>Task ID</label>
                    <input type="hidden" class="form-control" id="IDTextField" name="IDTextField"
                           placeholder="Task ID" value="<?php echo $task['ID']; ?>">
                </div>
                <div class="form-group">
                    <label for="TaskTextField">Task Task</label>
                    <input type="text" class="form-control" id="TaskTextField"  name="TaskTextField"
                           placeholder="Task Task" required  value="<?php echo $task['Task']; ?>">
                </div>
                <div class="form-group">
                    <label for="DescTextField">Task Task</label>
                    <input type="text" class="form-control" id="DescTextField"  name="DescTextField"
                           placeholder="Task Task" required  value="<?php echo $task['Description']; ?>">
                </div>
                <div class="form-group">
                    <label for="CompletedTextField">Task Completed</label>
                    <input type="text" class="form-control" id="CompletedTextField" name="CompletedTextField"
                           placeholder="Task Completed" required  value="<?php echo $task['Completed']; ?>">
                </div>
                    <input type="hidden" name="isAddition" value="<?php echo $isAddition; ?>">
                <button type="submit" id="SubmitButton" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>


<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>
</body>
</html>

