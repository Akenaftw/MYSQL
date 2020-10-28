<?php


class Session
{
    private bool $isSet;
    private bool $loggedIn;
    private string $first_name;
    private string $last_name;
    private string $email;

    /**
     * Session constructor.
     * @param bool $loggedIn
     * @param string $first_name
     * @param string $last_name
     */
    public function __construct(bool $loggedIn, string $first_name, string $last_name, string $email)
    {
        $this->isSet = true;
        $this->loggedIn = $loggedIn;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
    }

    public function setSession(){
        $_SESSION["loggedIn"] = $this->loggedIn;
        $_SESSION["email"] = $this->email;
        $_SESSION["firstname"] = $this->first_name;
        $_SESSION["lastname"] = $this->last_name;
    }

}