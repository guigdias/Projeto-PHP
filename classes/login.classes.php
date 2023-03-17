<?php

class Login extends Dbh
{
    public function getUser($uid, $email, $pwd)
    {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM usuarios WHERE users_uid = ? OR users_email = ?;');
        if(!$stmt->execute(array($uid, $pwd)))
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if($checkpwd == false)
        {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
        }
        else if($checkpwd == true)
        {
            $stmt = $this->connect()->prepare('SELECT * FROM usuarios WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');

            if(!$stmt->execute(array($uid, $email, $pwd)))
            {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            $user = $stmt->fetchAll();

            session_start();
            $_SESSION["userid"] = $user[0]["users_id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];
            $_SESSION["usermail"] = $user[0]["users_email"];
            
        }

        $stmt = null;

    }

}


?>