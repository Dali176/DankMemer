<?php
include_once('database.php');

$query = "SELECT * FROM tasks"; // SQL statement
$statement = $db->prepare($query); // encapsulate the sql statement
$statement->execute(); // run on the db server
$tasks = $statement->fetchAll(); // returns an array
$statement->closeCursor(); // close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COMP1006</title>
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
            <h1>Tasks List</h1>
            <a class="btn btn-primary" href="task_details.php?taskID=0">
                <i class="fa fa-plus"></i> Add New Task</a>
            <br>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Completed</th>
                    <th></th>
                    <th></th>
                </tr>
                    <?php foreach($tasks as $task) : ?>
                        <tr>
                            <td><?php echo $task['Id'] ?></td>
                            <td><?php echo $task['Name'] ?></td>
                            <td><?php echo $task['Completed'] ?></td>
                            <!-- This line sends the taskID to the task_details page -->

                            <td><a class="btn btn-primary" href="task_details.php?taskID=<?php echo $task['Id'] ?>"><i class="fa fa-pencil-square-o"></i> Edit</a></td>

                            <td><a class="btn btn-danger" href="task_delete.php?taskID=<?php echo $task['Id'] ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
                        </tr>
                    <?php endforeach; ?>

            </table>

        </div>
    </div>
</div>

<!-- JavaScript Section -->
<script src="./Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="./Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./Scripts/app.js"></script>
</body>
</html>
