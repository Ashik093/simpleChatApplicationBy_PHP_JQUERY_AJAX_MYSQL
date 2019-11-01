<?php
  use PHPMailer\PHPMailer\PHPMailer;

  include 'include/connection.php';
  $email=$_REQUEST['email'];
  $checkMail="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($con,$checkMail);
  $row=mysqli_num_rows($result);
  $usersName=mysqli_fetch_array($result);
  if($row==0){
    echo '<div class="alert alert-danger" role="alert">
              <b>('.$email.')</b> This email has no account on this website.
          </div>';

  }else{

      $total_time=mktime(date('H'),date('i'),date('s'),date('m'),date('d')+1,date('Y'));
      $expDate=date('Y-m-d H:i:s',$total_time);
      $token=$email.'_'.uniqid();



      require_once('PHPMailer/PHPMailer.php');
      require_once('PHPMailer/Exception.php');
      require_once('PHPMailer/SMTP.php');

      $output='<p>Dear user, '.$usersName['user_name'].'</p>';
      $output.='<p>Please click on the following link to reset your password.</p>';
      $output.='<p>-------------------------------------------------------------</p>';
      $output.='<p><a href="http://localhost/chatApp/reset_password.php?token='.$token.'" target="_blank">
      http://localhost/chatApp/reset_password.php?'.$token.'</a></p>';
      $output.='<p>-------------------------------------------------------------</p>';
      $output.='<p>Please be sure to copy the entire link into your browser.
      The link will expire after 1 day for security reason.</p>';
      $output.='<p>If you did not request this forgotten password email, no action
      is needed, your password will not be reset. However, you may want to log into
      your account and change your security password as someone may have guessed it.</p>';
      $output.='<p>Thanks,</p>';
      $output.='<p>Chat With Your Firends</p>';
      $body = $output;
      $subject = "Password Recovery - Chat With Your Firends";


      $mail=new PHPMailer();

      //SMTP setting
      $mail->isSMTP();
      $mail->Host="smtp.gmail.com";
      $mail->SMTPAuth=true;
      $mail->Username="from@example.com";
      $mail->Password="password";
      $mail->Port=587;
      $mail->SMTPSecure="tls";

      //Email setting
      $mail->isHTML(true);
      $mail->setFrom("mdashikurrahman598619@gmail.com","Chat With Your Friend");
      $mail->addAddress($email);
      $mail->Subject=$subject;
      $mail->Body=$body;

      if($mail->send()){
        $insert="INSERT INTO password_reset(email,token,expdate) VALUES('$email','$token','$expDate')";
        $exe=mysqli_query($con,$insert);
        echo '<div class="alert alert-success" role="alert">
                <h5 class="alert-heading">Congratulation <b>'.$usersName['user_name'].'</b>!!</h5>
                <p>An email has been sent successfully to <b>'.$email.' from <b>mdashikurrahman598619@gmail.com</b> with instructions on how to reset your password. Check Your Inbox</b></p>
              </div>';
      }else{
        echo '<div class="alert alert-danger" role="alert">
                  <b>Failed</b> to send the password reset Link.
              </div>';
      }

  }



 ?>
