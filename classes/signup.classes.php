<?php

class Signup extends Dbh
{
    public function setUser($uid, $pwd, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO usuarios (users_uid, users_pwd, users_email) VALUES(?, ?, ?);');
        $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedpwd, $email)))
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;


    }

    protected function checkUser($uid, $email)
    {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM usuarios WHERE users_uid = ? OR users_email = ?;');
        if(!$stmt->execute(array($uid, $email)))
        {
            $stmt = null;
            header("location: ..index.php?error=stmtfailed");
            exit();
        }
        $resultcheck = false;
        if($stmt->rowCount() > 0)
        {
            $resultcheck = false;
        }
        else
        {
            $resultcheck = true;
        }
        return $resultcheck;
    }

    protected function getID($uid)
    {
        $stmt = $this->connect()->prepare('SELECT users_id FROM usuarios WHERE users_uid = ?;');

        if(!$stmt->execute(array($uid)))
        {
            $stmt = null;
            header("location: ..index.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ..index.php?error=stmtfailed");
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profileData;
    }
}


?>