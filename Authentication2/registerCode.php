<?php 
session_start();
?>
<?php
$connection= mysqli_connect('sql12.freesqldatabase.com','sql12366792','CcBjkKQZLf');
$db=mysqli_select_db($connection,'sql12366792');
if(!$connection)
{
    echo "Connection error";
}

if(isset($_POST['login_btn']))
{
    if(empty($_POST["g-recaptcha-response"]))
    {
        $_SESSION['status']= 'Captcha is required';
        header("Location: register.php");
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
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $pwd=$_POST['password'];
            $confirm=$_POST['confirm'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $q="select * from users2 where username='$username'";
            $query_run = mysqli_query($connection,$q);
            if(mysqli_fetch_array($query_run))
            {
                $_SESSION['status']= 'Username already exists';
                header("Location: register.php");
            }
            else if($pwd==$confirm)
            {
                $query="insert into users2 (firstname, lastname, username,  password, email, phone) values ('$firstname','$lastname','$username','$pwd','$email','$phone')"; 
                if(mysqli_query($connection, $query))
                {
                    $_SESSION['status']= 'You have been registered';
                    header("Location: auth2.php");
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
    }

    

}

?>