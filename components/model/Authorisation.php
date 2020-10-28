<?php


class authorisation
{
private string $email;
private string $password;
private bool $loggedIn;

    /**
     * authorisation constructor.
     * @param string $email
     */
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
        $connection = new Connection();
        $hash = $connection->getLoginInfo();
        $this->authenticate($hash);
    }

    private function authenticate($hash)
    {
        if(password_verify($this->password, $hash)){
            $session = new Session($this->email);
        }
    }
}