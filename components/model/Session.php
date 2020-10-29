<?php


class Session
{
    private bool $isSet;
    private string $email;

    public function __construct(string $email)
    {
        $this->isSet = true;
        $this->email = $email;
        $this->setSession();
    }

    public function setSession(){
        $_SESSION["loggedIn"] = $this->isSet;
        $_SESSION["email"] = $this->email;
    }

}