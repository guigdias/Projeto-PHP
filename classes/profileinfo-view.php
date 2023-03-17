<?php
class ProfileInfoView extends ProfileInfo
{
    public function fetchSobre($userid)
    {
        $profileInfo = $this->getProfileInfo($userid);

        echo $profileInfo[0]["perfil_sobre"];
    }

    public function fetchXP($userid)
    {
        $profileInfo = $this->getProfileInfo($userid);

        echo $profileInfo[0]["perfil_xp"];
    }
}
?>