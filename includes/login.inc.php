<?php


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Pegando data do formulario
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    // Incluindo classe
    include("../classes/dbh.classes.php");
    include("../classes/login.classes.php");
    include("../classes/login-controller.classes.php");
    $login = new Loginctrl($uid, $email, $pwd);

    //Rodando 
    $login->loginUser();

    //Voltando para a landing page
    header("Location: ../index.php?error=none". $_SESSION["$uid"]);
    
}


?>