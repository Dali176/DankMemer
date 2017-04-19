<?php
// connection string

// cleardb access
$dsn = 'mysql:host=ca-cdbr-azure-east-a.cloudapp.net;dbname=todo_list';
$userName = 'b3b15faea695bd';
$password = '03ebe1ce';


// exception handling - use a try / catch
try {
// instantiates a new pdo - an db object
$db = new PDO($dsn, $userName, $password);

}
catch(PDOException $e) {
$message = $e->getMessage();
echo "An error occurred: " . $message;
}

?>