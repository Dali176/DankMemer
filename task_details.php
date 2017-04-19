<?php
include_once('database.php');
DBConnection();
$taskID = $_GET["taskID"];

if($taskID == 0) {
    $task = null;
    $isAddition = 1;
} else {
    $isAddition = 0;
    $query = "SELECT * FROM tasks WHERE ID = task_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':task_id', $taskID);
    //$statement->bindValue(':task_task', $taskTask);
    //$statement->bindValue(':task_completed', $taskCompleted);
    $statement->execute();
    $game = $statement->fetch();
    $statement->closeCursor();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Details</title>
    <!-- CSS Section -->
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./Content/app.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="todo_list.php" title="">Home</a></li>
            <li><a href="task_details.php" title="">Task Details</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1>Task Details</h1>
            <form action="update_database.php" method="post">
                <div class="form-group">
                    <label for="IDTextField" hidden>Task Number</label>
                    <input type="hidden" class="form-control" id="IDTextField" name="IDTextField" placeholder="Task Number" value="<?php echo $task['ID']; ?>">
                </div>
                <div class="form-group">
                    <label for="TaskTextField">Task Name</label>
                    <input type="text" class="form-control" id="NameTextField" name="NameTextField" placeholder="Task Name" required value="<?php echo $task['Task']; ?>">
                </div>
                <div class="form-group">
                    <label for="CompletedField">Completion</label>
                    <input type="text" class="form-control" id="CompletedField" name="CompletedField"
                           placeholder="Completed" required  value="<?php echo $task['Completed']; ?>">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
