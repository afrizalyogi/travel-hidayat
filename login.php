<?php      
    include('db_connect.php');  

    session_start();

    $email = $password = "";

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("location: index.php");
      exit;
    }

    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_POST['email'];  
      $password = $_POST['password'];
      
      //to prevent from mysqli injection  
      $email = stripcslashes($email);  
      $password = stripcslashes($password);  
      $email = mysqli_real_escape_string($con, $email);  
      $password = mysqli_real_escape_string($con, $password); 
    
      $sql = "select * from pengunjung where email = '$email' and password = '$password'";  
      $result = mysqli_query($con, $sql);  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result);  
        
      if($count > 0){ 
        $_SESSION["loggedin"] = true;
        $_SESSION['email'] = $row['email'];
        header("location: index.php");
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
  <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
  <title>Login</title>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="w-50">
      <form action="login.php" method="post">
      <div class="text-center align-items-center my-4">
      <h2>Login</h2>
        <p>Silahkan masukan akun anda untuk login.</p>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
          </div>      
          <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php  echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Belum punya akun? <a href="signup.php">Sign up disini</a>.</p>
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