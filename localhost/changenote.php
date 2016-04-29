<?php
header ("Content-Type: text/html; charset=utf-8");?>
<?php
     session_start();
     $login = $_SESSION["login"];
     $password = $_SESSION["password"];
     $note = $_POST["note"];
     $id = $_POST["id"];
     
     $filter = array(
         "login"=>$login,
         "password"=>$password
     );
     include 'ConnectionToDB.php';
     
     $person = $list->findOne($filter);
     $notes = $person["notes"];
     
     for ($i = 0; $i < count($notes);$i++)
     {
         if ($i == $id + 1)
         {
             $notes[$i]["text"] = $note;
         }
     }
   $option = array("upsert" => true);
   $newDoc = array('$set'=>array("notes"=>$notes));
   $list->update($person,$newDoc,$option);
   ?>
<script>
       alert("The note has changed!");
       document.location = 'shownotes.php';
       
</script>