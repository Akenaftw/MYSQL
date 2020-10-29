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
        $hash = $connection->getLoginInfo($this->email);
        $this->authenticate($hash["password"]);
    }

    private function authenticate($encryptedPW)
    {

        if(password_verify($this->password, $encryptedPW)){
            echo "session is set";
            $session = new Session($this->email);
        }
        else{
        echo "Invalid username or password, please try again";
        }
    }
}