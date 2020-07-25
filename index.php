<?php
ob_start();
session_start();
require_once  'actions/db_connect.php';

if(isset($_SESSION['user'])!=""){
    header("Location: home.php");
    exit;
}
if(isset($_SESSION['admin'])!=""){
    header("Location: admin.php");
    exit;
}

$error = false;


if(isset($_POST['loginBtn'])){

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);


    if(empty($email)){
        $error = true;
        $emailError = "Please enter your mail address!";

    } else if( !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = true; 
        $emailError = "Please enter valid email address!";
    }

    if(empty($pass)){
        $error = true; 
        $passError = "Please enter your password!";
    }

    if(!$error){
        $password = md5($pass);
        $res=mysqli_query($conn, "SELECT * FROM users WHERE user_email='$email'");
        $row= mysqli_fetch_array($res, MYSQLI_ASSOC);
        $count = mysqli_num_rows($res);

        if ($count == 1 && $row['user_pass'] == $password){
            if($row["user_status"] == 'admin'){
                $_SESSION["admin"] = $row["user_id"];
                header("Location: admin.php");

            } elseif($row["user_status"] == 'superadmin'){
                $_SESSION["superadmin"] = $row["user_id"];
                header("Location: superadmin.php");
            }      
            else{
                $_SESSION['user'] = $row["user_id"];
                header("Location: home.php");
            }
        } else {
                $errMSG = "Inncorrect login try again!";
        }
    }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SEVER['PHP_SELF']); ?>" method="post" autocomplete= "off" >

        <?php
            if(isset($errMSG)) {
                echo $errMSG; 
            }
        ?>


        <input type="email" name="email" placeholer= "Enter Email" maxlength="60"> <br>

        <span><?php echo $emailError; ?> </span>

        <input type="password" name="pass" placeholder="Enter password" maxlength="15"> <br>

        <span><?php echo $passError; ?></span>
        <hr>
        <button type="submit" name="loginBtn">Submit</button>

        <hr>

        </form>
        <p> Not registered yet? 
        <a href="register.php">Register now!</a></p>

    </div>




    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

<?php ob_end_flush(); ?>