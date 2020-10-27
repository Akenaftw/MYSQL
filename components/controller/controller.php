<?php



function whatIsHappening()
{
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    //echo '<h2>$_SESSION</h2>';
    //var_dump($_SESSION);
}

if (isset($_POST["submit"])) {
    if (isset($_POST["first_name"])) {
        $first_name = $_POST["first_name"];
    } else {
        echo "please fill in your first name.";
    }
    if (isset($_POST["last_name"])) {
        $last_name = $_POST["last_name"];
    } else {
        echo "please fill in your last name.";
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    } else {
        echo "please fill in a correct email adress";
    }
    if (isset($_POST["password"])) {
        if ($_POST["password"] == $_POST["passwordConf"]){
            $password = $_POST["password"];
        }
        else{
            "Please make sure your passwords match";
        }
    } else {
        echo "please enter a valid password";
    }
    $created_at = date('Y-m-d H:i:s');
    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !empty($created_at)) {
        $connection = new Connection();
        var_dump($connection);
        $connection->storeInput($first_name, $last_name, $email, $password, $created_at);
    } else {
        echo "Please fill in all the required fields!";
    }
}
$show = "components/view/login.php";
if (isset($_POST["registrationLink"])){
    $show = "components/view/register.php";
}
include $show;

