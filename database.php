<?php
// connection string




        $dsn = 'mysql:host=ca-cdbr-azure-east-a.cloudapp.net;dbname=todo_list';
        $Username = 'b3b15faea695bd';
        $Password = '03ebe1ce';
        // instantiates a new pdo - an db object
try {
        $db = new PDO($dsn, $Username, $Password);
    }
    catch(PDOException $e) {
        $message = $e->getMessage();
        echo "An error occurred: " . $message;
    }
?>