<?php
include_once('database.php');
DBConnection();

$query = "SELECT * FROM tasks";
$statement = $db->prepare($query);
$statement->excute();
$tasks = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <title>To do list</title>
    <!-- CSS Section -->
    <link rel="stylesheet" href="Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="Content/app.css">
    <link rel="stylesheet" href="css/styles.css">
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
            <h1>Tasks</h1>
            <a class="btn btn-primary" href="task_details.php?taskID=0">
                <i class="fa fa=plus"></i> Add New Task</a>
            <br>
            <table class="table table-stripped table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Completed</th>
                    <th></th>
                    <th></th>
                 </tr>
                    <?php foreach($tasks as $task) : ?>
                        <tr>
                            <td><?php echo $task['ID'] ?></td>
                            <td><?php echo $task['Task'] ?></td>
                            <td><?php echo $task['Completed'] ?></td>

                            <td><a class="btn btn-primary" href="task_details.php?taskID=<?php echo $task['Id'] ?>"><i class="fa fa-pencil-square-o"></i> Edit</a></td>

                            <td><a class="btn btn-danger" href="task_delete.php?taskID=<?php echo $task['Id'] ?>"><i class="fa fa-trash-o"></i> Delete</a></td>

                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<script src="/Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="/Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/Scripts/app.js"></script>
</body>
</html>