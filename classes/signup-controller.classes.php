<?php

class SignupContr extends Signup
{
    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;
    public function __construct($uid, $pwd, $pwdrepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    public function signupUser()
    {
        if($this->emptyInput() == false)
        {
            // echo "Campos Vazios"
            header("location: ../cadastro.php?error=emptyinput");
            exit();
        }
        if($this->InvalidEmail() == false)
        {
            // echo "Email Invalido"
            header("location: ../cadastro.php?error=email");
            exit();
        }
        if($this->InvalidUid() == false)
        {
            // echo "Usuario Invalido"
            header("location: ../cadastro.php?error=uid");
            exit();
        }
        if($this->uidTakenCheck() == false)
        {
            // echo "Usuario Invalido"
            header("location: ../cadastro.php?error=useroremailtaken");
            exit();
        }
        if($this->pwdMatch() == false)
        {
            // echo "Senhas diferentes"
            header("location: ../cadastro.php?error=passwordmatch");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }
    private function emptyInput()
    {
        $result = false;
        if(empty($this->uid)||empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function InvalidUid()
    {
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function InvalidEmail()
    {
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {
        $result = false;
        if($this->pwd !== $this->pwdrepeat)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck()
    {
        $result = false;
        if(!$this->checkUser($this->uid, $this->email))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    public function fetchUserId($uid)
    {
        $userid = $this->getID($uid);
        return $userid[0]["users_id"];
    }
}





?>