<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/auth2.css" rel="stylesheet">
  <script src="jquery-3.5.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body id="page-top" style="background-color:#fee7ff;">

  <!-- Page Wrapper -->
  <div id="wrapper">

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-blue-900 mb-4" >New User Registration</h1>
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status']!='')
                    {
                      echo '<h6 style="color:red;"> '.$_SESSION['status'].' </h6>';
                      unset($_SESSION['status']);
                    }

                ?>
              </div>
              <form class="user" action="registerCode.php" method="POST" id="captcha_form">
              <div class="form-group" >
                  <input type="text" name="firstname" class="form-control form-control-user"  placeholder="Enter Firstname" required>

                </div>
                <div class="form-group">
                  <input type="text" name="lastname" class="form-control form-control-user"  placeholder="Enter Lastname" required>

                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-user"  placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>

                </div>
                <div class="form-group">
                  <input type="password" name="confirm" class="form-control form-control-user" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user"  placeholder="Enter Email" required>

                </div> 
                <div class="form-group">
                  <input type="number" name="phone" class="form-control form-control-user"  placeholder="Enter Phone Number" required>

                </div>
                <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LfLJM8ZAAAAAK50H3ILuVfmy05q69zy8WxRrGe9" ></div>
                </div>
                <button type="submit" name="login_btn" id="login_btn" class="btn btn-primary btn-user btn-block" >
                  Sign Up
				        </button>
				<br>
				<div class="form-group">
				  <a href="auth2.php" >Already Registered?</a>
				  <a href="https://major-1.herokuapp.com/" class="align-self-end"  style="float:right">Back to Main</a>
                </div>				
            </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
<!-- Bootstrap core JavaScript-->

<!-- php include('includes/footer.php'); -->
</body>
</html>
