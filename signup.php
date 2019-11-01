<?php include 'signup_user.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Create Account</title>
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
          <h5 class="card-title bg-primary text-white p-2">Sign Up</h5>
          <h6 class="card-subtitle mb-2 text-muted">Create A New Account</h6>
          <p class="card-text">
            <?php if(!empty($msg)){echo $msg;} ?>
            <form action="" method="post">
                <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input autocomplete="off" name="user_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input autocomplete="off" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input autocomplete="off" type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="">Coutry</label>
                <select name="country" class="form-control">
                  <option value="" selected>Select Your Country</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="India">India</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Afganistan">Afganistan</option>
                  <option value="Srilanka">Srilanka</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Gender</label>
                <select name="gender" class="form-control">
                  <option value="" selected>Select Your Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
          </div>
          <input type="submit" class="btn btn-primary" name="submit" value="Sign Up">
      </form>
      <div class="form-group">
        <small id="emailHelp" class="form-text text-muted">Already Have an account ? <a href="signin.php">Sign In Here</a></small>
      </div>
      </p>
    </div>
      </div>
    </div>
  </div>
  </div>

</body>
</html>
