<?php
class newVaga extends Dbh
{
    public function setNewVaga($vaga_nome, $vaga_descricao, $userid)
    {
        $stmt = $this->connect()->prepare('INSERT into vagas (vaga_nome, vaga_descricao, users_id) VALUES (?, ?, ?);');

        if(!$stmt->execute(array($vaga_nome, $vaga_descricao, $userid)))
        {
            $stmt = null;
            header("location: vagas.php?error=stmtfailed");
            exit();
        }
       $stmt = null;
    }
}
?>