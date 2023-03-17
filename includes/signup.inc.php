<?php


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Pegando data do formulario
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // Incluindo classe
    include("../classes/dbh.classes.php");
    include("../classes/signup.classes.php");
    include("../classes/signup-controller.classes.php");
    $signup = new SignupContr($uid, $pwd, $pwdrepeat, $email);

    //Rodando 
    $signup->signupUser();

    $userid = $signup->fetchUserId($uid);

    //Instanciando informações do usuário
    include("../classes/profileinfo.classes.php");
    include("../classes/profileinfo-controller.php");
    $profileInfo = new ProfileInfoCtrl($userid, $uid);
    $profileInfo->defaultProfileInfo();
    //Instanciando Vagas
    //include("../classes/vagasinfo.classes.php");
    //include("../classes/vagasinfo-controller.classes.php");
    //$VagasInfo = new VagasInfoCtrl($userid, $uid);
    //$VagasInfo->defaultVagaInfo();
    //Voltando para a landing page
    header("Location: ../login.php");
    
}


?>