<?PHP  header("Content-Type: text/html; charset=utf-8");?>
<?php
   session_start();
   include "ConnectionToDB.php";
   $login = $_SESSION["login"];
   $password = $_SESSION["password"];
   $note = trim($_POST["notes"]);
   
   $filter = array(
       "login"=>$login,
       "password"=>$password
   );
   $person = $list->findOne($filter);
   $count = count($person["notes"])-1;
   $newElem = array('$push' => array("notes" => array("id"=>$count++,"text" =>$note)));

   $list->update($filter,$newElem);
   
   echo "<script> alert('The note added!'); document.location = 'main.php';</script>";
   
   