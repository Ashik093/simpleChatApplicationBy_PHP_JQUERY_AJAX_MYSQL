<?php
  $con=mysqli_connect("localhost","root","","chatapp") or die('Connection Fail');
  date_default_timezone_set('Asia/Dhaka');

    function chat_history($sender_id,$reciever_id,$con){
      $sql="SELECT * FROM chat WHERE (sender_id='$sender_id' AND reciever_id='$reciever_id') OR (sender_id='$reciever_id' AND reciever_id='$sender_id') ORDER BY time DESC";
      $exe=mysqli_query($con,$sql);
      if($exe){
        $output = '<ul class="list-unstyled">';
        while($row=mysqli_fetch_array($exe)){
          $user_name = '';
          if($row["sender_id"] == $sender_id){
            $user_name = '<b class="text-success">You</b>';
          }
          else{
            $user_name = '<b class="text-danger">'.get_user_name($row['sender_id'], $con).'</b>';
          }
          $output .= '<li style="border-bottom:1px dotted #ccc">
                          <p>'.$user_name.' - '.$row["msg_content"].'
                            <div align="right">- <small><em>'.$row['time'].'</em></small></div>
                          </p>
                      </li>';
        }
        $output .= '</ul>';
        $update="UPDATE chat SET status='0' WHERE sender_id='$reciever_id' AND reciever_id='$sender_id' AND status='1'";
        $update_exe=mysqli_query($con,$update);
        return $output;
      }
    }



    function get_user_name($id,$con){
      $sql="SELECT * FROM users WHERE id='$id'";
      $exe=mysqli_query($con,$sql);
      while($row=mysqli_fetch_array($exe)){
        return $row['user_name'];
      }
    }

    function unseen_msg($reciever_id,$sender_id,$con){
      $sql="SELECT * FROM chat WHERE reciever_id='$reciever_id' AND sender_id='$sender_id' AND status='1'";
      $exe=mysqli_query($con,$sql);
      $count=mysqli_num_rows($exe);
      if($count>0){
        $data='<span class="badge badge-primary badge-pill">'.$count.'</span>';
        return $data;
      }
      return '';
    }
 ?>
