<?php
    session_start();
    $username = $password = $userError = $passError = '';
    if(isset($_POST['sub'])){
        $username = $_POST['username']; $password = $_POST['password'];
        if($username === 'admin' && $password === 'password'){
            $_SESSION['login'] = true; header('LOCATION:todo_list.php'); die();
        }
        if($username !== 'admin')$userError = 'Invalid Username';
        if($password !== 'password')$passError = 'Invalid Password';
    }
    header('Location: todo_list.php');
?>