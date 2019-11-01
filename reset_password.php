
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <title>Log In To Chat App</title>
</head>
<body>
  <!-- Image and text -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand text-center" href="signin.php">

      Chat With Your Friend
    </a>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-lg-2">

      </div>
      <div class="col-lg-4">
        <div class="card" style="width: 50rem;">
        <div class="card-body">
          <h5 class="card-title bg-primary text-white p-2">Reset Your Password</h5>
          <p class="card-text">
            <?php
              include 'include/connection.php';
              if(isset($_GET['token'])){
                $token=$_GET['token'];
                $sql=mysqli_query($con,"SELECT * FROM password_reset WHERE token='$token'");
                if ($num=mysqli_num_rows($sql)=='') {

                  ?>
                    <div class="alert alert-danger" role="alert">
                    <h2 class="alert-heading">Link Does Not Exist</h2>
                    <p>The link is removed. Either you did not copy the correct link
                    from the email, or you have already used the key in which case it is
                    deactivated.</p>
                    <p><a href="http://localhost/chatApp/forgot_password.php">
                    Click here</a> to reset password.</p></div>
                  <?php
                }elseif($data=mysqli_fetch_array($sql)){
                  $total_time=mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
                  $currentDate=date('Y-m-d H:i:s',$total_time);
                  if($currentDate<$data['expdate']){
                    ?>
                    <form id="form" method="post">
                      <input type="hidden" id="token" value="<?php echo $_GET['token']; ?>">
                      <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter New Password">
                        <span id="error"></span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Confirm New Password</label>
                        <input type="password" class="form-control" id="new_password" placeholder="Confirm New Password">
                        <span id="error"></span>
                      </div>
                      <button type="button" id="reset" class="btn btn-primary">Reset Password</button>

                  </form>
                  <div id="msg" class="mt-2">

                  </div>


                    <?php

                  }else{?>

                    <div class="alert alert-danger" role="alert">
                      <h2 class="alert-heading">Link Expired</h2>
                      <p>The link is invalid/expired. You have 24 hours to reset your password after recieving email.</p>
                      <p><a href="http://localhost/chatApp/forgot_password.php">
                      Click here</a> to reset password.</p>
                    </div>

                    <?php

                  }

                }
              }else{
                ?>

                      <div class="alert alert-danger" role="alert">
                        <h2 class="alert-heading">Invalid Link</h2>
                        <p>The link is invalid/expired. Either you did not copy the correct link
                        from the email, or you have already used the key in which case it is
                        deactivated.</p>
                        <p><a href="http://localhost/chatApp/forgot_password.php">
                        Click here</a> to reset password.</p>
                      </div>
                <?php
              }
             ?>


      </p>
    </div>
      </div>
    </div>
  </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#reset').on('click',function(){
        resetPassword();
      });

      function resetPassword(){
        var password=$('#password');
        var new_password=$('#new_password');
        var token=$("#token");
        if(isNotEmpty(password) && isNotEmpty(new_password)){
          $.ajax({
            url:'resetPassword.php',
            method:'POST',
            data:{password:password.val(),new_password:new_password.val(),token:token.val()},
            success:function(data){
              $("#form").hide();
              $("#msg").html(data);
              password.val('');
              new_password.val('');
            }
          })

        }
      }

      function isNotEmpty(data){
        if(data.val()==''){
          data.css('border','1px solid red');
          return false;
        }else{
          data.css('border','');
        }
        return true;
      }

    });
  </script>
</body>
</html>
