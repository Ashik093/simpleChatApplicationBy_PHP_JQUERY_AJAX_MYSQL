<?php
include 'include/connection.php';
session_start();
if(empty($_SESSION['user_email'])){
  header('location:signin.php');
}
$email=$_SESSION['user_email'];
 $sql="SELECT * FROM users WHERE email !='$email'";
 $exe=mysqli_query($con,$sql);


if($exe){

    while ($row=mysqli_fetch_array($exe)) {
      // $output ='<li class="list-group-item chat"  data-userid="'. $row['id'].'" data-username="'.$row['user_name'].'">'.$row['user_name'].'</li>';

      $output='<li style="cursor:pointer;" class="mb-3 chat" data-username="'.$row['user_name'].'" data-userid="'. $row['id'].'">
          <div class="d-flex bd-highlight">
            <div class="img_cont">
              <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">';
      if($row['log_in']=='Online'){
          $output.='<span class="online_icon"></span>';
      }else{
          $output.='<span class="online_icon offline"></span>';
      }
      $output.='</div>
          <div class="user_info">
            <span>'.$row['user_name'].''.unseen_msg($_SESSION['user_id'],$row['id'],$con).'</span>
            <p>'.$row['user_name'].' is '.$row['log_in'].'</p>
          </div>
        </div>
      </li>';

      echo $output;

   }
}
