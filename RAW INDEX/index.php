<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
<nav>
<div>
<h3>SITE TESTE</h3>
<ul class="menu">
    <li><a href="index.php">HOME</a></li>
    <li><a href="#">1</a></li>   
    <li><a href="#">2</a></li>   
    <li><a href="#">3</a></li> 
    </ul>  
</div>
<ul class="menu-2">
<?php
    if(isset($_SESSION["userid"]))
    {
?>   
    <li><a href="#"><?php echo $_SESSION["useruid"];?></a></li>
    <li><a href="./includes/logout.inc.php">LOGOUT</a></li>  
<?php   
    }
    else
    {
 ?>  
    <li><a href="#">Cadastrar</a></li>
    <li><a href="#">LOGIN</a></li>     
<?php
    }
?>
</ul>
</nav>
</header>
 <section class="index-login">
<div class="wrapper">
    <div class= "index-login-signup">
        <h4>Cadastrar</h4>
        <form method="POST" action="./includes/signup.inc.php" >
            <input type="text" name="uid" placeholder="Usuario">
            <input type="password" name="pwd" placeholder="Senha">
            <input type="password" name="pwdrepeat" placeholder= "Confirmar Senha">
            <input type="text" name="email" placeholder= "Email">
            <button type="submit" name="submit">Cadastrar</button>
        </form>
        </div>
        <div class="index-login-login">
        <h4>LOGIN</h4>
        <form method="POST" action="./includes/login.inc.php">
        <input type="text" name="uid" placeholder="Usuario">
        <input type="password" name="pwd" placeholder="Senha">
        <br><br>
        <button type="submit" name="submit">Login</button>   
        </form>
    </div>
</div>
</section>
</body>
</html>