<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

if(isset($_SESSION['user'])){
    header("Location: home.php");
    exit;
}
if(!isset($_SESSION['admin'])&& !isset($_SESSION['superadmin'])){
    header("Location: index.php");
    exit;
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class ="container">

        <?php

            if($_GET['animal_id']){
                $id =  $_GET['animal_id'];

                echo "
                <div>
                    <h3>Are you sure you want to delete this?</h3>

                    <form action='actions/a_delete.php' method='get'>
                        <input type='hidden' name='animal_id' value=". $id  . ">
                        <input type='submit' value='Submit'>
                        <a href='admin.php'><button type='button'>Go back</button></a>
                    </form>
                </div>";

                $conn->close();
            }

            if($_GET['user_id']){
                $id =  $_GET['user_id'];
                
                echo "
                <div>
                    <h3>Are you sure you want to delete this?</h3>

                    <form action='actions/a_delete.php' method='get'>
                        <input type='hidden' name='user_id' value=". $id  . ">
                        <input type='submit' value='Submit'>
                        <a href='admin.php'><button type='button'>Go back</button></a>
                    </form>
                </div>";
            
                $conn->close();
            }
        ?>

    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>