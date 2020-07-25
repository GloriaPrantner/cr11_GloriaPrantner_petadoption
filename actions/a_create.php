<?php
ob_start();
session_start();

require_once 'db_connect.php';

if(isset($_SESSION['user'])){
    header("Location: home.php");
    exit;
} elseif(!isset($_SESSION['admin']) && !isset($_SESSION['superadmin'])){
    header("Location: index.php");
    exit;
}

if($_GET){
    $id = $_GET["animal_id"];
    $name = $_GET["animal_name"];
    $age = $_GET["animal_age"];
    $img = $_GET["animal_img"];
    $description = $_GET["animal_description"];
    $type = $_GET["animal_type"];
    $hobbies = $_GET["animal_hobbies"];
    // $address = $_GET["location_address"];
    // $city = $_GET["location_city"];
    // $zip = $_GET["location_zip"];


    $sql= "INSERT INTO animal (animal_name, animal_age, animal_description, animal_type, animal_hobbies, animal_img, location_id) VALUES ('$name' , '$age', '$description' , '$type' , '$hobbies', '$img', '1')";


    var_dump($sql);

    if(mysqli_query($conn, $sql)){
        echo "Update sucessful! <br> <a href='../index.php'> Back to Home </a>";
    } else {
        echo "error";
    }
    
}

?>