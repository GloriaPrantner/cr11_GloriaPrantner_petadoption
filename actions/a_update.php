<?php

require_once 'db_connect.php';

if($_GET){
    $id = $_GET["animal_id"];
    $name = $_GET["animal_name"];
    $age = $_GET["animal_age"];
    $img = $_GET["animal_img"];
    $description = $_GET["animal_description"];
    $type = $_GET["animal_type"];
    $address = $_GET["location_address"];
    $city = $_GET["location_city"];
    $zip = $_GET["location_zip"];
    
   
    $sql= "UPDATE animal INNER JOIN location ON animal.location_id = location.location_id SET animal.animal_name= '$name' , animal.animal_img= '$img' , animal.animal_description = '$description' ,animal.animal_age= '$age', animal.animal_type= '$type', location.location_address = '$address', location.location_city = '$city', location.location_zip = '$zip' WHERE animal.animal_id = '$id'";

    if(mysqli_query($conn, $sql)){
        echo "Update sucessful! <br> <a href='../index.php'> Back to Home </a>";
    } else {
        echo "error";
    }
    
}

?>

