<?php

class ProfileInfoCtrl extends ProfileInfo
{
    private $userid;
    private $useruid;

    public function __construct($userid, $useruid)
    {
        $this->userid = $userid;
        $this->useruid = $useruid;
    }

    public function defaultProfileInfo()
    {
        $perfil_sobre = "Diga um pouco sobre você e sobre seus objetivos. Comece com: Olá, eu sou o " .$this->useruid;
        $perfil_xp = "Diga um pouco sobre você!";
        $this->setProfileInfo($perfil_sobre, $perfil_xp, $this->userid);
    }

    public function updateProfileInfo($perfil_sobre, $perfil_xp)
    {
        if($this->emptyCheck($perfil_sobre, $perfil_xp))
        {
            header ("location: ../perfil.php?error=emptyinput");
            exit();
        }

        $this->setNewProfileInfo($perfil_sobre, $perfil_xp, $this->userid);
    }

    public function emptyCheck($perfil_sobre, $perfil_xp)
    {
        $result = false;
        if(empty($perfil_sobre) || empty($perfil_xp))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }

        return $result;
    }
}
?>