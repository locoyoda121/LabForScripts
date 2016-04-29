<?php header ("Content-Type: text/html; charset=utf-8")?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Notes
        </title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <div align="right"><a href="shownotes.php">History</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Log out</a></div>
        <h1>Create your notes!</h1>
        <div >
            <p>Enter in this area your notes: </p>
            <form method="post" action="sendNote.php">
                <textarea class="note1" name="notes" cols="48" rows="7" wrap="soft"></textarea>
                <input type="submit" value="Send" class="btn"/>
            </form>
        
        </div>
    </body>
</html>