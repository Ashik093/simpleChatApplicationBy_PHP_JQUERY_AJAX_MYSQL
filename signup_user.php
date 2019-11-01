<?php
  include 'include/connection.php';
  if(isset($_POST['submit'])){
    $name= $_POST['user_name'];
    $pass= $_POST['password'];
    $email= $_POST['email'];
    $country= $_POST['country'];
    $gender= $_POST['gender'];
    if($name==''){
      $msg="Username Must not be empty";
      return $msg;
    }
    if($email==''){
      $msg="Email Must not be empty";
      return $msg;
    }
    if($country==''){
      $msg="Country Must not be empty";
      return $msg;
    }
    if($gender==''){
      $msg="Gender Must not be empty";
      return $msg;
    }
    elseif (strlen($pass)<6) {
      $msg="Password Must be greater than 6 character";
      return $msg;
    }
    else {
      $check_mail="SELECT * FROM users WHERE email='$email'";
      $row=mysqli_query($con,$check_mail);
      $data=mysqli_num_rows($row);
      if($data>0){
        $msg="Email Already Exist";
        return $msg;
      }
      else{

        $insert="INSERT INTO users(user_name,email,password,country,gender) VALUES('$name','$email','$pass','$country','$gender')";
        $store=mysqli_query($con,$insert);
        if($store){
          echo "<script>alert('Sign Up Success')</script>";
          header('location:signin.php');
        }
      }
    }
  }
?>
