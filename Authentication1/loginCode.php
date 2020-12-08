<?php 
session_start();
?>
<?php
$connection= mysqli_connect('sql12.freesqldatabase.com','sql12380828','SQfuwKJ4W2');
$db=mysqli_select_db($connection,'sql12380828');
if(!$connection)
{
    echo "Connection error";
}

if(isset($_POST['login_btn']))
{
    $username= $_POST['username'];
    $password=$_POST['password'];
    $query="select * from users where username='$username' AND password='$password'";
    $query_run = mysqli_query($connection,$query);
    
    if(mysqli_fetch_array($query_run))
    {
        header('Location: success.html');
    }
    else
    {
        $_SESSION['status']= 'Email ID or Password is invalid';
        header('Location: auth1.php');
    }

}

?>