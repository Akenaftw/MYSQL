<?php


class Connection
{

    private PDO $pdo;
    private PDOStatement $handle;


    public function __construct()
    {
        $this->pdo = $this->openConnection();
    }

    public function openConnection(): PDO
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

        $this->pdo = new PDO('mysql:host=localhost;dbname=Becode', $dbuser, $dbpass);
    }


    public function storeInput($first_name, $last_name, $email, $created_at)
    {
        $this->handle = $this->pdo->prepare('insert into student (first_name,last_name,email,created_at) values (:first_name, :last_name, :email, :created_at)');
        $this->handle->bindValue(":first_name", $first_name);
        $this->handle->bindValue("last_name",$last_name);
        $this->handle->bindValue("email",$email);
        $this->handle->bindValue("created_at", $created_at);
        $this->handle->execute();
    }

}