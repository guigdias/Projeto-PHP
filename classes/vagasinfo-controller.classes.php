<?php
class VagasInfoCtrl extends VagasInfo
{
    private $userid;
    private $useruid;

    public function __construct($userid, $useruid)
    {
        $this->userid = $userid;
        $this->useruid = $useruid;
    }
    public function defaultVagaInfo()
    {
        $vaga_nome = "Titulo da vaga - Ex: Estágio em TI";
        $vaga_descricao = "Detalhe da vaga, horário, salário, benefícios ETC, anunciante: ". $this->useruid;
        $this->setVagaInfo($vaga_nome, $vaga_descricao, $this->userid);
    }

    public function UpdateVagasInfo($vaga_nome, $vaga_descricao)
    {
        if($this->emptyCheck($vaga_nome, $vaga_descricao))
        {
            header ("location: ../perfil.php?error=emptyinput");
            exit();
        }

        $this->setNewVagaInfo($vaga_nome, $vaga_descricao, $this->userid);
    }

    public function emptyCheck($vaga_nome, $vaga_descricao)
    {
        $result = false;
        if(empty($vaga_nome) || empty($vaga_descricao))
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