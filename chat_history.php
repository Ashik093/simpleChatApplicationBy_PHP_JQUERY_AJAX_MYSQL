<?php
  include 'include/connection.php';

  session_start();
  echo chat_history($_SESSION['user_id'],$_REQUEST['user_id'],$con);
 ?>
