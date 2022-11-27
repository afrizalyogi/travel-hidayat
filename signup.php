<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}

// Include config file
require_once "db_connect.php";
 
// Define variables and initialize with empty values
$email = $password = $confirm_password = $name = $address = $phone = "";
$email_err = $password_err = $confirm_password_err = $name_err = $address_err = $phone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Masukan email anda.";
    }
   else{
        // Prepare a select statement
        $sql = "SELECT id_pengunjung FROM pengunjung WHERE email = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "Email sudah digunakan.";
                } else{
                    $email = trim($_POST["email"]);
                }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }

              // Close statement
              mysqli_stmt_close($stmt);
            }
        }
        
        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Masukan password anda.";     
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password harus memiliki minimal 6 karakter.";
        } else{
            $param_password = trim($_POST["password"]);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Masukan password yang sama.";     
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($param_password != $confirm_password)){
                $confirm_password_err = "Password tidak cocok.";
            }
        }

    // Validate confirm name
  if(empty(trim($_POST["name"]))){
    $name_err = "Masukan nama anda.";
  }
  else{
          $param_name = trim($_POST["name"]);
  }

  // Validate confirm address
  if(empty(trim($_POST["address"]))){
    $address_err = "Masukan alamat anda.";
  }
  else{
        $param_address = trim($_POST["address"]);
  }

// Validate confirm phone
  if(empty(trim($_POST["phone"]))){
    $phone_err = "Masukan no telepon anda.";
  }
  else{
    $param_phone = trim($_POST["phone"]);
  }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($name) && empty($address) && empty($phone)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO `pengunjung`(`email`, `password`, `nama`, `alamat`, `no_tlp`) VALUES ('$param_email', '$param_password', '$param_name', '$param_address', '$param_phone')";
        mysqli_query($con, $sql);
        header("location: login.php");
      }
    
    // Close connection
    mysqli_close($con);
  }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link
			rel="stylesheet"
			href="libraries/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="styles/login.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="w-50">
      <form action="signup.php" method="post">
      <div class="text-center align-items-center my-4">
      <h2>Sign Up</h2>
        <p>Silahkan masukan data untuk akun anda.</p>
</div>
        <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                <span class="invalid-feedback"><?php echo $address_err; ?></span>
            </div>
            <div class="form-group">
                <label>No Telepon</label>
                <input type="number" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                <span class="invalid-feedback"><?php echo $phone_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Sudah punya akun? <a href="login.php">Login disini</a>.</p>
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