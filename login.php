<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
			rel="stylesheet"
			href="libraries/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="styles/login.css">
  <title>Login</title>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="w-50">
      <form action="index.php" method="post">
      <div class="text-center align-items-center my-4">
            <h2 class="text-center">Login</h2>
            <br/>
            <p>Please fill in your credentials to login.</p>
          </div>      
      <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
    &copy; 2022 Copyright Travel Hidayat • All rights reserved • Made in
					Indonesia
    </div>
    <!-- Copyright -->
  </div>
</section>
</body>
</html>