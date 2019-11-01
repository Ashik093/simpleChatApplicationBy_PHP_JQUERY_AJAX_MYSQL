<?php
  include 'include/connection.php';
    $token=$_REQUEST['token'];
    $password=$_REQUEST['password'];
    $new_password=$_REQUEST['new_password'];
    $total_time=mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
    $currentDate=date('Y-m-d H:i:s',$total_time);


    $getInfo=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM password_reset WHERE token='$token'"));

    $email=$getInfo['email'];
    $id=$getInfo['id'];

    if($password!=$new_password){
      echo '<div class="alert alert-danger" role="alert">
            <p>Password Does Not Match. Try Again</p>
          </div>';
    }else{
      if ($exe=mysqli_query($con,"UPDATE users SET password='$password',forgotten_password='$currentDate' WHERE email='$email'")) {
        if ($s=mysqli_query($con,"DELETE FROM password_reset WHERE id='$id'")) {
          echo '<div class="alert alert-success" role="alert">
                <p>Password Successfully Updated. <a href="http://localhost/chatApp/signin.php">Click Here To Login</a></p>
              </div>';
        }

      }

    }
 ?>
