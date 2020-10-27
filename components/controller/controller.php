<?php

$show = include 'components/view/insert.php';

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

if (isset($_POST["submit"])) {
    if (isset($_POST["first_name"])){
        $first_name = $_POST["first_name"];
    }
    else{
        echo "please fill in your first name.";
    }
    if(isset($_POST["last_name"])) {
        $last_name = $_POST["last_name"];
    }
    else{
        echo "please fill in your last name.";
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    else{
        echo "please fill in a correct email adress";
    }
    $created_at = date('Y-m-d H:i:s');
    var_dump($created_at);
    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($created_at)){
        $connection = new Connection();
        var_dump($connection);
        $connection->storeInput($first_name,$last_name, $email, $created_at);
    }
    else{
        echo "Please fill in all the required fields!";
    }
}

