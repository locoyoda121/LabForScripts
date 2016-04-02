<?php


 if($_POST['submit']){
$email=strip_tags($_POST['email']);
$pass=strip_tags($_POST['password']);
 

$error = array();
if(empty($email) or !filter_var($email,FILTER_SANITIZE_EMAIL))
{
$error[] = "Email id is empty or invalid";
}
if(empty($pass)){
$error[] = "Please enter password";
}
if(strlen($pass)<6){
	$error[] = "Password must be equel or more then 6 symbols";
}


if(count($error) == 0){
 //database configuration
$host = 'localhost';
$database_name = 'test';
$database_user_name = '';
$database_password = '';
 
//Currently we are connecting to mongodb without authentication
$connection=new MongoClient();
//checking the mongo database connection
if($connection){
$database=$connection->$database_name;   //connecting to database
$collection=$database->reg_users;   //connect to specific collection
$query=array('email'=>$email);
$count=$collection->findOne($query);   //checking for existing user
 
if(!count($count)){
//Save the New user
$user_data=array('email'=>$email,'password'=>md5($password));
$collection->insert($user_data);

echo "You are successfully registered.";
}
else{
echo "Email is already existed.Please register with another Email id!.";
}
 
}else{
 
die("Database are not connected");
}
}else{
//Displaying the error
foreach($error as $err){
echo $err.'<br />';
}
}
 
}
 
?>