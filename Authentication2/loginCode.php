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
    if(empty($_POST["g-recaptcha-response"]))
    {
        $_SESSION['status']= 'Captcha is required';
        header("Location: auth2.php");
    }
    else
    {
        $secret_key ='6LfLJM8ZAAAAAMWlgVey6l7nw3ICRd7KhnXFiNNB';
        $response_key=$_POST['g-recaptcha-response'];
        $url="https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_key";
        $response=file_get_contents($url);
        $response_data=json_decode($response);

        if(!$response_data->success)
        {
            $_SESSION['status']= 'Captcha verification failed';
        }
        else
        {
            $username= $_POST['username'];
            $password=$_POST['password'];
            $query="select * from users2 where username='$username' AND password='$password'";
            $query_run = mysqli_query($connection,$query);
            
            if(mysqli_fetch_array($query_run))
            {
                header('Location: ../main.html');
            }
            else
            {
                $_SESSION['status']= 'Email ID or Password is invalid';
                header('Location: auth2.php');
            }
        }
   
    }
}

?>
