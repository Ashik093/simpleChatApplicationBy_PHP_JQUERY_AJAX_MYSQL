<?php
  include 'include/connection.php';
  if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $pass= $_POST['password'];
    if($email==''){
      $msg="Email Must not be empty";
      return $msg;
    }
    if($pass==''){
      $msg="Password Must not be empty";
      return $msg;
    }
    else{
      $login="SELECT * FROM users WHERE email='$email' AND password='$pass'";
      $exe=mysqli_query($con,$login);
      if(mysqli_num_rows($exe)>0){
        session_start();
        $_SESSION['user_email']=$email;
        $update=mysqli_query($con,"UPDATE users SET log_in='Online' WHERE email='$email'");
        $users="SELECT * FROM users WHERE email='$email'";
        $row=mysqli_query($con,$users);
        $data=mysqli_fetch_array($row);
        $_SESSION['name']=$data['user_name'];
        $_SESSION['user_id']=$data['id'];

        header('location:home.php');
      }else{
        $msg="Email Or Password Not Match";
      }
    }
  }
 ?>
