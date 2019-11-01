<?php
  include 'include/connection.php';
  session_start();
  $sender_id=$_SESSION['user_id'];
  $reciever_id=$_REQUEST['user_id'];
  $msg=$_REQUEST['chat_message'];

  $sql="INSERT INTO chat(sender_id,reciever_id,msg_content,status)VALUES('$sender_id','$reciever_id','$msg','1')";
  $insert=mysqli_query($con,$sql);
  if($insert){
    echo chat_history($_SESSION['user_id'],$_REQUEST['user_id'],$con);
  }

 ?>
