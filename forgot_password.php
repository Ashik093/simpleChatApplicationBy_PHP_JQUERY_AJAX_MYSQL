
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
          <h5 class="card-title bg-danger text-white p-2">Forgot Password</h5>
          <p class="card-text">
            <form method="post">
              <div class="form-group">
                <div class="alert alert-dark text-muted">Enter Your Email address. We will send you a password recovery link. You can change your password to click that link within 24 hours after recieving email</div>
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email">
                <span id="error"></span>
          </div>
          <button type="button" id="send" class="btn btn-primary">Send Password Reset Link To Your Email</button>
          <div id="msg" class="mt-2">

          </div>
      </form>

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
      $('#send').on('click',function(){
        sendResetLink();
      });

      function sendResetLink(){
        var email=$('#email');
        if(isNotEmpty(email)){
          $.ajax({
            url:'send_mail.php',
            method:'POST',
            data:{email:email.val()},
            success:function(data){
              $("#msg").html(data);
              email.val('');
            }
          })

        }
      }

      function isNotEmpty(data){
        if(data.val()==''){
          data.css('border','1px solid red');
          $('#error').html('<small style="color:red;">Field Must Not Be Empty</small>');
          return false;
        }else{
          data.css('border','');
          $('#error').html('');
        }
        return true;
      }

    });
  </script>
</body>
</html>
