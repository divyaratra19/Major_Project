<?php 
session_start();
?>
<?php
$connection= mysqli_connect('sql12.freesqldatabase.com','sql12374385','21p4uBheY7');
$db=mysqli_select_db($connection,'sql12374385');
if(!$connection)
{
    echo "Connection error";
}

if(isset($_POST['login_btn']))
{
    $username= $_POST['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $pwd=$_POST['password'];
    $confirm=$_POST['confirm'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $q="select * from users where username='$username'";
    $query_run = mysqli_query($connection,$q);
    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['status']= 'Username already exists';
        header("Location: register.php");
    }
    else if($pwd==$confirm)
    {
        $query="insert into users (firstname, lastname, username,  password, email, phone) values ('$firstname','$lastname','$username','$pwd','$email','$phone')"; 
        if(mysqli_query($connection, $query))
        {
            header("Location: auth1.php");
        }
        else{
            $_SESSION['status']= 'Could not register';
            header("Location: register.php");
        }
    }
    
    else
    {
        $_SESSION['status']= 'Password and Confirm Password do not match';
        header('Location: register.php');
    }

}

?>