<?PHP  header("Content-Type: text/html; charset=utf-8");?>
<?php 
    session_start();
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    $_SESSION["login"] = $login;
    $_SESSION["password"] = $password;
    
    include "ConnectionToDB.php";
    
    $filter = array("login"=>$login,"password"=>$password);
    
    $person = $list->findOne($filter);
    
    if ($person["login"] != NULL && $person["password"] != NULL)
    {
        echo "<a style='color:green;font-size:18px;' href='main.php'>Click here to enter</a>";
    }
    else 
    {
        echo "<span style='color:crimson;font-size:18px;'>Invalid login or password</span>"; 
    }