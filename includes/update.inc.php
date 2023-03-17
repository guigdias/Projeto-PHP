<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_SESSION["userid"];
    $uid = $_SESSION["useruid"];
    $sobre = htmlspecialchars($_POST["sobre"], ENT_QUOTES,"utf-8");
    $xp = htmlspecialchars($_POST["xp"], ENT_QUOTES,"utf-8");
    include ("../classes/dbh.classes.php");
    include ("../classes/profileinfo.classes.php");
    include("../classes/profileinfo-controller.php");
    
    $profileInfo = new ProfileInfoCtrl($id, $uid);

    $profileInfo->updateProfileInfo($sobre, $xp);

    header("location: ../perfil.php?error=none");
}


?>