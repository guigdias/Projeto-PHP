<?php

class VagasInfo extends Dbh
{
    protected function getVagasInfo($userid)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM vagas WHERE users_id = ?;');

        if(!$stmt->execute(array($userid)))
        {
            $stmt = null;
            header("location: vagas.php?error=vaganaoencontrada");
            exit();
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: vagas.php?error=vaganaoencontrada");
            exit();
        }

        $VagaData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $VagaData;
    }

    protected function setNewVagaInfo($vaga_nome, $vaga_descricao, $userid)
    {
        $stmt = $this->connect()->prepare('UPDATE vagas SET vaga_nome = ?, vaga_descricao = ? WHERE users_id = ?;');

        if(!$stmt->execute(array($vaga_nome, $vaga_descricao, $userid)))
        {
            $stmt = null;
            header("location: vagas.php?error=stmtfailed");
            exit();
        }
       $stmt = null;
    }

    protected function setVagaInfo($vaga_nome, $vaga_descricao, $userid)
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
