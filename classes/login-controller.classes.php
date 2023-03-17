<?php

class Loginctrl extends Login
{
    private $uid;
    private $pwd;
    private $email;
    public function __construct($uid, $email, $pwd) 
    {
        $this->uid = $uid;
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if($this->emptyInput() == false)
        {
            // echo "Campos Vazios"
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->uid,$this->email, $this->pwd);
    }
    private function emptyInput()
    {
        $result = false;
        if(empty($this->uid)||empty($this->pwd))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

}





?>