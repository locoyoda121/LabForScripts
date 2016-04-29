<?php
header ("Content-Type: text/html; charset=utf-8");?>
<?php
    session_start();
    $login = $_SESSION["login"];
    $password = $_SESSION["password"];
    $filter = array(
        "login"=>$login,
        "password"=>$password
    );
    
    include 'ConnectionToDB.php';
    $person = $list->findOne($filter);
    ?>
   <html>
    <head>
        <title>
            Your notes
        </title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <div align='right'><a href="main.php" >Main page</a></div>
        <h1>Your Notes</h1><?php
    $notes = $person["notes"];
    for ($i = 0;$i < count($notes);$i++)
    {?>
<div class="divas" align="center">
        <div class="form">
            <form method="post" action="changenote.php">
                <textarea class="id" name="id"><?php echo $notes[$i]["id"]?></textarea>
                <textarea class="note" name="note">
<?php echo $notes[$i]["text"];?>
                </textarea>
                
                <input type="submit" value="Save" class="btn"/>
        </form>
        </div>
        </div>
    </body>
</html>
<?php
    }
    
