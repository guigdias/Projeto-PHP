<?php
class ProfileInfo extends Dbh
{
    protected function getProfileInfo($userid)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM perfil WHERE users_id = ?;');

        if(!$stmt->execute(array($userid)))
        {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: profile.php?error=profilenotfound");
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profileData;
    }

    protected function setNewProfileInfo($perfil_sobre, $perfil_xp, $userid)
    {
        $stmt = $this->connect()->prepare('UPDATE perfil SET perfil_sobre = ?, perfil_xp = ? WHERE users_id = ?;');

        if(!$stmt->execute(array($perfil_sobre, $perfil_xp, $userid)))
        {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }
       $stmt = null;
    }

    protected function setProfileInfo($perfil_sobre, $perfil_xp, $userid)
    {
        $stmt = $this->connect()->prepare('INSERT into perfil (perfil_sobre, perfil_xp, users_id) VALUES (?, ?, ?);');

        if(!$stmt->execute(array($perfil_sobre, $perfil_xp, $userid)))
        {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }
       $stmt = null;
    }


}
?>