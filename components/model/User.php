<?php


class User
{
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $created_at;
    private string $password;


    /**
     * User constructor.
     */
    public function __construct($email, Connection $connection)
    {
        $connection->getDetails();
    }
}