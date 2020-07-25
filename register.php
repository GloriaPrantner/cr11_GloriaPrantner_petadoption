<?php
ob_start();
session_start();
include_once 'actions/db_connect.php';

if(isset($_SESSION["user"])){
    header("Location:home.php");
}
if(isset($_SESSION['admin'])){
    header("Location: admin.php");
    exit;
}

if(isset($_SESSION['superadmin'])){
    header("Location: superadmin.php");
    exit;
}



$error = false;
if(isset($_POST['btn_signup'])){

    $name=trim($_POST["name"]);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);


    if(empty($name)){
        $error = true;
        $emailError = "Please enter you name!";
    } elseif (strlen($name) < 3) {
        $error = true;
        $nameError = "Enter your full name (minimum 3)!";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = true;
        $nameError = "Name must contain letters.";
    }



    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = true;
        $emailError= "Enter Email!";
    } else {

        $sql = "SELECT user_email FROM users WHERE user_email = '$email'";
        $result = mysqli_query($conn, $sql); 
        $count = mysqli_num_rows($result);
        if($count!=0){
            $error = true;
            $emailError = "There is already an existing account with this Email adress.";
        }
    }

    if(empty($pass)){
        $error = true;
        $emailError = "Please enter a password!";
    } elseif (strlen($name) < 8) {
    $error = true;
    $nameError = "Enter at least 8 characters!";
        
    }


    $password = md5($pass);


    if (!$error) {
        $sql = "INSERT INTO users(`user_name`, user_email, user_pass) VALUES('$name','$email','$password')";

        $res = mysqli_query($conn, $sql);

        if($res) {
            $errTyp = "sucess";
            $errMSG = "successfully registrated";
            unset($name);
            unset($email);
            unset($pass);
        } else {
            $errTyp = "danger";
            $errMSG = "Registration failed";
        }
    }

    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form  method="post" action="<?php echo htmlspecialchars($_SEVER['PHP_SELF']); ?>" autocomplete= "off">
        <input type="text" name="name" placeholder= "Insert Name" maxlength="30" value = "<?php echo $name ?>"><br>

        <div><?php echo $nameError; ?> </div>

        <input type="email" name="email" placeholer= "Enter Email" maxlength="60"> <br>

        <div><?php echo $emailError; ?> </div>

        <input type="password" name="pass" placeholder="Enter password" maxlength="15"> <br>

        <div><?php echo $passError; ?></div>
        <hr>
        <button type="submit" name="btn_signup">Submit</button>
        <a href="index.php">Back to login</a>

        <hr>

        </form>

    </div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>


<?php ob_end_flush(); ?>