<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_SESSION["userid"];
    $uid = $_SESSION["useruid"];
    $vaga_nome = htmlspecialchars($_POST["vaga_nome"], ENT_QUOTES,"utf-8");
    $vaga_descricao = htmlspecialchars($_POST["vaga_descricao"], ENT_QUOTES,"utf-8");
    include ("../classes/dbh.classes.php");
    include ("../classes/newvaga.classes.php");
    include("../classes/newvaga-controller.php");
    
    $NewVaga = new newVaga($id, $uid);

    $NewVaga->setNewVaga($vaga_nome, $vaga_descricao, $id);

    header("location: ../vagas.php?error=none");
}


?>