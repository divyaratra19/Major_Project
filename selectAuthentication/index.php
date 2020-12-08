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

  <title>Major Project</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="style.css" rel="stylesheet">
  
</head>

<body id="page-top" style= "background-image: linear-gradient(0deg, #65d2ea4d, #0b95ca80), url(docker.png);">

  <!-- Page Wrapper -->
  <br><br>
  <h3 style="text-align: center;line-height: 1.4em; font-weight:bold;color:#064b86; font-family:Arial;">Leveraging User Authentication and Authorisation Mechanisms as<br>Microservices by Implementation of Container Technology</h3>
  <hr style=" width: 500px;border: 2px solid #017ead;">
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
                <h1 class="h4 text-blue-900 mb-4" >Select the Type of Authentication</h1>
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status']!='')
                    {
                        echo '<h6 style="color:red;"> '.$_SESSION['status'].' </h6>';
                        unset($_SESSION['status']);
                    }

                ?>
              </div>
              <form class="user" action="selectAuth.php" method="POST">
                <div class="col-md-6 select-outline">
                    <label>Select one to proceed:</label>
                    <select class="mdb-select md-form md-outline colorful-select dropdown-primary" name="authenticationType" style="background-color: #f7f7f7; border-radius: 13px; padding-left:10px; color:#545556; border-color: #a0a0b1;">
                      <option class="myClass" value="" disabled selected>Choose your option</option>
                      <option value="1">Password based Authentication</option>
                      <option value="2">Authentication with Recaptcha</option>
                      <!--<option value="3">Authentication 3</option>-->
                    </select>
                </div>
                <br>
                <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block" >
                  Proceed
				</button>		
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