<?php 
   include "conn/connection.php";

   $name_user = addslashes($_GET['name_user']);
   $email = addslashes($_GET['email']);
   $passwords = addslashes($_GET['password']);
   $password = password_hash($passwords, PASSWORD_DEFAULT);

   $query = "SELECT * FROM user WHERE email='$email'";
   $result = mysqli_query($con,$query);  
   $count = mysqli_num_rows($result);
   if($count == 0){
     $sql = "INSERT INTO user(name_user, email, password, pin) VALUES ('$name_user', '$email', '$password', '000000')";
     mysqli_query($con,$sql);
   }
 ?>