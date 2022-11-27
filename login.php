<?php      
    include('db_connect.php');  

    session_start();

    if(isset($_SESSION['username'])) {
      header("Location: index.php");
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
      $username = $_POST['username'];  
      $password = $_POST['password'];  
      
      //to prevent from mysqli injection  
      $username = stripcslashes($username);  
      $password = stripcslashes($password);  
      $username = mysqli_real_escape_string($con, $username);  
      $password = mysqli_real_escape_string($con, $password);  
    
      $sql = "select * from users where username = '$username' and password = '$password'";  
      $result = mysqli_query($con, $sql);  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result);  
        
      if($count > 0){ 
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
      }
      else {
        echo "<script>alert('Email atau password Anda salah!')</script>";
      }
    }     
?> 
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
      <form action="login.php" method="post">
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