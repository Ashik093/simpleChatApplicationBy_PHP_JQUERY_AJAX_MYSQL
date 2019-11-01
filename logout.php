<?php
 session_start();
 include 'include/connection.php';
 $email=$_SESSION['user_email'];
 unset($_SESSION['user_session']);

 if(session_destroy())
 {
   $sql="UPDATE users SET log_in='Offline' WHERE email='$email'";
   $quer=mysqli_query($con,$sql);
  header("Location: signin.php");
 }
?>
