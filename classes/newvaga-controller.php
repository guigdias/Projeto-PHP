<?php
class NewVagaCtrl extends newVaga
{
    private $userid;
    private $useruid;

    public function __construct($userid, $useruid)
    {
        $this->userid = $userid;
        $this->useruid = $useruid;
    }

    public function UpdateVagasInfo($vaga_nome, $vaga_descricao)
    {
        if($this->emptyCheck($vaga_nome, $vaga_descricao))
        {
            header ("location: ../vagas.php?error=emptyinput");
            exit();
        }

        $this->setNewVaga($vaga_nome, $vaga_descricao, $this->userid);
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