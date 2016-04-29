<?PHP  header("charset=utf-8");?>
<?php
              
              $login = $_POST['login'];
              $password1 = $_POST['password'];
              $password2 = $_POST['password2'];
              $name = $_POST['name'];
              $surname = $_POST['surname'];
              $phone = $_POST['phone'];
              
              include "ConnectionToDB.php";
              $filter = array("login"=>$login);
              $person = $list->findOne($filter);
              
              if ($name == "")
              {
                  echo "<span style='color:crimson;font-size:18px;'>Enter your name</span>";
                  return;
              }
              
              if ($person != NULL)
              {
                  echo "<span style='color:crimson;font-size:18px;'> Login does not access</span>";
                  return;
                
              }
              
              if ($login == "")
              {
                  echo "<span style='color:crimson;font-size:18px;'>Enter login</span>";
                  return;
              }
              if ($password1 == "")
              {
                 echo "<span style='color:crimson;font-size:18px;'> Enter your password.</span>";
                 return;
              }
              if (strlen($password1) < 6)
              {
                  echo "<span style='color:crimson;font-size:18px;'>Password should be more than 6 characters.</span>";
                  return;
              }
              if ($password1 != $password2)
              {
                  echo "<span style='color:crimson;font-size:18px;'> Passwords don't equal.</span>";
                  return;
              }
              else 
                  {
                      $user = array(
                      "login"=>$login,
                      "password"=>$password1,
                      "name"=>$name,
                      "surname"=>$surname,
                      "phone"=>$phone,
                      "notes"=> array(array(
                          "id"=>-1,
                          "text"=>""
                      ))
                  );      
                   $list->insert($user);
                   echo "<a href='index.php' style='color:forestgreen;font-size:18px;'>Click here to authorization</a>"; 
              }

              $connection->close();
     