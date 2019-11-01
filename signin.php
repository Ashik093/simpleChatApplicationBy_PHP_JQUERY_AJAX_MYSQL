<?php include 'signin_user.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Log In To Chat App</title>
</head>
<body>
  <!-- Image and text -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand text-center" href="#">

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
          <h5 class="card-title bg-primary text-white p-2">Sign In</h5>
          <h6 class="card-subtitle mb-2 text-muted">Sign in to your Account</h6>
          <p class="card-text">
            <form action="" method="post">
              <?php if(!empty($msg)){echo $msg;} ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" autocomplete="off" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" autocomplete="off" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Forgot Password? <a href="forgot_password.php">Click Here</a></small>
              </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
      </form>
      <div class="form-group">
        <small id="emailHelp" class="form-text text-muted">Don't Have an account ? <a href="signup.php">Sign Up Here</a></small>
      </div>
      </p>
    </div>
      </div>
    </div>
  </div>
  </div>

</body>
</html>
