<?php


class Connection
{

    private PDO $pdo;



    public function __construct()
    {
        $this->pdo = $this->openConnection();
    }

    public function openConnection()
    {
        $dbhost = "localhost";
        $dbuser = "becode";
        $dbpass = "Becode123!";
        $db = "Becode";

       /* $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];*/

        return new PDO('mysql:host=localhost;dbname=Becode', $dbuser, $dbpass);
    }


    public function storeInput($first_name, $last_name, $email, $password, $created_at)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $handle = $this->pdo->prepare('insert into student (first_name,last_name,email,password,created_at) values (:first_name, :last_name, :email, :password, :created_at)');
        $handle->bindValue(":first_name", $first_name);
        $handle->bindValue(":last_name",$last_name);
        $handle->bindValue(":email",$email);
        $handle->bindValue(":password",$password);
        $handle->bindValue(":created_at", $created_at);
        $handle->execute();
    }
    public function getDetails(){
        $handle = $this->pdo->prepare('SELECT * FROM student');
        $handle->execute();
        return $handle->fetchAll();
    }

    public function getLoginInfo($email){
        $handle = $this->pdo->prepare('SELECT password FROM student where email = :email');
        $handle->bindValue(":email",$email);
        $handle->execute();
        return $handle->fetch();
    }
}